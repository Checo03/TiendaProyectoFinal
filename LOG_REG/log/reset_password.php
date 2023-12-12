<?php
    session_start();
    include("../../ConfigBD/configSesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Media/Img/Favicon/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="CabeceraEstilos.css">
<link rel="stylesheet" href="../../Estilos/PiePaginaEstilos.css">
<link rel="stylesheet" href="../../Estilos/LoginEstilos.css">
<link rel="stylesheet" type="text/css" href="sty.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
<style>

</style>

    <title>Revolt Sound Studios</title>
</head>
<body class="Container-Inicio">
    
    <?php  include("Cabeceraloh.php"); ?>    


    <h2>Recuperación de Contraseña</h2>
    <div class="Container-Login">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $correo_usuario = $_GET['correo'];
    $pregunta_seguridad = $_GET['pregunta'];
    $respuesta_correcta = $_GET['respuesta'];

    echo "<h2>Pregunta de seguridad:</h2>";
    

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
    </div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="Container-Footer">
        <footer>
                <div class="footer-content">
                    <div class="contact-info">
                        <h2>Información de Contacto</h2>
                        <p><i class="fas fa-map-marker-alt"></i> Dirección: Aguascalientes MX</p>
                        <p><i class="fas fa-phone"></i> Teléfono: +449-584-4979</p>
                        <p><i class="fas fa-envelope"></i> Correo Electrónico: revoltstudio@empresa.com</p>
                    </div>
                    <div class="social-links">
                        <h2>Síguenos en Redes Sociales</h2>
                        <div class="icon-container">
                            <span class="separator">|</span>
                            <a href="https://www.facebook.com/emi.harrera"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <span class="separator">|</span>
                            <a href="https://twitter.com/emiiherrerra_10"><i class="fab fa-twitter fa-lg"></i></a>
                            <span class="separator">|</span>
                            <a href="https://www.instagram.com/e.jherrera.10/"><i class="fab fa-instagram fa-lg"></i></a>
                            <span class="separator">|</span>
                            <a href="https://www.youtube.com"><i class="fab fa-youtube fa-lg"></i></a>
                            <span class="separator">|</span>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="copyright">
                    &copy; 2023 REVOLT-STUDIO| Todos los derechos reservados.
                </div>
                <div class="empresa2">
                    <img src="Media/Img/logo_final.png" width="100"  alt="">
                </div>
        </footer>
    </div>


    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 
</body>
</html>


