<?php
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

require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', array(80, 258));
$pdf->SetMargins(4, 10, 4);

$pdf->AddPage();

$pdf = new PDF_Code128('P', 'mm', array(80, 258));
$pdf->SetMargins(4, 10, 4);
$pdf->AddPage();

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$imagen_path = "Media/favicon.png";  // Reemplaza con la ruta de tu imagen
$pdf->Image($imagen_path, 22, $pdf->GetY() + 1, 2);
$pdf->Image($imagen_path, 56, $pdf->GetY() + 1, 2);

$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("REVOLT STUDIO")), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);

$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "UNIVERSIDAD AUTÓNOMA DE AGUASCALIENTES"), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 449-000-01"), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "audifonosuaa@gmail.com"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

date_default_timezone_set('America/Mexico_City');
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d/m/Y H:i")), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "REVOLT STUDIO ONLINE"), 0, 'C', false);
$pdf->SetFont('Arial', 'B', 10);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro: 1")), 0, 'C', false);
$pdf->SetFont('Arial', '', 9);

$pdf->Ln(1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $nombreC"), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: $email"), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $telefono"), 0, 'C', false);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Dirección: $direccion, $ciudad, $pais"), 0, 'C', false);

$pdf->Ln(1);
$pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

# Tabla de productos #
$pdf->Cell(10, 5, iconv("UTF-8", "ISO-8859-1", "Cant."), 0, 0, 'C');
$pdf->Cell(19, 5, iconv("UTF-8", "ISO-8859-1", "Precio"), 0, 0, 'C');
$pdf->Cell(15, 5, iconv("UTF-8", "ISO-8859-1", "Producto"), 0, 0, 'C');
$pdf->Cell(28, 5, iconv("UTF-8", "ISO-8859-1", "Total"), 0, 0, 'C');

$pdf->Ln(3);
$pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(3);

/*----------  Detalles de la tabla  ----------*/
foreach ($productosLista as $nombreProducto => $infoProducto) {
    $pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", $nombreProducto), 0, 'C', false);
    $pdf->Cell(10, 4, iconv("UTF-8", "ISO-8859-1", $infoProducto["cantidad"]), 0, 0, 'C');
    $pdf->Cell(19, 4, iconv("UTF-8", "ISO-8859-1", $infoProducto["precioUnitario"]), 0, 0, 'C');
    $pdf->Cell(57, 4, iconv("UTF-8", "ISO-8859-1","$ ". $infoProducto["precioTotal"]), 0, 0, 'C');
    $pdf->Ln(4);
}
$pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", "Garantía de fábrica: 2 Meses"), 0, 'C', false);
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/

$pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
$pdf->Ln(5);

# Impuestos & totales #
$pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
$pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 0, 0, 'C');
$pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "+ $subtotal USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
$pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "IVA (13%)"), 0, 0, 'C');
$pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "+ $impuesto USD"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
$pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "Envío"), 0, 0, 'C');
$pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "+ $envio USD"), 0, 0, 'C');  // Precio del envío

$pdf->Ln(5);

$pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');

$pdf->Ln(5);

$pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
$pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 0, 0, 'C');
$pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1","$ ". "$total USD"), 0, 0, 'C');


$pdf->Ln(5);

$pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
$pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "USTED AHORRA"), 0, 0, 'C');
$pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "- $descuento USD"), 0, 0, 'C');  // Variable de descuento

$pdf->Ln(10);

$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe presentar este ticket ***"), 0, 'C', false);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su compra"), '', 0, 'C');

$pdf->Ln(9);

# Genera un identificador único basado en la marca de tiempo actual
$codigo_barras = uniqid("COD", true);

# Codigo de barras #
$pdf->Code128(5, $pdf->GetY(), $codigo_barras, 70, 20);
$pdf->SetXY(0, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", $codigo_barras), 0, 'C', false);

# Añadir imagen al final del PDF
$imagen_path = "Media/Img/logo.png";  // Reemplaza con la ruta de tu imagen
$pdf->Image($imagen_path, 25, $pdf->GetY() + 8, 30);  // Ajusta la posición y tamaño según sea necesario

# Nombre del archivo PDF #
$pdf->Output("I", "Ticket_REVOLT-STUDIO.pdf", true);
?>
