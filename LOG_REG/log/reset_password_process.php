<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            ?>
            <script>
        document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Contraseña Restablecida con éxito',
            icon: 'success',
        confirmButtonText: 'Aceptar'
        }).then(() => {
        console.log('Redirigiendo a panel_control.php');
        window.location.href = 'panel_control.php';
    });
});
</script>


            <?php
            $conn->close();
        } else {
            ?>
            <script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        title: 'Contraseñas No coinciden',
        icon: 'error',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        window.history.back();
    });
});
</script>
<?php
        }
    } else {
        ?>
        <script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
    title: '>Respuesta incorrecta. Inténtalo de nuevo.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
}).then(() => {
    window.history.back();
});
});
</script>
<?php
       
    }
}
?>
