<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Envio de correo</title>
</head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
 
// Incluye el autoload de PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];
 
    // Crear/ una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);
 
    try {
        // Configurar el servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'CorreoFabiel@outlook.com';
        $mail->Password = 'Holaquehace89';
        $mail->SMTPSecure = 'tls';  // Cambiado a TLS
        $mail->Port = 587;  // Puerto para TLS
 
        // Configura el remitente y el destinatario
        $mail->setFrom('CorreoFabiel@outlook.com', 'RevoltS');
        $mail->addAddress($email);
 
        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje del formulario';
        $mail->Body    = "Nombre: $nombre<br>Correo electronico: $email<br><br> Telefono: $telefono<br><br>
        Mensaje: $mensaje <br><br> Estamos analizando tu anterior mensaje para poder proporcionarte una respuesta concreta. 
        Agradeceriamos tu comprension y paciencia, de antemano gracias!.<br>
        Si gustas por el momento puedes checar nuestras nuevas ofertas para que no te pierdas los mejores
        precios en los mejores productos.";
 
        // Enviar el correo
        $mail->send();
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Mensaje enviado con exito",
            showConfirmButton: false,
            timer: 2500
        }).then(function () {
            window.location.href = "contactanos.php";
        });
      </script>';
    } catch (Exception $e) {
        echo "ERROR!!! al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>