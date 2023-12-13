
<?php
    session_start();

    include("ConfigBD/configSesion.php");

if(isset($_GET["usuario"]) && isset($_GET["totalCompra"])) {
    $usuarioL=$_GET["usuario"];
    $compraSI=$_GET["totalCompra"];
    $numProductos=$_GET["numProductos"];
    //echo $usuarioL;
    //echo $compraSI;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1d06ada3de.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Estilos/estilosDetalleC.css">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/formasss_pagos.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Revolt Sound Studio</title>

    <style>
        body .navbar{
            background: #005B41 !important;
        }
    </style>

</head>
<body>

    <?php include("Cabecera.php") ?>
    <br> <br> <br>
<div class="container">
    <h2 class="text-center mt-4 mb-4">Proceso de Compra</h2>

    <div class="row">

        <div class="col-md-6">
            <div class="mb-3 info-div">
                <h4>Cobro de impuestos</h4>
                <i class="fa-solid fa-earth-americas fa"></i>
                <p>El cobro de los impuestos varía según la ubicación de donde se está haciendo el pedido, por ello aquí se presenta un desglose con las tarifas de los mismos</p>
                <ul>
                    <li>Dentro de México se cobra $500 sobre el monto total de la compra.</li>
                    <li>Fuera de México, pero dentro del continente se cobra $1400 de impuesto.</li>
                    <li>Fuera del continente, el continente europeo o asiático específicamente se añade un costo de $4000 de impuesto.</li>
                    <li>Por el momento el impuesto en el continente africano y en Oceanía no está disponible, ya que no hacemos envíos a esas partes del mundo aún, agradecemos su comprensión, pues estamos trabajando en las asociaciones con dichos continentes</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6" id="formas">
        <span style="font-weight: bold;">Formas de Pago</span>
         <div class="card">

            <div class="accordion" id="accordionExample">
            
                <div class="card">
                    <div class="card-header p-0" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="d-flex align-items-center justify-content-between">

                            <span>Paypal</span>
                            <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                            
                        </div>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <input type="text" class="form-control" placeholder="Paypal email">
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-0" id="headingT">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseT" aria-expanded="false" aria-controls="collapseT">
                        <div class="d-flex align-items-center justify-content-between">

                            <span>Oxxo</span>
                            <img src="Media/Img/Recibo/oxxo.png" width="30">
                            
                        </div>
                        </button>
                    </h2>
                    </div>
                    <div id="collapseT" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <a href="pagoOxxo.php">
                            <input type="text" class="form-control" placeholder="Pague En La Sucursal De Su Preferencia">
                        </a>
                        
                    </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header p-0">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="d-flex align-items-center justify-content-between">

                            <span>Tarjetas</span>
                            <div class="icons">
                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                            <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                            <img src="https://i.imgur.com/35tC99g.png" width="30">
                            <img src="https://i.imgur.com/2ISgYja.png" width="30">
                            </div>
                            
                        </div>
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body payment-card-body">
                        
                        <span class="font-weight-normal card-text">Numero de Tarjeta</span>
                        <div class="input">

                        <i class="fa fa-credit-card"></i>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000">
                        
                        </div> 

                        <div class="row mt-3 mb-3">

                        <div class="col-md-6">

                            <span class="font-weight-normal card-text">Fecha de caducidad</span>
                            <div class="input">

                            <i class="fa fa-calendar"></i>
                            <input type="text" class="form-control" placeholder="MM/YY">
                            
                            </div> 
                            
                        </div>


                        <div class="col-md-6">

                            <span class="font-weight-normal card-text">CVC/CVV</span>
                            <div class="input">

                            <i class="fa fa-lock"></i>
                            <input type="text" class="form-control" placeholder="000">
                            
                            </div> 
                            
                        </div>
                        

                        </div>

                        <span class="text-muted certificate-text"><i class="fa fa-lock"></i> 
                        Su transacción está asegurada con certificado ssl</span>
                    
                    </div>
                    </div>
                </div>
                
                </div>

            </div>
            <form action="procesarCompra.php" method="post" style="margin-top: 10px;">
           
                <label for="pais">Selecciona tu pais de origen:</label>
                <select id="pais" name="pais" class="form-select mb-3" required>
                    <option value="mexico">México</option>
                    <option value="americaL">America Latina</option>
                    <option value="europa">Europa</option>
                </select>

                <label for="cupon">Codigo de Cupon:</label>
                <input type="text" id="cupon" name="cupon" class="form-control mb-3">

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required>
                    <label class="form-check-label" for="terminos">
                        Acepto los terminos y condiciones
                    </label>
                </div>
                <input type="hidden" name="precioSC" value="<?php echo $compraSI; ?>">
                <input type="hidden" name="usuario" value="<?php echo $usuarioL; ?>">
                <input type="hidden" name="numPro" value="<?php echo $numProductos; ?>">

                <button type="submit" class="btn btn-primary">Comprar</button>
                <a href="verCarrito.php" class="btn btn-outline-primary">Regresar</a>
            </form>
        </div>

        <!-- Div derecho con información adicional -->
        <div class="col-md-6">
            <div class="mb-3 info-div">
                <h4>Gastos de envío</h4>
                <i class="fa-solid fa-plane fa"></i>
                <p>Como ya se mencionó, aún no realizamos envíos al continente africano ni hacia Oceanía, por lo que las tarifas de envío son las siguientes.</p>
                <p><b>Dentro de México</b></p>
                <ul>
                    <li>De 0 a 5500 pesos en su monto de compra, se cobra 300 de envío</li>
                    <li>Más de 5500 a 9000, se cobra 200 de envío</li>
                    <li>Más de 9000, el envío es gratis</li>
                </ul>
                <p><b>Fuera del país, hacia cualquier parte del mundo disponible quitando las excepciones</b></p>
                <ul>
                    <li>De 0 a 5500 pesos en su monto de compra, se cobra 1000 de envío</li>
                    <li>Más de 5500 a 9000, se cobra 800 de envío</li>
                    <li>Más de 9000, el envío es gratis</li>
                </ul>
                <p>Esto sobre el monto total de la compra incluyendo descuentos si es el caso y el impuesto</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3 info-div">
                <h4>Cupones</h4>
                <i class="fa-solid fa-ticket fa"></i>
                <p>Ademas de contar con las diversas politicas que supondrian le añadirian mayor valor al precio a pagar, no todo es tan malo como parece.</p>
                <p>Contamos con diversos beneficios para nuestros clientes, ademas de poder pagar a meses sin intereses en diversos bancos</p>
                <p>Uno de ellos es contar con algunos descuentos en las primeras compras</p>
                <p>Para ello bastara con que visites nuestras redes sociales, te suscribas y nos dejes tu correo para enviar ofertas</p>
                <p>Cabe aclarar que este es solo para tu primera compra, los cupones son los siguientes</p>
                <ul>
                    <li>El cupon que te da por suscribirte a nuestra pagina dandonos tu correo para enviarte ofertas, es de 700 pesos sobre el monto total </li>
                    <li>Por seguirnos en nuestras redes sociales, uno de 600 pesos</li>
                    <li>Descripcion pendiente, 500 pesos</li>
                </ul>
               
            </div>
        </div>
    </div>
</div>


</body>
</html>

