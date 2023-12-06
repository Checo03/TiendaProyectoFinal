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
    die('Error en la conexión');
}

if (isset($_GET['id'])) {
    $idP = $_GET['id'];

    $sqlSelect = "SELECT * FROM productos WHERE id = $idP";
    $resultado = $conexion->query($sqlSelect);

    if ($resultado->num_rows > 0) {
        $Nameproducto = $resultado->fetch_assoc();
        $productoB = $conexion->real_escape_string($Nameproducto["nombre"]); //la funcion es para evitar caracteres especiales

        $sqlElim = "DELETE FROM productos WHERE id = $idP";
        $sqlComentarios = "DELETE FROM comentarios WHERE producto='$productoB'"; 

        if ($conexion->query($sqlElim) && $conexion->query($sqlComentarios)) {
            // Respuesta para SweetAlert2
            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Producto eliminado correctamente",
                showConfirmButton: false,
                timer: 2500
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
    } else {
        echo 'No se encontró un registro del producto con ID: $idP';
    }

    $conexion->close();
} else {
    echo 'No hay ID seleccionado.';
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
=======
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
    die('Error en la conexión');
}

if (isset($_GET['id'])) {
    $idP = $_GET['id'];

    $sqlSelect = "SELECT * FROM productos WHERE id = $idP";
    $resultado = $conexion->query($sqlSelect);

    if ($resultado->num_rows > 0) {
        $Nameproducto = $resultado->fetch_assoc();
        $productoB = $conexion->real_escape_string($Nameproducto["nombre"]); //la funcion es para evitar caracteres especiales

        $sqlElim = "DELETE FROM productos WHERE id = $idP";
        $sqlComentarios = "DELETE FROM comentarios WHERE producto='$productoB'"; 

        if ($conexion->query($sqlElim) && $conexion->query($sqlComentarios)) {
            // Respuesta para SweetAlert2
            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Producto eliminado correctamente",
                showConfirmButton: false,
                timer: 2500
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
    } else {
        echo 'No se encontró un registro del producto con ID: $idP';
    }

    $conexion->close();
} else {
    echo 'No hay ID seleccionado.';
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
>>>>>>> a71da378d61e4910c2ba0b359f1f525aca5d637d
