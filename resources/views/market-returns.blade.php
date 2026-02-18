@extends('layouts.app')

@section('content')

<div style="padding:40px">

    <h1>Global Exchange — Yearwise Returns</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <thead>
            <tr>
                @foreach($header as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach($returns as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
