@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2>Submission Detail</h2>

    <p><strong>Name:</strong> {{ $intake->name }}</p>
    <p><strong>Email:</strong> {{ $intake->email }}</p>
    <p><strong>Portfolio Value:</strong> {{ $intake->portfolio_value }}</p>
    <p><strong>Objective:</strong> {{ $intake->objective }}</p>
    <p><strong>Lead Score:</strong> {{ $intake->lead_score }}</p>
    <p><strong>AI Status:</strong> {{ $intake->ai_status }}</p>

</div>
@endsection