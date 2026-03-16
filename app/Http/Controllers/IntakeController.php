<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\ClientIntake;

class IntakeController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'portfolio_value' => 'required',
            'objective' => 'required',
            'horizon' => 'required',
            'archetype' => 'required',
            'concern' => 'required',
            'holdings' => 'required|file|mimes:pdf,xlsx,xls,csv,jpg,jpeg,png,webp|max:10240'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Submission Metadata
        |--------------------------------------------------------------------------
        */

        $submissionId = Str::uuid();
        $createdAt = now()->format('Y-m-d H:i:s');

        /*
        |--------------------------------------------------------------------------
        | File Upload Metadata
        |--------------------------------------------------------------------------
        */

        $file = $request->file('holdings');

        $folder = 'uploads/' . now()->format('Y-m');

        $filePath = $file->store($folder);

        $fileType = $file->getClientOriginalExtension();
        $fileSizeKb = round($file->getSize() / 1024, 2);

        /*
        |--------------------------------------------------------------------------
        | Lead Score Logic
        |--------------------------------------------------------------------------
        */

        $leadScore = 'Normal';

        if ($request->portfolio_value === '25L+') {
            $leadScore = 'High Value';
        }

        /*
        |--------------------------------------------------------------------------
        | Save Into Database
        |--------------------------------------------------------------------------
        */

        ClientIntake::create([
            'submission_uuid' => $submissionId,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'portfolio_value' => $request->portfolio_value,
            'objective' => $request->objective,
            'horizon' => $request->horizon,
            'archetype' => $request->archetype,
            'concern' => $request->concern,
            'notes' => $request->notes,
            'lead_score' => $leadScore,
            'ai_status' => 'pending'
        ]);

        /*
        |--------------------------------------------------------------------------
        | CSV Logging
        |--------------------------------------------------------------------------
        */

        $csvLine = [
            $submissionId,
            $createdAt,
            trim($request->name),
            strtolower(trim($request->email)),
            trim($request->phone),
            trim($request->portfolio_value),
            trim($request->objective),
            trim($request->horizon),
            trim($request->archetype),
            trim($request->concern),
            trim($request->notes),
            $filePath,
            $fileType,
            $fileSizeKb,
            $leadScore,
            'pending'
        ];

        $csvPath = storage_path('app/intake_log.csv');

        $fileExists = file_exists($csvPath);

        $fileHandle = fopen($csvPath, 'a');

        if (!$fileExists) {
            fputcsv($fileHandle, [
                'submission_id',
                'created_at',
                'name',
                'email',
                'phone',
                'portfolio_value',
                'objective',
                'horizon',
                'archetype',
                'concern',
                'notes',
                'file_path',
                'file_type',
                'file_size_kb',
                'lead_score',
                'ai_status'
            ]);
        }

        fputcsv($fileHandle, $csvLine);

        fclose($fileHandle);

        /*
        |--------------------------------------------------------------------------
        | Email Send
        |--------------------------------------------------------------------------
        */

        try {
            Mail::raw(
                "New portfolio intake received:

Submission ID: {$submissionId}
Name: {$request->name}
Email: {$request->email}
Phone: {$request->phone}
Portfolio Value: {$request->portfolio_value}
Objective: {$request->objective}
Investment Horizon: {$request->horizon}
Risk Archetype: {$request->archetype}
Main Concern: {$request->concern}
Notes: {$request->notes}
Lead Score: {$leadScore}",
                function ($message) use ($file, $request) {
                    $message->to('durgeshduklan5@gmail.com')
                            ->subject('New Portfolio Intake Submission')
                            ->attach(
                                $file->getRealPath(),
                                [
                                    'as' => str_replace(' ', '_', $request->name) . '_' . $file->getClientOriginalName()
                                ]
                            );
                }
            );
        } catch (\Exception $e) {
            return back()->with('error', 'Mail failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Submission received successfully.');
    }
}

