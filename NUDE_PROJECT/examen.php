<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curvas de Nivel</title>
    <!-- Incluye la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
// Definir la función en PHP
function calculateY($x, $k) {
    return $x**2 / $k;
}

// Valores de x para el gráfico
$x_values = range(-10, 10);
// Valores de k
$k_values = [-4, -1, 0, 1, 4];

// Generar datos para las curvas de nivel
$data = [];
foreach ($k_values as $k) {
    $y_values = [];
    foreach ($x_values as $x) {
        $y_values[] = calculateY($x, $k);
    }
    $data[] = [
        'label' => "k = $k",
        'data' => $y_values,
    ];
}
?>

<!-- Contenedor para el gráfico -->
<div style="width: 80%; margin: auto;">
    <canvas id="myChart"></canvas>
</div>

<script>
// Configuración y datos para el gráfico
var ctx = document.getElementById('myChart').getContext('2d');
var data = {
    labels: <?php echo json_encode($x_values); ?>,
    datasets: <?php echo json_encode($data); ?>,
};

// Configuración del gráfico
var options = {
    scales: {
        x: {
            type: 'linear',
            position: 'bottom'
        },
        y: {
            type: 'linear',
            position: 'left'
        }
    }
};

// Crear el gráfico
var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
});
</script>

</body>
</html>
