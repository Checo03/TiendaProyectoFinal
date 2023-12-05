<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    ?>
            <script>
        document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Correo no encontrado. Inténtalo de nuevo',
            icon: 'error',
        confirmButtonText: 'Aceptar'
        }).then(() => {
        console.log('Redirigiendo....');
        window.location.href = 'recover_password.php';
        });
        });
        </script>
        
        
            <?php
     ?>
     <script>
 document.addEventListener('DOMContentLoaded', function () {
 Swal.fire({
     title: 'Correo no encontrado.',
     icon: 'error',
 confirmButtonText: 'Aceptar'
 }).then(() => {
 console.log('Redirigiendo...');
 window.location.href = 'recover_password.php';
 });
 });
 </script>
 
 
     <?php
}

$conn->close();
?>
