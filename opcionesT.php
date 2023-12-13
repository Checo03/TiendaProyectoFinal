<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-send {
            background-color: #3498db;
            border: 1px solid #3498db;
        }

        .button-send:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Botones Estilizados</title>
</head>
<body>
<?php
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

// Imprimir las variables de sesión
/*
echo "Nombre Completo: $nombreC<br>";
echo "Email: $email<br>";
echo "Dirección: $direccion<br>";
echo "Teléfono: $telefono<br>";
echo "País: $pais<br>";
echo "Ciudad: $ciudad<br>";
echo "Impuesto: $impuesto<br>";
echo "Envío: $envio<br>";
echo "Subtotal: $subtotal<br>";
echo "Descuento: $descuento<br>";
echo "Total: $total<br>";
echo "Cantidad de productos: $cantidadT<br>";*/

/*
echo '<h2>Productos Comprados con Precios:</h2>';
echo '<ul>';
foreach ($productosLista as $nombreProducto => $infoProducto) {
    echo '<li>' . $nombreProducto . ' - Precio Unitario: ' . $infoProducto["precioUnitario"] . ' - Cantidad: ' . $infoProducto["cantidad"] . ' - Precio Total: ' . $infoProducto["precioTotal"] . '</li>';
}
echo '</ul>';*/
?>
 <form method="post" action="ticket.php">
    <!-- Campos ocultos con la información de la sesión -->
    <input type="hidden" name="nombreCompleto" value="<?php echo htmlspecialchars($nombreC); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="hidden" name="direccion" value="<?php echo htmlspecialchars($direccion); ?>">
    <input type="hidden" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>">
    <input type="hidden" name="pais" value="<?php echo htmlspecialchars($pais); ?>">
    <input type="hidden" name="ciudad" value="<?php echo htmlspecialchars($ciudad); ?>">
    <input type="hidden" name="impuesto" value="<?php echo htmlspecialchars($impuesto); ?>">
    <input type="hidden" name="envio" value="<?php echo htmlspecialchars($envio); ?>">
    <input type="hidden" name="subtotal" value="<?php echo htmlspecialchars($subtotal); ?>">
    <input type="hidden" name="descuento" value="<?php echo htmlspecialchars($descuento); ?>">
    <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">
    <input type="hidden" name="cantidadT" value="<?php echo htmlspecialchars($cantidadT); ?>">

    <!-- Campos ocultos para la lista de productos -->
    <?php foreach ($productosLista as $nombreProducto => $infoProducto) : ?>
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][precioUnitario]" value="<?php echo htmlspecialchars($infoProducto['precioUnitario']); ?>">
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][cantidad]" value="<?php echo htmlspecialchars($infoProducto['cantidad']); ?>">
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][precioTotal]" value="<?php echo htmlspecialchars($infoProducto['precioTotal']); ?>">
    <?php endforeach; ?>
    <div>
    <h2 style="text-align: right;">!!COMPRA EXITOSA¡¡</h2>
    <h3>¿Cómo quieres recibir tu ticket?</h3>
    <br>
    <!-- Botón de submit -->
    <button type="submit" name="generar_pdf" class="button">Abrir PDF</button>
    </div>
    
</form>
<form method="post" action="CorreoTicket.php">
    <!-- Campos ocultos con la información de la sesión -->
    <input type="hidden" name="nombreCompleto" value="<?php echo htmlspecialchars($nombreC); ?>">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="hidden" name="direccion" value="<?php echo htmlspecialchars($direccion); ?>">
    <input type="hidden" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>">
    <input type="hidden" name="pais" value="<?php echo htmlspecialchars($pais); ?>">
    <input type="hidden" name="ciudad" value="<?php echo htmlspecialchars($ciudad); ?>">
    <input type="hidden" name="impuesto" value="<?php echo htmlspecialchars($impuesto); ?>">
    <input type="hidden" name="envio" value="<?php echo htmlspecialchars($envio); ?>">
    <input type="hidden" name="subtotal" value="<?php echo htmlspecialchars($subtotal); ?>">
    <input type="hidden" name="descuento" value="<?php echo htmlspecialchars($descuento); ?>">
    <input type="hidden" name="total" value="<?php echo htmlspecialchars($total); ?>">
    <input type="hidden" name="cantidadT" value="<?php echo htmlspecialchars($cantidadT); ?>">

    <!-- Campos ocultos para la lista de productos -->
    <?php foreach ($productosLista as $nombreProducto => $infoProducto) : ?>
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][precioUnitario]" value="<?php echo htmlspecialchars($infoProducto['precioUnitario']); ?>">
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][cantidad]" value="<?php echo htmlspecialchars($infoProducto['cantidad']); ?>">
        <input type="hidden" name="productosLista[<?php echo htmlspecialchars($nombreProducto); ?>][precioTotal]" value="<?php echo htmlspecialchars($infoProducto['precioTotal']); ?>">
    <?php endforeach; ?>
    <div>
    <!-- Botón de submit -->
    <br><br><br><br><br><br><br>
    <button type="submit" name="action" value="enviar_correo" class="button button-send">Enviar por Correo</button>
    </div>
</form>


</body>
</html>