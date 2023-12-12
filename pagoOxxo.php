<?php
session_start();


// Fecha de Caducidad del Codigo
function FechaCaducidad()
{
    $FechaActual = date('Y-m-d');
    $fechaCaducidad = date('Y-m-d', strtotime($FechaActual . ' + 13 days'));

    $aux = date('d/m/Y', strtotime($fechaCaducidad));
    return $aux;
}

//--------------------- Total Carrito -----------------------------------/
    include("ConfigBD/configAudi.php");

    
    $usuarioL=$_SESSION['usuario_logueado'];

    $sql = "SELECT nombre, descripcion, precioSD, precioF, imagen, COUNT(*) as cantidad FROM carrito WHERE usuario='$usuarioL' GROUP BY nombre";
    $result = $conn->query($sql);

    $totalPrecio = 0;
    $subTotalP=0;
    $montoDescuento=0;
    $cantidadPro=0;
    $subTotalSD=0;
    $totalSub=0;

    if ($result->num_rows > 0) {
        $totalPrecio = 0;

        while ($row = $result->fetch_assoc()) {
            $cantidadPro=$cantidadPro+$row["cantidad"];
            $precioForma= number_format($row["precioF"], 2, '.', ',');
            
            $subtotal = $row["precioF"] * $row["cantidad"];
            $subTotalSD= $row["precioSD"] * $row["cantidad"];
            $subTotalF= number_format($subtotal, 2, '.', ',');

            $totalPrecio += $subtotal;
            $totalSub+=$subTotalSD;
        }
        $montoDescuento=$totalSub-$totalPrecio;

        $subtotalTP= number_format($totalSub, 2, '.', ',');
        
        
        $montoDF= number_format($montoDescuento, 2, '.', ',');
        $totalF= number_format($totalPrecio, 2, '.', ',');
    } else {
        exit;
    }


//---------------------------------------

$fecha = FechaCaducidad();

require("FPDF/fpdf.php");

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', 'B', 25);
        $this->Cell(0, 15, 'Rovolt Sound Studio', 0, 0, 'L');
        $this->Cell(0, 10, $this->Image('Media\Img\Recibo\LogoOxxo.jpeg', 160, 10, 30), 0, 0, 'R');
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-45);
        $this->SetFont('Arial', '', 20);
        $this->SetTextColor(255, 0, 0);
        $this->Cell(0, 10, 'Tienes Algun Problema?', 0, 0, 'L');
        $this->Ln(15);
        $this->SetFont('Arial', 'I', 16);
        $this->Cell(0, 10, 'revoltstudio@empresa.com', 0, 0, 'L');
        $this->Ln(10);
        $this->SetFont('Arial', '', 16);
        $this->Cell(0, 10, 'Telefono: +449-584-4979', 0, 0, 'L');
    }
}

$pdf = new PDF();
$pdf->AddPage();

//Logo De la Empresa
$pdf->Image('Media\Img\Recibo\logoBlanco.png', 70, 30, 70);

// Total A Pagar
$pdf->Ln(90);
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(0, 10, 'Total A Pagar: $' . $totalF . 0, 1, 'L');
// Fecha de Caducidad
$pdf->Cell(0, 10, 'Fecha De Caducidad: ' . FechaCaducidad(), 0, 1, 'L');

// Codigo de Barras
$pdf->Image('Media\Img\Recibo\CodigoDeBarras.png', 70, 170, 70);

$pdf->Output('ReciboOxxo.pdf', 'D');
?>

