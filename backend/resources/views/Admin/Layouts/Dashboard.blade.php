<!DOCTYPE html>
<html lang="en">
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        font-family: 'Playfair Display', serif;
    }

    .main-container {
        position: absolute;
        height: 100vh;
        width: 80%;
        margin-left: 20%;
        padding: 2rem;
        color: Pink;
        border-radius: 20px;
    }

    .main-container h1 {
        background: linear-gradient(to bottom right, #F77062, #FE5196);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-size: 2.5em;
        font-weight: bold;
        margin-bottom: 0.3rem;
    }

    .main-container label {
        font-size: 1.2em;
        font-weight: 500;
        display: block;
        color: gray;
        margin-bottom: 1.5rem;
    }

    .Cards {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .card {
        flex: 1;
        background: linear-gradient(to bottom right, #F77062, #FE5196);
        color: white;
        font-size: 1rem;
        font-weight: 600;
        padding: 1rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 5px 10px 20px rgba(255, 105, 135, 0.3);
        backdrop-filter: blur(8px);
        transition: 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 6px 12px 24px rgba(255, 105, 135, 0.4);
    }

    .chart-container {
        background: linear-gradient(to right, #F77062, #FE5196);
        border-radius: 20px;
        padding: 1rem;
        box-shadow: 5px 10px 18px rgba(255, 192, 203, 0.53);
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }
</style>

<div>
    <aside>
        @include('Admin.Pages.Sidebar')
    </aside>
    <div class="main-container">
        <h1>Dashboard</h1>
        <label>Welcome Back, {{ Auth::user()->name }}!</label>

        <div class="Cards">
            <div class="card">SOLD TODAY<br><span>₱ 1,500</span></div>
            <div class="card">SOLD TOTAL<br><span>₱ 45,000</span></div>
            <div class="card">SALES GROWTH<br><span>+12%</span></div>
        </div>

        <div class="chart-container">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Sales This Week',
                data: [1500, 2000, 1800, 2200, 2400, 3000, 2700],
                backgroundColor: 'rgba(255, 181, 213, 0.92)',
                borderColor: '#ffffff',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointRadius: 5,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#fff',
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white',
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(255, 103, 148, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white',
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(199, 67, 148, 0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white',
                        font: {
                            size: 13,
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
</script>
</body>
</html>
