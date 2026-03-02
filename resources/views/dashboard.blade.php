<!DOCTYPE html>
<html>
<head>
    <title>Global Quarterly Returns</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            background: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .chart-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }
    </style>
</head>
<body>

<h1>Global Strong EM Quarterly Returns</h1>

<div class="chart-container">
    <canvas id="returnsChart"></canvas>
</div>

<script>
    const quarters = @json($quarters);
    const data = @json($data);

    const datasets = data.map((item, index) => ({
        label: item.index,
        data: item.returns,
        borderWidth: 2,
        fill: false
    }));

    const ctx = document.getElementById('returnsChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: quarters,
            datasets: datasets
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Quarterly Return (%)'
                    }
                },
                x: {
                    ticks: {
                        maxRotation: 90,
                        minRotation: 45
                    }
                }
            }
        }
    });
</script>

</body>
</html>