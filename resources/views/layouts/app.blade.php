<!DOCTYPE html>
<html>
<head>

<title>Portfolio Risk Intelligence</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* ===== COLOR VARIABLES ===== */
:root {
    --bg-main: #f5f5f5;
    --bg-hero: #f2f2f2;
    --text-main: #111;
    --text-muted: #444;

    --nav-bg: #e5e5e5;      /* TOP BAR */
    --footer-bg: #e5e5e5;   /* SAME AS NAV */

    --card-bg: #ffffff;
}


.dark-mode {
    --bg-main: #0e0e0e;
    --bg-hero: #151515;
    --text-main: #f5f5f5;
    --text-muted: #bbbbbb;

    --nav-bg: #1a1a1a;      /* TOP BAR DARK */
    --footer-bg: #1a1a1a;   /* SAME AS NAV */

    --card-bg: #1f1f1f;
}

/* ===== GLOBAL ===== */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: var(--bg-main);
    color: var(--text-main);
    transition: 0.3s;
}


/* ===== NAVBAR ===== */

nav {
    background: var(--nav-bg);
    padding: 18px 40px;
}

.nav-wrapper {
    max-width: 1200px;
    margin: auto;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav a {
    color: var(--text-main);
    margin-right: 25px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
}


/* ===== THEME BUTTON ===== */

.theme-toggle {
    cursor: pointer;
    padding: 8px 14px;
    border: 1px solid var(--text-main);
    border-radius: 6px;
    font-size: 13px;
    background: transparent;
    color: var(--text-main);
}


/* ===== CONTAINER ===== */

.container {
    max-width: 1400px;
    margin: auto;
}


/* ===== HERO ===== */

.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 8vw 6vw;
    background: var(--bg-hero);

    gap: 4vw;
    flex-wrap: wrap;
}


/* ===== HERO LEFT ===== */

.hero-left {
    flex: 1 1 500px;
    min-width: 320px;

    display: flex;
    flex-direction: column;
    justify-content: center;

    gap: 28px;   /* MASTER SPACING */
}


/* ===== HEADLINE ===== */

.hero-left h1 {
    font-size: clamp(36px, 4vw, 64px);
    line-height: 1.1;
    margin: 0;
}


/* ===== PARAGRAPH ===== */

.hero-left p {
    font-size: clamp(16px, 1.4vw, 20px);
    color: var(--text-muted);
    max-width: 520px;
    line-height: 1.6;
    margin: 0;
}


/* ===== BUTTON GROUP ===== */

.hero-buttons {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}


/* ===== BUTTONS ===== */

.btn-primary {
    background: var(--text-main);
    color: var(--bg-main);
    padding: 16px 30px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
}

.btn-secondary {
    border: 1.5px solid var(--text-main);
    padding: 16px 30px;
    border-radius: 6px;
    text-decoration: none;
    color: var(--text-main);
}


/* ===== HERO IMAGE ===== */

.hero-right {
    flex: 1.2 1 600px;
    display: flex;
    justify-content: center;
}

.hero-right img {
    width: 100%;
    max-width: 1100px;   /* Bigger image */
    border-radius: 14px;

    box-shadow:
        0 20px 40px rgba(0,0,0,0.25),
        0 5px 15px rgba(0,0,0,0.15);
}


/* ===== PROBLEM SECTION ===== */

.problem {
    padding: 80px 6vw;
}

.problem h2 {
    font-size: 28px;
    margin-bottom: 15px;
}

.problem p {
    font-size: 17px;
    color: var(--text-muted);
    line-height: 1.6;
    max-width: 800px;
}


/* ===== FOOTER ===== */
/* ===== FOOTER ===== */

footer {
    padding: 40px 20px;
}


/* Footer Container */

.footer-box {

    background: var(--footer-bg);   /* SAME AS NAVBAR */

    max-width: 900px;
    width: 100%;

    margin: auto;
    padding: 24px;

    border-radius: 10px;
    text-align: center;

    border: 1px solid rgba(0,0,0,0.08);   /* Light subtle border */
}


/* Dark mode border fix */

.dark-mode .footer-box {
    border: 1px solid rgba(255,255,255,0.08);
}


/* Title */

.footer-title {
    font-size: 14px;
    margin-bottom: 14px;
    color: var(--text-main);
}


/* Links */

.footer-links {
    display: flex;
    justify-content: center;
    gap: 28px;
    flex-wrap: wrap;
}

.footer-links a {
    color: var(--text-main);
    text-decoration: none;
    font-size: 13px;
    opacity: 0.75;
}

.footer-links a:hover {
    opacity: 1;
}

</style>

</head>

<body>


<!-- ===== NAVBAR ===== -->

<nav>
    <div class="nav-wrapper">

        <div>
            <a href="/">Home</a>
            <a href="/service">Service</a>
            <a href="/pricing">Pricing</a>
            <a href="/how-it-works">How It Works</a>
            <a href="/contact">Contact</a>
        </div>

        <!-- 🌗 SMART TOGGLE -->
        <button id="themeBtn" class="theme-toggle" onclick="toggleTheme()">
            🌙 Night Mode
        </button>

    </div>
</nav>


<!-- ===== PAGE CONTENT ===== -->

<div class="container">
    @yield('content')
</div>


<!-- ===== FOOTER ===== -->
<footer>

    <div class="footer-box">

        <div class="footer-title">
            Risk Intelligence — Not Investment Advisory
        </div>

        <div class="footer-links">

            <a href="https://www.sebi.gov.in" target="_blank">
                SEBI Official Website
            </a>

            <a href="https://investor.sebi.gov.in" target="_blank">
                SEBI Investor Education
            </a>

            <a href="https://www.nseindia.com/invest/education" target="_blank">
                NSE Risk Education
            </a>

        </div>

    </div>

</footer>



<!-- ===== DARK MODE SCRIPT ===== -->

<script>

const btn = document.getElementById("themeBtn");


function toggleTheme() {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {

        localStorage.setItem("theme", "dark");
        btn.innerHTML = "☀️ Day Mode";

    } else {

        localStorage.setItem("theme", "light");
        btn.innerHTML = "🌙 Night Mode";

    }
}


/* ===== LOAD SAVED THEME ===== */

window.onload = function () {

    if (localStorage.getItem("theme") === "dark") {

        document.body.classList.add("dark-mode");
        btn.innerHTML = "☀️ Day Mode";

    } else {

        btn.innerHTML = "🌙 Night Mode";

    }
};

</script>


</body>
</html>
