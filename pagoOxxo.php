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

    include("ConfigBD/configAudi.php");

    $usuarioL = $_SESSION['usuario_logueado'];

    $sql = "SELECT nombre, descripcion, precioSD, precioF, imagen, COUNT(*) as cantidad FROM carrito WHERE usuario='$usuarioL' GROUP BY nombre";
    $result = $conn->query($sql);

    $totalPrecio = 0;
    $subTotalP = 0;
    $montoDescuento = 0;
    $cantidadPro = 0;
    $subTotalSD = 0;
    $totalSub = 0;

    if ($result->num_rows > 0) {
        $totalPrecio = 0;

        while ($row = $result->fetch_assoc()) {
            $cantidadPro = $cantidadPro + $row["cantidad"];
            $precioForma = number_format($row["precioF"], 2, '.', ',');

            $subtotal = $row["precioF"] * $row["cantidad"];
            $subTotalSD = $row["precioSD"] * $row["cantidad"];
            $subTotalF = number_format($subtotal, 2, '.', ',');

            $totalPrecio += $subtotal;
            $totalSub += $subTotalSD;
        }
        $montoDescuento = $totalSub - $totalPrecio;

        $subtotalTP = number_format($totalSub, 2, '.', ',');

        $montoDF = number_format($montoDescuento, 2, '.', ',');
        $totalF = number_format($totalPrecio, 2, '.', ',');
    } else {
        exit;
    }

    require("FPDF/fpdf.php");

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo de la Empresa
            $this->Image('Media\Img\Recibo\logoBlanco.png', 10, 5, 40);


            $this->Image('Media\Img\Recibo\LogoOxxo.jpeg', 150, 10, 40);

            $this->SetFont('Arial', 'B', 18);
            $this->SetTextColor(0, 0, 0);
        }

        // Pie de página
        function Footer()
        {
            $this->SetY(-45);

            // Línea divisoria
            $this->Cell(0, 0, '', 'T');

            $this->SetFont('Arial', '', 14);
            $this->SetTextColor(255, 0, 0);

            // Información de contacto
            $this->Ln(5);
            $this->Cell(0, 10, 'Tienes algun problema?', 0, 1, 'L');
            $this->SetFont('Arial', 'I', 14);
            $this->Cell(0, 10, 'revoltstudio@empresa.com', 0, 1, 'L');
            $this->SetFont('Arial', '', 14);
            $this->Cell(0, 10, 'Telefono: +449-584-4979', 0, 1, 'L');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();

    // Título llamativo
    $pdf->Ln(50);
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTextColor(16, 77, 140);
    $pdf->Cell(0, 10, 'Gracias por tu compra', 0, 1, 'C');

    // Total A Pagar
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(0, 10, 'Resumen de Compra', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Total a Pagar: $' . $totalF, 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Fecha de Caducidad: ' . FechaCaducidad(), 0, 1, 'C');

    // Separador visual
    $pdf->Ln(15);
    $pdf->SetFillColor(16, 77, 140);
    $pdf->Rect(60, $pdf->GetY(), 90, 1, 'F');
    $pdf->Ln(10);

    // Agradecimiento
    $pdf->SetFont('Arial', '', 16);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(0, 10, 'Agradecemos tu preferencia en Rovolt Sound Studio. Para cualquier consulta o problema, no dudes en contactarnos. Esperamos verte pronto!', 0, 'C');

    // Código de Barras
    $pdf->Image('Media\Img\Recibo\CodigoDeBarras.png', 70, $pdf->GetY() + 20, 70);

    $pdf->AddPage();
    $pdf->Ln(40);
    
    
    // Detalle de compra
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Detalle de Compra', 0, 1, 'C');

    $pdf->Ln(10);

    // Encabezados de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 10, 'Producto', 1);
    $pdf->Cell(30, 10, 'Cantidad', 1);
    $pdf->Cell(30, 10, 'Precio Unitario', 1);
    $pdf->Cell(30, 10, 'Subtotal', 1);
    $pdf->Ln();

    // Datos de la tabla
    $result->data_seek(0); // Reiniciar el puntero de resultados
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(60, 10, $row['nombre'], 1);
        $pdf->Cell(30, 10, $row['cantidad'], 1);
        $pdf->Cell(30, 10, '$' . number_format($row['precioF'], 2), 1);
        $pdf->Cell(30, 10, '$' . number_format($row['precioF'] * $row['cantidad'], 2), 1);
        $pdf->Ln();
    }

    $pdf->Ln(10);

    // Totales
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(120, 10, 'Subtotal:', 1);
    $pdf->Cell(50, 10, '$' . number_format($totalSub, 2), 1);
    $pdf->Ln();
    $pdf->Cell(120, 10, 'Descuento:', 1);
    $pdf->Cell(50, 10, '$' . number_format($montoDescuento, 2), 1);
    $pdf->Ln();
    $pdf->Cell(120, 10, 'Total a Pagar:', 1);
    $pdf->Cell(50, 10, '$' . number_format($totalPrecio, 2), 1);



    $pdf->Output('ReciboOxxo.pdf', 'D');
?>

