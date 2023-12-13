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

if (isset($_POST['comprarP'])) {
    $nombreC=$_POST["nombreCompleto"];
    $email=$_POST["email"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $pais=$_POST["pais"];
    $ciudad=$_POST["ciudad"];
    $impuesto=$_POST["impuesto"];
    $envio=$_POST["envioM"];
    $subtotal=$_POST["subtotalSM"];
    $descuento=$_POST["descuento"];
    $total=$_POST["total"];

    //valores en sesion
    $_SESSION["nombreCompleto"]=$nombreC;
    $_SESSION["email"]=$email;
    $_SESSION["direccion"]=$direccion;
    $_SESSION["telefono"]=$telefono;
    $_SESSION["pais"]=$pais;
    $_SESSION["ciudad"]=$ciudad;
    $_SESSION["impuesto"]=$impuesto;
    $_SESSION["envio"]=$envio;
    $_SESSION["subtotal"]=$subtotal;
    $_SESSION["descuento"]=$descuento;
    $_SESSION["total"]=$total;

    $usuarioC = $_SESSION["usuario_logueado"];
    $totalVenta = $_POST["total"];
    $productosComprados = array();
    $productosLista = array();
    $cantidadP = 0;

    $sql = "SELECT * FROM carrito WHERE usuario='$usuarioC'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { //recorre todo el carrito
            $productosComprados[] = $row["nombre"]; //guarda en un array el producto que se encuentre en el carrito
            $precioProducto = $row["precioF"];
            $nombreB=$row["nombre"]; //guarda el nombre
            if (isset($productosLista[$nombreB])) {
                // Si el producto ya existe, actualiza la cantidad y el precio total
                $productosLista[$nombreB]["cantidad"]++;
                $productosLista[$nombreB]["precioTotal"] += $precioProducto;
            } else {
                // Si el producto no existe en $productosLista, se añade con su precio y cantidad de productos en el carrito
                $productosLista[$nombreB] = array(
                    "precioUnitario" => $precioProducto,
                    "cantidad" => 1,
                    "precioTotal" => $precioProducto
                );
            }
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
    $_SESSION["productosLista"] = $productosLista;
    $_SESSION["cantidadT"]=$cantidadP;
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
                        window.location.href = "comprobante.php";
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




