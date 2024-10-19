<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radar Chart Example</title>
</head>
<body>
    <div style="width: 50%; margin: auto;">
        <canvas id="myRadarChart"></canvas>
    </div>

    <!-- Script for creating the chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('myRadarChart').getContext('2d');

            var myRadarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Strength', 'Speed', 'Agility', 'Stamina', 'Flexibility'],
                    datasets: [{
                        label: 'Athlete A',
                        data: [65, 59, 90, 81, 56],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                    }, {
                        label: 'Athlete B',
                        data: [28, 48, 40, 19, 96],
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
