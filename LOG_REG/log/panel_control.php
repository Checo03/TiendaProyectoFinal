<?php
session_start();
// Verificar si el usuario está logeado
if (isset($_SESSION['usuario_logueado'])) {
    $usuario_logueado = $_SESSION['usuario_logueado'];
} else {
    // Si el usuario no está logeado, redirigir a la página de inicio de sesión
    header("Location: log.php");
    exit;
}
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el estado de administrador del usuario
$sql_admin = "SELECT admin FROM usuarios WHERE cuenta = '$usuario_logueado'";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
    $row_admin = $result_admin->fetch_assoc();
    $es_admin = $row_admin['admin'];

    // Mensaje de bienvenida según el estado de administrador
    $mensaje_bienvenida = $es_admin ? "Bienvenido Administrador, $usuario_logueado!" : "Bienvenido Usuario, $usuario_logueado!";
} else {
    // En caso de error, muestra un mensaje genérico
    $mensaje_bienvenida = "Bienvenido, $usuario_logueado!";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="sty.css">
</head>
<body>
    <div class="Container-Login">
        <div class="Form-Login">
            <h1>Panel de Control</h1>

            <p><?php echo $mensaje_bienvenida; ?></p>

            <div class="Form-Control">
                <a href="../../index.php">Ir al Inicio</a>
            </div>

            <div class="Form-Control">
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</body>
</html>
