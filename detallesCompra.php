<?php
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
    <title>Página de Destino</title>

</head>
<body>

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
                    <li>Fuera del continente, el continente europeo o asiatico específicamente se añade un costo de $4000 de impuesto.</li>
                    <li>Por el momento el impuesto en el continente africano y en Oceanía no está disponible, ya que no hacemos envíos a esas partes del mundo aún, agradecemos su comprensión, pues estamos trabajando en las asociaciones con dichos continentes</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <form action="procesarCompra.php" method="post" style="margin-top: 150px;">
           
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
            </form>
        </div>
        <a href="verCarrito.php">Regresar</a>

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
