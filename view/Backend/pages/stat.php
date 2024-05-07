<?php 
require_once 'C:\xampp\htdocs\projetweb2\Controlleur\EventC.php';

$eventC = new eventC();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Événements par Prix</title>
    <!-- Include Chart.js JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #chartContainer {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<div id="chartContainer">
    <canvas id="eventsByPriceRangeChart"></canvas>
</div>

<script>
    // Retrieve event data from PHP
    var eventData = <?php echo json_encode($eventC->countEventsByPriceRange()); ?>;

    // Create a new chart with Chart.js
    var ctx = document.getElementById('eventsByPriceRangeChart').getContext('2d');
    var eventsByPriceRangeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['0-50', '51-100', 'Supérieur à 100'],
            datasets: [{
                label: 'Nombre d\'Événements',
                data: [
                    eventData['price_range_0_50'],
                    eventData['price_range_51_100'],
                    eventData['price_range_above_100']
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
