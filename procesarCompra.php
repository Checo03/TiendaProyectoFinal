<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estilosProcesoB.css">
    <title>Resumen de Compra</title>
    
</head>
<body>
<?php
if (isset($_POST["usuario"]) && isset($_POST["precioSC"]) && isset($_POST["pais"])) {
    $usuarioL = $_POST["usuario"];
    $compraSI = $_POST["precioSC"];
    $paisE=$_POST["pais"];
    $montoSC=$_POST["precioSC"];
    $numeroPr=$_POST["numPro"];
    //echo $usuarioL;
    //echo $compraSI;
    $im1=500;
    $im2=1400;
    $im3=4000;
    $desc1=700;
    $desc2=600;
    $desc3=500;
    $mex1E=300;
    $mex2E=200;
    $envF1=1000;
    $envF2=800;
    $band=0;
    $bandI=0;
    $bandE=0;
    


    $cupon = isset($_POST["cupon"]) ? $_POST["cupon"] : null;
    //$cupon=$_POST["cupon"];
    //echo $cupon;


    if (!empty($cupon)) {
        $cupon1 ="AP89TX5"; //700 de descuento
        $cupon2="P7SD1CW";  //600 de descuento
        $cupon3="D9CY41Z";  //500 de descuento
        if($cupon==$cupon1) {
            $compraSI=$compraSI-$desc1;
            echo $compraSI;
            $band=1;
        }
        else if($cupon==$cupon2) {
            $compraSI=$compraSI-$desc2;
            $band=2;
        }
        else if($cupon==$cupon3) {
            $compraSI=$compraSI-$desc3;
            $band=3;
        } else {
            echo '<p style="color: red; font-size: 16px; font-weight: bold;">Código del cupón incorrecto y/o caducado</p>';
        }
    } else {
        //echo "No se ingreso ningun cupon.";
    }

    if($paisE=="mexico") {
        $bandI=1;
        $compraSI=$compraSI+$im1;
        if($compraSI<=5500) {
            $compraSI=$compraSI+$mex1E;
            $bandE=1;
        }
        else if($compraSI>5500 && $compraSI<=9000) {
            $compraSI=$compraSI+$mex2E;
            $bandE=2;
        } else {
            $bandE=3;
            //echo "costo de envio gratis al tener un monto mayor a 6000";
        }

    } else if($paisE=="americaL") {
        $bandI=2;
        $compraSI=$compraSI+$im2;
        if($compraSI<=5500) {
            $compraSI=$compraSI+$envF1;
            $bandE=4;
        }
        else if($compraSI>5500 && $compraSI<=9000) {
            $compraSI=$compraSI+$envF2;
            $bandE=5;
        } else {
            $bandE=3;
            //echo "costo de envio gratis al tener un monto mayor a 6000";
        }

    } else {
        $bandI=3;
        $compraSI=$compraSI+$im3;
    }
}
?>
       <div class="ticket">
        <h1>Resumen de Compra</h1>

        <div class="section">
            <h2>Detalles de la Compra</h2>
            <p><strong>Artículos a comprar:</strong> <?php echo $numeroPr; ?></p>
            <p><strong>Monto sin desglose:</strong> $<?php echo number_format($montoSC, 2); ?></p>
        </div>

        <div class="section">
            <h2>Descuentos</h2>
            <?php
            if($band == 1) {
                echo '<div class="highlight">Descuento aplicado: $'.$desc1.'</div>';
            } elseif($band == 2) {
                echo '<div class="highlight">Descuento aplicado: $'.$desc2.'</div>';
            } elseif($band == 3) {
                echo '<div class="highlight">Descuento aplicado: $'.$desc3.'</div>';
            } else {
                echo '<p>Sin cupones aplicados.</p>';
            }
            ?>
        </div>

        <div class="section">
            <h2>Impuestos y Envío</h2>
            <?php
            if($bandI == 1) {
                echo '<div class="highlight">Impuesto aplicado: $'.$im1.'</div>';
                if($bandE == 1) {
                    echo '<div class="highlight">Costo de envío: $'.$mex1E.'</div>';
                } elseif($bandE == 2) {
                    echo '<div class="highlight">Costo de envío: $'.$mex2E.'</div>';
                } elseif($bandE == 4) {
                    echo '<div class="highlight">Costo de envío: $'.$envF1.'</div>';
                } elseif($bandE == 5) {
                    echo '<div class="highlight">Costo de envío: $'.$envF2.'</div>';
                } elseif($bandE == 3) {
                    echo '<div class="highlight">Costo de envío: Gratis</div>';
                }
            } elseif($bandI == 2) {
                echo '<div class="highlight">Impuesto aplicado: $'.$im2.'</div>';
                if($bandE == 4) {
                    echo '<div class="highlight">Costo de envío: $'.$envF1.'</div>';
                } elseif($bandE == 5) {
                    echo '<div class="highlight">Costo de envío: $'.$envF2.'</div>';
                } elseif($bandE == 3) {
                    echo '<div class="highlight">Costo de envío: Gratis</div>';
                }
            } elseif($bandI == 3) {
                echo '<div class="highlight">Impuesto aplicado: $'.$im3.'</div>';
            }
            ?>
        </div>

        <hr>

        <div class="section total">
            <h2>Total a Pagar</h2>
            <p style="text-align:center">$<?php echo number_format($compraSI, 2); ?></p>
            <?php if(isset($_SESSION["validarNota"])) {
            echo '<center><a href="#?monto=<?php echo $compraSI; ?>" class="button">Opciones detalladas</a></center>';
            } ?>
            <!-- formulario de envio 
            aqui pones el formulario de envio de ejemplo y ademas mandas las demas variables con los datos de los totales
             ej:
              <input type="hidden" name="nombreActP" value="'.$row["nombre"].'"> las mandas ocultas
            -->
        </div>
    </div>
</body>
</html>






