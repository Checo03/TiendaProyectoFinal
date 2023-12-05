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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombreUsu'];
$titulo = $_POST['titulo'];
$calificacion = $_POST['calificacion'];
$comentario = $_POST['comentarioUsu'];
$nombreP=$_POST["nombreP"];


$sql = "INSERT INTO comentarios (nombre, titulo, calificacion, comentario, producto) VALUES ('$nombre', '$titulo', $calificacion, '$comentario', '$nombreP')";

if ($conn->query($sql) === TRUE) {
     // Respuesta para SweetAlert2
     echo '<script>
     Swal.fire({
         icon: "success",
         title: "Comentario insertado correctamente",
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
                    timer: 2500
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

