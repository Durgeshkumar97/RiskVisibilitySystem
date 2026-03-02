<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $path = storage_path('app/global_strong_em_quarterly_returns.csv');

        if (!file_exists($path)) {
            return view('dashboard', ['data' => [], 'quarters' => []]);
        }

        $csv = array_map('str_getcsv', file($path));
        $header = $csv[0];
        unset($csv[0]);

        $quarters = array_slice($header, 3);

        $data = [];

        foreach ($csv as $row) {
            $data[] = [
                'country' => $row[0],
                'exchange' => $row[1],
                'index' => $row[2],
                'returns' => array_map('floatval', array_slice($row, 3))
            ];
        }

        return view('dashboard', compact('data', 'quarters'));
    }
}