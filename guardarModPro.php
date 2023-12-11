<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cambios hechos</title>
</head>
<body>

<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'audifonos';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
}

if (isset($_POST['guardarC'])) {
    $idP = $_POST["idP"];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $conectividad = $_POST["conectividad"];
    $colorP = $_POST["colorP"];
    $haveDesc = $_POST["descuentoH"];
    if ($haveDesc == "no") {
        $descuento = 0;
    } else {
        $descuento = $_POST["descuento"];
    }

    $imagen_path = $_POST["imagen_actual"];
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_path = "uploads/" . $_FILES['imagen']['name'];
        move_uploaded_file($imagen_tmp, $imagen_path);
    }

    $imagen2_path = $_POST["imagen2_actual"];
    if (!empty($_FILES['imagen2']['name'])) {
        $imagen_tmp2 = $_FILES['imagen2']['tmp_name'];
        $imagen2_path = "uploads/" . $_FILES['imagen2']['name'];
        move_uploaded_file($imagen_tmp2, $imagen2_path);
    }

    $imagen3_path = $_POST["imagen3_actual"];
    if (!empty($_FILES['imagen3']['name'])) {
        $imagen_tmp3 = $_FILES['imagen3']['tmp_name'];
        $imagen3_path = "uploads/" . $_FILES['imagen3']['name'];
        move_uploaded_file($imagen_tmp3, $imagen3_path);
    }

    $imagen4_path = $_POST["imagen4_actual"];
    if (!empty($_FILES['imagen4']['name'])) {
        $imagen_tmp4 = $_FILES['imagen4']['tmp_name'];
        $imagen4_path = "uploads/" . $_FILES['imagen4']['name'];
        move_uploaded_file($imagen_tmp4, $imagen4_path);
    }

    $sql = "UPDATE productos SET nombre = '$nombre', categoria= '$categoria', marca= '$marca', descripcion= '$descripcion', cantidad= '$cantidad', precio= '$precio', conectividad= '$conectividad', color= '$colorP', descuento= '$haveDesc', montodesc= '$descuento', imagen= '$imagen_path', imagen2= '$imagen2_path', imagen3= '$imagen3_path', imagen4= '$imagen4_path' WHERE id = $idP";

    if ($conexion->query($sql)) {
        // Respuesta para SweetAlert2
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Producto actualizado correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = "productos.php";
                });
              </script>';
    } else {
        // Respuesta para SweetAlert2
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error al actualizar el producto",
                    text: "' . $conexion->error . '"
                });
              </script>';
    }
}
?>

</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('guardarC').addEventListener('click', function () {
            //solicitud AJAX para enviar los datos del formulario al servidor

            // En la respuesta exitosa del servidor
            let response = {
                status: 'success', 
                title: 'Producto actualizado correctamente', 
                text: ''
            };

            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: response.title,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    window.location.href = 'productos.php';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: response.title,
                    text: response.text
                });
            }
        });
    });
</script>

