<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registro producto</title>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$conectividad=$_POST["conectividad"];
$colorP=$_POST["colorP"];
//$descuento = isset($_POST['descuento']) ? $_POST['descuento'] : 0;
$haveDesc=$_POST["descuentoH"];
if($haveDesc=="no") {
    $descuento=0;
}
else {
    $descuento=$_POST["descuento"];
}

// Procesa la imagen de presentacion
$imagen = $_FILES['imagen']['name'];
$imagen_tmp = $_FILES['imagen']['tmp_name'];
$imagen_path = "uploads/" . $imagen;

// Mover la imagen al directorio de subidas
move_uploaded_file($imagen_tmp, $imagen_path);

//imagen2
$imagen2 = $_FILES['imagen2']['name'];
$imagen_tmp2 = $_FILES['imagen2']['tmp_name'];
$imagen_path2 = "uploads/" . $imagen2;

// Mover la imagen al directorio de subidas
move_uploaded_file($imagen_tmp2, $imagen_path2);

//imagen3
$imagen3 = $_FILES['imagen3']['name'];
$imagen_tmp3 = $_FILES['imagen3']['tmp_name'];
$imagen_path3 = "uploads/" . $imagen3;

// Mover la imagen al directorio de subidas
move_uploaded_file($imagen_tmp3, $imagen_path3);

//imagen4
$imagen4 = $_FILES['imagen4']['name'];
$imagen_tmp4 = $_FILES['imagen4']['tmp_name'];
$imagen_path4 = "uploads/" . $imagen4;

// Mover la imagen al directorio de subidas
move_uploaded_file($imagen_tmp4, $imagen_path4);

$sql = "INSERT INTO productos (nombre, categoria, marca, descripcion, cantidad, precio, conectividad, color, descuento, montodesc, imagen, imagen2, imagen3, imagen4) VALUES ('$nombre', '$categoria', '$marca', '$descripcion', $cantidad, $precio,'$conectividad','$colorP', '$haveDesc', $descuento, '$imagen_path', '$imagen_path2', '$imagen_path3', '$imagen_path4')";


if ($conn->query($sql) === TRUE) {
    echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Producto insertado correctamente",
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location.href = "productos.php";
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


$conn->close();
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

