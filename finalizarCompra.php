<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Compra registrada</title>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (isset($_GET["monto"])) {
    $usuarioC = $_SESSION["usuario_logueado"];
    $totalVenta = $_GET["monto"];
    $productosComprados = array();
    $cantidadP = 0;

    $sql = "SELECT * FROM carrito WHERE usuario='$usuarioC'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { //recorre todo el carrito
            $productosComprados[] = $row["nombre"]; //guarda en un array el producto que se encuentre en el carrito
            $nombreB=$row["nombre"]; //guarda el nombre
            $prodM=1;   //resta de cantidades
            $sqlSele = "SELECT * FROM productos WHERE nombre ='$nombreB'"; //selecciona el producto a modificar
            $resultado = $conexion->query($sqlSele);
            if ($resultado->num_rows > 0) { //verifica q exista
                $modE= $resultado->fetch_assoc();
                $actEx = $modE['cantidad']-$prodM; //crea una nueva variable con el nuevo valñor de cantidad
                $nombrePA=$modE['nombre'];
            }
            $sqlUpd = "UPDATE productos SET cantidad= '$actEx' WHERE nombre = '$nombrePA'"; //lo actualiza en la tabla de los productos
            $conexion->query($sqlUpd);

            $cantidadP = $cantidadP + 1;
        }
    }

    // Convertir el array de productos a una cadena
    $productosCompradosStr = implode(", ", $productosComprados);
    //echo $productosCompradosStr;
    $sqlIn = "INSERT INTO ventas (cliente, total, productos, cantidad) VALUES ('$usuarioC', $totalVenta, '$productosCompradosStr', $cantidadP)";

    if ($conexion->query($sqlIn) === TRUE) {
        $sqlBorrar = "DELETE FROM carrito WHERE usuario='$usuarioC'";
        $conexion->query($sqlBorrar);
        echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Compra realizada",
                        showConfirmButton: false,
                        timer: 3500
                    }).then(function () {
                        window.location.href = "verCarrito.php";
                    });
                  </script>';
    } else {
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error al actualizar el producto",
            text: "' . $conexion->error . '"
        });
      </script>';
    }
    

    /*echo '<h2>Productos Comprados:</h2>';
    echo '<ul>';
    foreach ($productosComprados as $producto) {
        echo '<li>' . $producto . '</li>';
    }
    echo '</ul>';*/
}

?>
</body>
</html>




