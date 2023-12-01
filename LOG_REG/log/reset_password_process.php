<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $correo_usuario = $_POST['correo'];
    $respuesta_ingresada = $_POST['respuesta'];
    $respuesta_correcta = $_POST['respuesta_correcta'];
    $nueva_password = $_POST['nueva_password'];
    $confirmar_password = $_POST['confirmar_password'];

    // Verificar si la respuesta ingresada es correcta
    if ($respuesta_ingresada === $respuesta_correcta) {
        // Verificar si las contraseñas coinciden
        if ($nueva_password === $confirmar_password) {
            // Encriptar la nueva contraseña con hash
            $password_hashed = password_hash($nueva_password, PASSWORD_DEFAULT);

            // Actualizar la contraseña y el campo 'bloq' en la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "proy";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Actualizar la contraseña y el campo 'bloq'
            $sql = "UPDATE usuarios SET password = '$password_hashed', bloq = 0 WHERE correo = '$correo_usuario'";
            $conn->query($sql);

            echo "<p>Contraseña restablecida con éxito.</p>";

            $conn->close();
        } else {
            echo "<p>Las contraseñas no coinciden. Inténtalo de nuevo.</p>";
        }
    } else {
        echo "<p>Respuesta incorrecta. Inténtalo de nuevo.</p>";
    }
}
?>
