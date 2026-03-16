@extends('layouts.app')

@section('content')

<h1>Portfolio Intake Form</h1>

<p style="max-width:700px; line-height:1.7; color: var(--text-main);">
Submit your current holdings for structural portfolio risk analysis.
Accepted formats: PDF, Excel, CSV, screenshots.
Manual analytical review delivered based on selected service tier.
</p>

@if(session('success'))
    <p style="color: green; font-weight: bold;">
        {{ session('success') }}
    </p>
@endif

@if(session('error'))
    <p style="color: red; font-weight: bold;">
        {{ session('error') }}
    </p>
@endif

<form action="{{ route('intake.submit') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <label>Full Name:</label><br>
    <input type="text" name="name"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>WhatsApp (Optional):</label><br>
    <input type="text" name="phone"><br><br>

    <label>Portfolio Value:</label><br>
    <select name="portfolio_value">
        <option>1L–5L</option>
        <option>5L–15L</option>
        <option>15L-25L</option>
    </select><br><br>

    <label>Investment Objective:</label><br>
    <select name="objective">
        <option>Capital Growth</option>
        <option>Income Generation</option>
        <option>Capital Preservation</option>
    </select><br><br>

    <label>Investment Horizon:</label><br>
    <select name="horizon">
        <option>Less than 1 year</option>
        <option>1–3 years</option>
        <option>3–5 years</option>
        <option>5+ years</option>
    </select><br><br>

    <label>Risk Archetype:</label><br>
    <select name="archetype">
        <option>Defensive</option>
        <option>Balanced</option>
        <option>Opportunistic</option>
        <option>High Conviction</option>
    </select><br><br>

    <label>Main Concern:</label><br>
    <select name="concern">
        <option>Hidden concentration</option>
        <option>Sector exposure</option>
        <option>Drawdown risk</option>
        <option>Correlation risk</option>
    </select><br><br>

    <label>Upload Holdings:</label><br>
    <input type="file" name="holdings" accept=".pdf,.xlsx,.xls,.csv,.jpg,.jpeg,.png,.webp"><br><br>

    <label>Additional Notes (Optional):</label><br>
    <textarea name="notes" rows="5" cols="50"></textarea><br><br>

    <button type="submit">Submit for Risk Review</button>

</form> 

@endsection 

