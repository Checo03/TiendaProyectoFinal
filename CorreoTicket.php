<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();

$nombreC = $_POST["nombreCompleto"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$pais = $_POST["pais"];
$ciudad = $_POST["ciudad"];
$impuesto = $_POST["impuesto"];
$envio = $_POST["envio"];
$subtotal = $_POST["subtotal"];
$descuento = $_POST["descuento"];
$total = $_POST["total"];
$productosLista = $_POST["productosLista"];
$cantidadT = $_POST["cantidadT"];

// Construir el mensaje de correo
$mensaje =  "==========================================\n";
$mensaje .= "      TU COMPRA EN REVOLT STUDIO\n "  ;
$mensaje .= "==========================================\n";
$mensaje .= "Nombre Completo: " . $nombreC . "\n";
$mensaje .= "Email: " . $email . "\n";
$mensaje .= "Direccion: " . $direccion . "\n";
$mensaje .= "Telefono: " . $telefono . "\n";
$mensaje .= "Pais: " . $pais . "\n";
$mensaje .= "Ciudad: " . $ciudad . "\n";
$mensaje .= "------------------------------------------\n";
$mensaje .= "DETALLES DE LOS PRODUCTOS\n";
$mensaje .= "------------------------------------------\n";

foreach ($productosLista as $nombreProducto => $infoProducto) {
    $mensaje .= $nombreProducto . "\n";
    $mensaje .= "   Cantidad: " . $infoProducto['cantidad'] . "\n";
    $mensaje .= "   Precio Total:  $" . $infoProducto['precioTotal'] . "\n";
    $mensaje .= "------------------------------------------\n";
}

$mensaje .= "Cantidad Total de Productos: " . $cantidadT . "\n";
$mensaje .= "==========================================\n";
$mensaje .= "                  RESUMEN\n";
$mensaje .= "==========================================\n";
$mensaje .= "Subtotal: +$". $subtotal . "\n";
$mensaje .= "Impuestos: +$" . $impuesto . "\n";
$mensaje .= "Envío: +$" . $envio . "\n";

// Agregar descuento si existe
if (!empty($descuento)) {
$mensaje .= "Descuento:  -$" . $descuento . "\n";
}

$mensaje .= "Total:       $" . $total . "\n";
$mensaje .= "==========================================\n";

$mensaje .= "*** Precios de productos incluyen impuestos
                Para poder realizar reclamo o devolución
                    debe presentarse este ticket ***\n";
$mensaje .="==== GRACIAS POR SU COMPRA ====\n";
// Configurar PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.office365.com'; // Ejemplo: smtp.gmail.com
$mail->SMTPAuth = true;
$mail->Username = 'CorreoFabiel@outlook.com';
$mail->Password = 'Holaquehace89';
$mail->SMTPSecure = 'tls'; // O 'ssl' para SSL
$mail->Port = 587; // Puerto SMTP

// Configurar destinatario, remitente, asunto y cuerpo del correo
$mail->setFrom('CorreoFabiel@outlook.com', 'REVOLT STUDIO');
$mail->addAddress($email, $nombreC);
$mail->Subject = 'Ticket de tu compra - REVOLT STUDIO';
$mail->Body = $mensaje;

$mensajeConfirmacion = '';
try {
    // Enviar el correo
    $mail->send();
    $mensajeConfirmacion = 'Correo enviado correctamente';
} catch (Exception $e) {
    $mensajeConfirmacion = "Error al enviar el correo: {$mail->ErrorInfo}";
}

// Mostrar el mensaje de confirmación
echo $mensajeConfirmacion;

header("Location: index.php");
exit();
?>