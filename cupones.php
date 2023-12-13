<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagen_adjunta = isset($_POST['imagen_adjunta']) ? $_POST['imagen_adjunta'] : 0;
    $emailR=$_POST["email"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'CorreoFabiel@outlook.com';
        $mail->Password = 'Holaquehace89';
        $mail->SMTPSecure = 'tls';  // Cambiado a TLS
        $mail->Port = 587;  // Puerto para TLS
 
        // Configura el remitente y el destinatario
        $mail->setFrom('CorreoFabiel@outlook.com', 'RevoltS');
        $mail->addAddress($emailR);
        $mail->Subject = 'Asunto del Correo'; 

        // Cuerpo del Correo
        $nombre_usuario = ''; // Obtén el nombre del usuario desde el formulario si lo tienes
        $mail->Body = "Hola $nombre_usuario,\n\nGracias por suscribirte. Este es el cuerpo del correo.";

        // Adjuntar la imagen al correo si está presente
        if ($imagen_adjunta) {
            $ruta_imagen = __DIR__ . '/Media/Img/cupon3.jpeg'; // Ruta absoluta a la imagen
            if (file_exists($ruta_imagen)) {
                $mail->addAttachment($ruta_imagen, 'cupon3.jpeg');
            } else {
                echo "ERROR!!! El archivo de imagen no existe.";
            }
        }

        // Enviar el correo
        $mail->send();

        echo "MENSAJE ENVIADO CON ÉXITO!!! :D";
    } catch (Exception $e) {
        echo "ERROR!!! al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilo/estilosCupones.css">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <title>Cupones de Compra</title>
</head>
<body>
    
    <h3>Cupón de Descuento Exclusivo para nuestros usuarios en la web:</h3>
    <h3>50% OFF en Todos los Productos</h3>
    <section class="cupon-container">
        <img src="Media/Img/cupon1.jpeg" alt="Cupón de Descuento" width="350" height="350">
    </section>
    <br>
    <br>
    <br>
    <section id="cupon-instagram">
        <h3>Cupón Exclusivo para Seguidores de Instagram</h3>
        <p>¡Gracias por seguirnos en Instagram! Disfruta de beneficios exclusivos como nuestro seguidor.</p>
        <a href="https://www.instagram.com/p/C0xAx-NpHmz/?utm_source=ig_web_copy_link" target="_blank" class="instagram-link">
    <i class="fab fa-instagram fa-lg"></i> 
</a>
            <br>
            <h3>@revolt.__studio</h3>
        </a>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section id="formulario-suscripcion" style="text-align: center;">
        <img src="Media/Img/Subs.jpg" width="100" height="100" alt="">
        <h2>Suscríbete para recibir un cupón de descuento</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" required>
            <input type="hidden" name="imagen_adjunta" value="1"> <!-- Campo oculto para indicar que hay una imagen adjunta -->
            <button type="submit">Suscribirse ahora</button>
            <div style="margin-top: 10px;"> 
                <img src="Media/Img/correoEnviado.jpg" width="70" height="70" alt="" style="display: inline-block;">
            </div>
        </form>
    </section>
<br>
<br>
<br>
<br>
<br>
<br>
    <?php include 'footer.php'; ?>
</body>
</html>
