<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $correo_usuario = $_GET['correo'];
    $pregunta_seguridad = $_GET['pregunta'];
    $respuesta_correcta = $_GET['respuesta'];

    echo "<h2>Pregunta de seguridad:</h2>";
    echo "<p>$pregunta_seguridad</p>";

    echo "<form action='reset_password_process.php' method='post'>";
    echo "<input type='hidden' name='correo' value='$correo_usuario'>";
    echo "<input type='hidden' name='respuesta_correcta' value='$respuesta_correcta'>";

    if ($pregunta_seguridad == "mascota") {
        echo "<label for='respuesta'>Nombre de tu mascota:</label>";
    } elseif ($pregunta_seguridad == "ciudad") {
        echo "<label for='respuesta'>Ciudad de nacimiento:</label>";
    } elseif ($pregunta_seguridad == "amigo") {
        echo "<label for='respuesta'>Nombre de tu mejor amigo:</label>";
    }

    echo "<input type='text' id='respuesta' name='respuesta' required><br>";
    echo "<label for='nueva_password'>Nueva contraseña:</label>";
    echo "<input type='password' id='nueva_password' name='nueva_password' required><br>";
    echo "<label for='confirmar_password'>Confirmar contraseña:</label>";
    echo "<input type='password' id='confirmar_password' name='confirmar_password' required><br>";
    echo "<input type='submit' value='Restablecer contraseña'>";
    echo "</form>";
}
?>
