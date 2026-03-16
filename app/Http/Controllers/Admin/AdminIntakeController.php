<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientIntake;

class AdminIntakeController extends Controller
{
    public function index()
    {
        $intakes = ClientIntake::orderByDesc('lead_score')
            ->latest()
            ->paginate(20);

        return view('admin.intakes.index', compact('intakes'));
    }

    public function show($id)
    {
        $intake = ClientIntake::findOrFail($id);

        return view('admin.intakes.show', compact('intake'));
    }
}