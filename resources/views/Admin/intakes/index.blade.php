@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2>Lead Intelligence Dashboard</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lead Score</th>
                <th>AI Status</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($intakes as $intake)
                <tr>
                    <td>{{ $intake->id }}</td>
                    <td>{{ $intake->name }}</td>
                    <td>{{ $intake->lead_score }}</td>
                    <td>{{ $intake->ai_status }}</td>
                    <td>
                        <a href="{{ route('admin.intakes.show', $intake->id) }}">
                            Open
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $intakes->links() }}

</div>
@endsection