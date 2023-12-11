<?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audifonos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $usuarioL=$_SESSION['usuario_logueado'];

    
    /*
    $sql = "SELECT nombre, descripcion, precioSD, precioF, imagen, COUNT(*) as cantidad FROM carrito WHERE usuario='$usuarioL' GROUP BY nombre";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $totalPrecio = 0;

        $totalPrecio += $subtotal;
        $totalSub+=$subTotalSD;
    }
    $montoDescuento=$totalSub-$totalPrecio;
    */
    $auxPrecio=1200;

    //Fecha de Caducidad del Codigo
    function FechaCaducidad(){
        $FechaActual = date('Y-m-d');
        $fechaCaducidad = date('Y-m-d', strtotime($FechaActual . ' + 13 days'));

        $aux = date('d/m/Y', strtotime( $fechaCaducidad));
        return $aux;
    }

    // $precio = ObtenerPrecio();
    $precio= 1200;
    $fecha = FechaCaducidad();

    require("FPDF/fpdf.php");

    class PDF extends FPDF {
        // Cabecera de página
        function Header() {
            $this->SetFont('Arial', 'B', 25);
            $this->Cell(0, 15, 'Rovolt Sound Studio', 0, 0, 'L');
            $this->Cell(0, 10, $this->Image('Media\Img\Recibo\LogoOxxo.jpeg', 160, 10, 30), 0, 0, 'R');
            $this->Ln(20);
        }
    
        // Pie de página
        function Footer() {
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
    $pdf->Cell(0, 10, 'Total A Pagar: $'. number_format($precio, 2), 0, 1, 'L');
    // Fecha de Caducidad
    $pdf->Cell(0, 10, 'Fecha De Caducidad: '. FechaCaducidad(), 0, 1, 'L');
    
    // Codigo de Barras
    $pdf->Image('Media\Img\Recibo\CodigoDeBarras.png', 70, 170, 70);
    

    $pdf->Output('ReciboOxxo.pdf', 'D');
?>