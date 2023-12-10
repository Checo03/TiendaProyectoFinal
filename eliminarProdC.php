<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modificando carrito</title>
</head>
<body>
<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'audifonos';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexión');
}
if (isset($_GET['nombreActP']) && isset($_GET['cantidadA'])  && isset($_GET['cantidadBorrarP'])) {
    
    $nombrePro=$_GET["nombreActP"];
    $cantidadA=$_GET["cantidadA"];
    $cantidadN=$_GET["cantidadBorrarP"];
    echo "Nombre: $nombrePro<br>";
    echo "Cantidad: $cantidadA";
    echo "Cantidad: $cantidadN";
    if($cantidadA>$cantidadN) {
        $diferenciaB=$cantidadA-$cantidadN;
        $sqlBorrar = "DELETE FROM carrito WHERE nombre='$nombrePro' LIMIT $diferenciaB";
       if($conexion->query($sqlBorrar)) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Producto(s) eliminados correctamente del carrito",
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location.href = "verCarrito.php";
                });
              </script>';
       }
       else {
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error al actualizar el producto",
            text: "' . $conexion->error . '"
        });
      </script>';

       }


}else if($cantidadA<$cantidadN) {
    $diferenciaN=$cantidadN-$cantidadA;
    $descripcionP=$_GET["descripcionA"];
    $precioSN=$_GET["precioSDA"];
    $precioF=$_GET["precioFA"];
    $imagenPS=$_GET["imagenA"];
    for($i=0; $i<$diferenciaN; $i++) {
        $sqlC = "INSERT INTO carrito (nombre, descripcion, precioSD, precioF, imagen) VALUES ('$nombrePro', '$descripcionP', $precioSN, $precioF,'$imagenPS')";
        $conexion->query($sqlC);
        if($i==$diferenciaN-1) {
            echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Producto(s) agregados correctamente del carrito",
                    showConfirmButton: false,
                    timer: 3500
                }).then(function () {
                    window.location.href = "verCarrito.php";
                });
              </script>';
        } 
    }

    
}else {
    $sqlBorrar = "DELETE FROM carrito WHERE nombre='$nombrePro'";
       if($conexion->query($sqlBorrar)) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Producto eliminado correctamente del carrito",
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location.href = "verCarrito.php";
                });
              </script>';
       }
       else {
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error al actualizar el producto",
            text: "' . $conexion->error . '"
        });
      </script>';
    }

}
}



?>
