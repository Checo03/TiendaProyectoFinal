<?php
session_start();

// Tamaño de la imagen del captcha
$width = 90; // Reduje el ancho
$height = 40; // Reduje la altura

// Crear una imagen
$image = imagecreatetruecolor($width, $height);

// Definir colores
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

// Rellenar el fondo de la imagen
imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

// Generar un texto aleatorio para el captcha
$captcha_text = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

// Almacenar el valor del captcha en la sesión
$_SESSION['captcha'] = $captcha_text;

$font_size = 3000;

imagestring($image, $font_size, 10, 10, $captcha_text, $text_color);


imagefilter($image, IMG_FILTER_SMOOTH, 3); 
imagefilter($image, IMG_FILTER_CONTRAST, -20); 


$image = imagerotate($image, rand(-15, 15), $background_color); // Reduje el rango de rotación

header('Content-Type: image/png');

imagepng($image);

imagedestroy($image);
?>
