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
        $mail->Password = 'holaquehace89';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port = 587;

        // Configura el remitente y el destinatario
        $mail->setFrom('CorreoFabiel@outlook.com', 'FabielOR');
        $mail->addAddress('CorreoFabiel@outlook.com', 'Nombre Destinatario');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje del formulario';
        $mail->Body    = "Nombre: $nombre<br>Correo electronico: $email<br><br>Mensaje: $mensaje <br><br> Estamos procesando la información de tu petición. 
        Tendremos que analizar profundamente el caso para proporcionar una respuesta. 
        Por favor, sé paciente y espera.";

        // Enviar el correo
        $mail->send();

        echo "MENSAJE ENVIADO CON EXITO!!! :D";
    } catch (Exception $e) {
        echo "ERROR!!! al enviar el mensaje: {$mail->ErrorInfo}";
    }
