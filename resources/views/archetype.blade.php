@extends('layouts.app')

@section('content')

<div class="profile-container">

    <h1>Investor Behavioral Profile</h1>
    <p>6 structured questions. <strong>~60 seconds.</strong></p>

    <form id="profileForm">

        @php
        $questions = [
            "Market falls 20% in 3 weeks. You:",
            "You prefer building portfolios that are:",
            "What worries you most?",
            "You act when:",
            "You think in terms of:",
            "You monitor portfolio:"
        ];
        @endphp

        @foreach($questions as $index => $question)
        <div class="question">
            <h3>Q{{ $index + 1 }}. {{ $question }}</h3>

            <label><input type="radio" name="q{{ $index }}" value="A" required> A</label>
            <label><input type="radio" name="q{{ $index }}" value="B"> B</label>
            <label><input type="radio" name="q{{ $index }}" value="C"> C</label>
            <label><input type="radio" name="q{{ $index }}" value="D"> D</label>
        </div>
        @endforeach

        <button type="button" onclick="calculateProfile()">View Result</button>

    </form>

    <div id="result" style="display:none; margin-top:40px;"></div>

</div>

<script>

function calculateProfile() {

    let counts = {A:0, B:0, C:0, D:0};

    const inputs = document.querySelectorAll('input[type="radio"]:checked');

    if(inputs.length < 6) {
        alert("Please answer all questions.");
        return;
    }

    inputs.forEach(input => {
        counts[input.value]++;
    });

    let maxType = Object.keys(counts).reduce((a, b) =>
        counts[a] > counts[b] ? a : b
    );

    let profile = "";

    switch(maxType) {
        case "A":
            profile = "Analytical Architect";
            break;
        case "B":
            profile = "Tactical Reactor";
            break;
        case "C":
            profile = "Narrative Convictionist";
            break;
        case "D":
            profile = "Defensive Capital Preserver";
            break;
    }

    document.getElementById("result").style.display = "block";
    document.getElementById("result").innerHTML = `
        <h2>Your Archetype: ${profile}</h2>
        <p>A: ${counts.A} | B: ${counts.B} | C: ${counts.C} | D: ${counts.D}</p>
        <p>This profile reflects your dominant investment behavior pattern.</p>
    `;
}

</script>

<style>
.profile-container {
    max-width: 800px;
    margin: auto;
    padding: 40px;
}

.question {
    margin-bottom: 30px;
}

label {
    display: block;
    margin: 5px 0;
}
</style>

@endsection