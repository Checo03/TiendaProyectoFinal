<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar el correo del formulario
$correo_usuario = $_POST['correo'];


$sql = "SELECT pregunta, respuesta FROM usuarios WHERE correo = '$correo_usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pregunta_seguridad = $row['pregunta'];
    $respuesta_correcta = $row['respuesta'];

   
    header("Location: reset_password.php?correo=$correo_usuario&pregunta=$pregunta_seguridad&respuesta=$respuesta_correcta");
} else {
    echo "<p>Correo no encontrado. Inténtalo de nuevo.</p>";
}

$conn->close();
?>
