<?php
session_start();

$nombreC = $_SESSION["nombreCompleto"];
$email = $_SESSION["email"];
$direccion = $_SESSION["direccion"];
$telefono = $_SESSION["telefono"];
$pais = $_SESSION["pais"];
$ciudad = $_SESSION["ciudad"];
$impuesto = $_SESSION["impuesto"];
$envio = $_SESSION["envio"];
$subtotal = $_SESSION["subtotal"];
$descuento = $_SESSION["descuento"];
$total = $_SESSION["total"];
$productosLista = $_SESSION["productosLista"];
$cantidadT=$_SESSION["cantidadT"];


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        #ticket {
            width: 80%;
            max-width: 600px;
            margin: 20px;
            padding: 20px;
            border: 2px solid #333;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow-x: auto; /* Agregado para permitir desplazamiento horizontal */
        }

        #logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        #logo img {
            max-width: 50px;
            max-height: 50px;
        }

        #header {
            text-align: center;
            margin-bottom: 10px;
        }

        #products {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 10px;
        }

        #products th, #products td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        #totals {
            width: 100%;
            text-align: right;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            display: block;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-send {
            background-color: #3498db;
            border: 1px solid #3498db;
            margin-left: 10px;
        }

        .button-send:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div id="ticket">
        <div id="logo">
            <img src="Media/favicon.png" alt="Logo1">
            <img src="Media/favicon.png" alt="Logo2">
        </div>

        <div id="header">
            <h2>REVOLT STUDIO</h2>
            <p>UNIVERSIDAD AUTÓNOMA DE AGUASCALIENTES</p>
            <p>Telefono: 449-000-01</p>
            <p>audifonosuaa@gmail.com</p>
            <hr>
            <p>Fecha: <?php echo date("d/m/Y H:i"); ?></p>
            <p>REVOLT STUDIO ONLINE</p>
            <p>Ticket Nro: 1</p>
            <hr>
            <p>Cliente: <?php echo $nombreC; ?></p>
            <p>Teléfono: <?php echo $telefono; ?></p>
            <p>Pais: <?php echo $pais; ?></p>
            <p>Ciudad: <?php echo $ciudad; ?></p>
            <p>Dirección: <?php echo $direccion; ?></p>
            <hr>
        </div>

        <table id="products">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Producto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productosLista as $nombreProducto => $infoProducto): ?>
                    <tr>
                        <td><?php echo $infoProducto["cantidad"]; ?></td>
                        <td>$<?php echo number_format($infoProducto["precioUnitario"], 2); ?></td>
                        <td><?php echo $nombreProducto ?></td>
                        <td>$<?php echo number_format($infoProducto["precioTotal"], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>CANTIDAD TOTAL: <?php echo $cantidadT ?> ARTICULOS</p>
        <hr>

        <div id="totals">
            <p>SUBTOTAL: + $<?php echo number_format($subtotal, 2); ?> USD</p>
            <hr>
            <p>IMPUESTO: $<?php echo number_format($impuesto, 2); ?> USD</p>
            <p>COSTO ENVIO: $<?php echo number_format($envio, 2); ?> USD</p>
            <p>DESCUENTO (CUPONES): $<?php echo number_format($descuento, 2); ?> USD</p>
            <p>TOTAL: $<?php echo number_format($total, 2); ?> USD</p>
            <?php $ahorro = $subtotal - $total; ?>
            <p>USTED AHORRA: $<?php echo number_format($ahorro, 2); ?> USD</p>
        </div>

        <hr>
        <div>
            <p>* Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolucion debe presentar este ticket *</p>
            <p><strong>Gracias por su compra</strong></p>
        </div>

        <hr>
        <div>
            <?php $codigo_barras = uniqid("COD", true); ?>
            <img width="250px" height="60px" src="Media/Img/codigoB.jpg" alt="codigoBarras">
            <p><?php echo $codigo_barras; ?></p>
            <center><img width="100px" height="100px" src="Media/Img/logo.png" alt="Logo"></center>
        </div>
        <a href="opcionesT.php" class="button button-send">Opciones detalladas</a>
        <a href="index.php" class="button button-send">Regresar</a>
    </div>
</body>
</html>
