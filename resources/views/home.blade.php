@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero">

    <!-- LEFT CONTENT -->
    <div class="hero-left">

        <h1>
            You’re not as diversified as you think.
        </h1>

        <p>
            Get institutional-grade visibility into your portfolio risk —
            sector exposure, correlation clusters, and regime sensitivity.
        </p>

        <!-- CTA BUTTONS -->
        <div class="hero-buttons">

            <a href="/intake" class="btn-primary">
                Get Risk Scan
            </a>

            <a href="/investor-profile" class="btn-secondary">
                Assess Your Risk Archetype
            </a>

            <a href="/sample-report" class="btn-secondary">
                View Sample Report
            </a>

        </div>

        <!-- CREDIBILITY STRIP -->
        <div class="credibility-strip">
            <div>Sector Risk Models</div>
            <div>Correlation Mapping</div>
            <div>Regime Analysis</div>
            <div>Institutional Frameworks</div>
        </div>

    </div>

    <!-- RIGHT IMAGE -->
    <div class="hero-right">

        <div class="dashboard-wrapper">
            <img
                src="{{ asset('images/Hero_page_Image.png') }}"
                alt="Portfolio Risk Dashboard Preview"
            >
        </div>

    </div>

</section>


<!-- PROBLEM SECTION -->
<section class="problem">

    <div class="problem-container">

        <h2>Hidden Risk Exists</h2>

        <p>
            Most traders assume diversification equals safety.
            But capital often clusters across sectors, themes,
            and liquidity regimes. Hidden exposure creates structural drawdowns.
        </p>

    </div>

</section>

@endsection
