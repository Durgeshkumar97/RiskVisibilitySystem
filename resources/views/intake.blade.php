@extends('layouts.app')

@section('content')

<h1>Portfolio Intake Form</h1>

<form>

<label>Name:</label><br>
<input type="text"><br><br>

<label>Email:</label><br>
<input type="email"><br><br>

<label>Portfolio Value:</label><br>
<select>
    <option>1L–5L</option>
    <option>5L–25L</option>
    <option>25L+</option>
</select><br><br>

<label>Upload Holdings:</label><br>
<input type="file"><br><br>

<button type="submit">Submit</button>

</form>

@endsection
