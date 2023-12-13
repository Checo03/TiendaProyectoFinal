<?php
  session_start();
  include("ConfigBD/configSesion.php");

    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'audifonos';

    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }
    else{
        // Consulta SQL
        $sql = "SELECT nombre, cantidad FROM productos";
        $sql2= "SELECT cliente, total FROM ventas";

        $result = $conexion->query($sql);
        $result2 = $conexion->query($sql2);

        $productos = [];
        $ventas = [];
        $clientes = [];
        $total = [];

        // Obtener datos de la consulta
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = $row['nombre'];
                $ventas[] = $row['cantidad'];
            }
        }
        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                $clientes[] = $row2['cliente'];
                $total[] = $row2['total'];
            }
        }
    }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graficas de tienda</title>
    <link rel="shortcut icon" href="Media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  

    <style>
      body .navbar{
        background: #005B41 !important;
      }
    </style>
    
</head>
<body style="background-color: beige;">
    <?php include("Cabecera.php"); ?>

    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div style="margin-top: 140px; width: 75%;" class="col-md-10 col-sm-12">
            <h2 class="text-center" style="font-weight: bold; color: #005B41;">Existencia de Productos</h2>
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 col-sm-12"></div>
        <div style="width: 75%;" class="col-md-10 col-sm-12 py-5">
            <h2 class="text-center" style="font-weight: bold; color: #005B41;">Compras de clientes</h2>
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    
    <div class="Container-Footer">
    <footer>
            <div class="footer-content">
                <div class="contact-info">
                    <h2>Información de Contacto</h2>
                    <p><i class="fas fa-map-marker-alt"></i> Dirección: Aguascalientes MX</p>
                    <p><i class="fas fa-phone"></i> Teléfono: +449-584-4979</p>
                    <p><i class="fas fa-envelope"></i> Correo Electrónico: revoltstudio@empresa.com</p>
                </div>
                <div class="social-links">
                    <h2>Síguenos en Redes Sociales</h2>
                    <div class="icon-container">
                        <span class="separator">|</span>
                        <a href="https://www.facebook.com/emi.harrera"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <span class="separator">|</span>
                        <a href="https://twitter.com/emiiherrerra_10"><i class="fab fa-twitter fa-lg"></i></a>
                        <span class="separator">|</span>
                        <a href="https://www.instagram.com/e.jherrera.10/"><i class="fab fa-instagram fa-lg"></i></a>
                        <span class="separator">|</span>
                        <a href="https://www.youtube.com"><i class="fab fa-youtube fa-lg"></i></a>
                        <span class="separator">|</span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="copyright">
                &copy; 2023 REVOLT-STUDIO| Todos los derechos reservados.
            </div>
            <div class="empresa2">
                <img src="Media/Img/logo_final.png" width="100"  alt="">
            </div>
    </footer>
</div>
    <script>
        // Obtener datos desde PHP y convertirlos a formato JavaScript
        var productos = <?php echo json_encode($productos); ?>;
        var ventas = <?php echo json_encode($ventas); ?>;

        var clientes = <?php echo json_encode($clientes); ?>;
        var total = <?php echo json_encode($total); ?>;

        // Configurar los datos para la gráfica
        var data = {
            labels: productos,
            datasets: [{
                label: 'Existencia en tienda',
                data: ventas,
                backgroundColor: '#12530c',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Configurar opciones de la gráfica
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Crear la instancia de la gráfica
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

        

        // Configurar los datos para la gráfica
        var data2 = {
            labels: clientes,
            datasets: [{
                label: 'Compras $',
                data: total,
                backgroundColor: '#12530c',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Configurar opciones de la gráfica
        var options2 = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Crear la instancia de la gráfica
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: data2,
            options: options2
        });
    </script>

</body>