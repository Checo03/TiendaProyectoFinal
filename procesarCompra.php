
<?php 
    session_start();
    include("ConfigBD/configSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estilosProcesoB.css">
    <title>Revolt Sound Studio</title>
    <?php include("ConfigBD/configCabecera.html") ?>

    <style>
        body{
            background-color: beige;
        }

        body .navbar{
            background: #005B41 !important;
        }

    </style>

</head>
<body>
<?php

    include("Cabecera.php");

    ?> 
        <br> <br> <br> <br> <br>
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
    $impuestoE=0;
    $envioE=0;
    $montoE=0;
    


    $cupon = isset($_POST["cupon"]) ? $_POST["cupon"] : null;
    //$cupon=$_POST["cupon"];
    //echo $cupon;


    if (!empty($cupon)) {
        $cupon1 ="AP89TX5"; //700 de descuento
        $cupon2="P7SD1CW";  //600 de descuento
        $cupon3="D9CY41Z";  //500 de descuento
        if($cupon==$cupon1) {
            $compraSI=$compraSI-$desc1;
            //echo $compraSI;
            $band=1;
            $montoE=$desc1;
        }
        else if($cupon==$cupon2) {
            $compraSI=$compraSI-$desc2;
            $band=2;
            $montoE=$desc2;
        }
        else if($cupon==$cupon3) {
            $compraSI=$compraSI-$desc3;
            $band=3;
            $montoE=$desc3;
        } else {
            echo '<p style="color: red; font-size: 16px; font-weight: bold;">Código del cupón incorrecto y/o caducado</p>';
        }
    } else {
        //echo "No se ingreso ningun cupon.";
    }

    if($paisE=="mexico") {
        $bandI=1;
        $impuestoE=$im1;
        $compraSI=$compraSI+$im1;
        if($compraSI<=5500) {
            $compraSI=$compraSI+$mex1E;
            $bandE=1;
            $envioE=$mex1E;
        }
        else if($compraSI>5500 && $compraSI<=9000) {
            $compraSI=$compraSI+$mex2E;
            $bandE=2;
            $envioE=$mex2E;
        } else {
            $bandE=3;
            //echo "costo de envio gratis al tener un monto mayor a 6000";
        }

    } else if($paisE=="americaL") {
        $bandI=2;
        $impuestoE=$im2;
        $compraSI=$compraSI+$im2;
        if($compraSI<=5500) {
            $compraSI=$compraSI+$envF1;
            $bandE=4;
            $envioE=$envF1;
        }
        else if($compraSI>5500 && $compraSI<=9000) {
            $compraSI=$compraSI+$envF2;
            $bandE=5;
            $envioE=$envF2;
        } else {
            $bandE=3;
            //echo "costo de envio gratis al tener un monto mayor a 6000";
        }

    } else {
        $bandI=3;
        $compraSI=$compraSI+$im3;
        $impuestoE=$im3;
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
  
            
            <!-- formulario de envio 
            aqui pones el formulario de envio de ejemplo y ademas mandas las demas variables con los datos de los totales
             ej:
              <input type="hidden" name="nombreActP" value="'.$row["nombre"].'"> las mandas ocultas
            -->
        </div>
    </div>
    <div class="ticket-details">
    <h2 class="mt-4 mb-4">Detalles para el envio</h2>
    <form id="personalDetailsForm" action="finalizarCompra.php" method="post">
        <label for="nombreCompleto">Nombre Completo:</label>
        <input type="text" id="nombreCompleto" name="nombreCompleto" required>
        <br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="direccion">Dirección:</label>
        <textarea id="direccion" name="direccion" required></textarea>
        <br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>
        <br>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required>
        <br>

        <label for="codigoPostal">Codigo Postal:</label>
        <input type="text" id="codigoPostal" name="codigoPostal" required>
        <br>

        <label for="telefono">Número Telefónico:</label>
        <input type="tel" id="telefono" name="telefono" required>
        <br>
        <input type="hidden" name="impuesto" value="<?php echo $impuestoE; ?>">
        <input type="hidden" name="envioM" value="<?php echo $envioE; ?>">
        <input type="hidden" name="subtotalSM" value="<?php echo $montoSC; ?>">
        <input type="hidden" name="descuento" value="<?php echo $montoE; ?>">
        <input type="hidden" name="total" value="<?php echo $compraSI; ?>">

        <!-- Otros campos necesarios -->
        
        <!-- Elimina el evento onclick y permite que el formulario se envíe directamente -->
        <button type="submit" id="comprarP" name="comprarP">Confirmar Compra</button>
    </form>
</div>


</body>
</html>

<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


