@extends('layouts.app')

@section('content')

<!-- SERVICE MAIN SECTION -->

<section class="service-wrapper">

    <h1>Portfolio Risk Intelligence Service</h1>

    <p>
        This service provides institutional-grade visibility into your portfolio’s structural risk.
    </p>

    <ul>
        <li>Sector concentration analysis</li>
        <li>Correlation clustering</li>
        <li>Exposure overlap mapping</li>
        <li>Regime sensitivity analysis</li>
        <li>Institutional flow context</li>
        <li>Risk heatmap visualization</li>
    </ul>

</section>


<!-- GLOBAL DASHBOARD PREVIEW -->

<section class="dashboard-preview">

    <h2>Global Market Intelligence Preview</h2>

    <p>
        Compare quarterly performance across developed and emerging markets.
        Switch between local and USD-adjusted returns to understand the real
        impact of currency regimes on portfolio exposure.
    </p>

    <div class="preview-image">
        <img src="/images/dashboard-preview.png" alt="Global Dashboard Preview">
    </div>

    <div class="preview-cta">
        <a href="{{ route('market.returns') }}" class="btn-secondary">
            Explore Global Dashboard →
        </a>
    </div>

</section>


<!-- FINAL COMPLIANCE DISCLAIMER -->

<section class="final-disclaimer">
    <p>
        <strong>Disclaimer:</strong> This service provides risk analytics and structural insights only.
        It does not constitute investment advice, portfolio recommendation, or buy/sell guidance.
        All investment decisions remain the responsibility of the user.
    </p>

</section>


<!-- PAGE STYLING -->

<style>

/* Main wrapper */

.service-wrapper {
    max-width: 900px;
    margin: 80px auto;
    padding: 0 24px;
    text-align: center;
}

.service-wrapper h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.service-wrapper p {
    font-size: 18px;
    color: var(--text-muted);
    line-height: 1.6;
}

.service-wrapper ul {
    margin: 30px 0;
    padding: 0;
    list-style: none;
}

.service-wrapper li {
    margin: 10px 0;
    font-size: 16px;
}


/* Dashboard preview */

.dashboard-preview {
    margin-top: 100px;
    padding: 80px 24px;
    border-top: 1px solid var(--border-light);
    text-align: center;
}

.dashboard-preview h2 {
    font-size: 30px;
    margin-bottom: 20px;
}

.dashboard-preview p {
    max-width: 700px;
    margin: 0 auto 40px auto;
    color: var(--text-muted);
    line-height: 1.6;
}

.preview-image {
    max-width: 900px;
    margin: 0 auto 40px auto;
}

.preview-image img {
    width: 100%;
    border-radius: 14px;
}

body:not(.dark-mode) .preview-image img {
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.dark-mode .preview-image img {
    box-shadow:
        0 20px 40px rgba(0,0,0,0.25),
        0 5px 15px rgba(0,0,0,0.15);
}

.preview-cta {
    margin-top: 20px;
}


/* Final Disclaimer */

.final-disclaimer {
    margin-top: 80px;
    padding: 40px 24px;
    border-top: 1px solid var(--border-light);
    text-align: center;
}

.final-disclaimer p {
    max-width: 800px;
    margin: auto;
    font-size: 14px;
    color: var(--text-muted);
    line-height: 1.6;
}

</style>

@endsection
