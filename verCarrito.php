<?php
    session_start();

    include("ConfigBD/configSesion.php");
    include("ConfigBD/configAudi.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estilosCarrito.css"> 
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/1d06ada3de.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>


    <title>Carrito de Compras</title>
    <style>

        body .navbar{
            background: #005B41 !important;
        }

        .producto-row {
            margin-bottom: 20px;
        }

        .col-md-3 img {
            width: 100%; 
            height: 350px; 
        }

        #quantity-selector {
            display: flex;
            align-items: center;
        }

        #selectorAc {
            width: 40px; 
            text-align: center;
            margin: 0 10px;
        }

        .update-button {
            background-color: #28a745; 
            color: #fff; 
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #218838; 
        }

        .producto-row:hover {
            background-color: #f8f9fa; 
        }
    </style>
</head>
<body>
        <?php include("Cabecera.php") ?>
        
<div class="container recuadro">
    <h2 class="text-center mt-4 mb-4">Carrito de Compras</h2>
<?php

$usuarioL=$_SESSION['usuario_logueado'];

//selecciona los productos y cuenta cuantas veces aparece cada nombre, las agrupa con el group by, segun el usuario que este logueado
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
            echo '<div class="row producto-row">';
            echo '<div class="col-md-3">';
            echo '<img src="' . $row["imagen"] . '" alt="Imagen del producto" class="img-fluid">';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '<h5>Producto</h5>';
            echo '<h4>' . $row["nombre"] . '</h4>';
            echo '<p class="descripcionFor">' . $row["descripcion"] . '</p>';
            echo '</div>';
            echo '<div class="col-md-2 precio-col">';
            echo '<h5>Precio</h5>';
            $precioForma= number_format($row["precioF"], 2, '.', ',');
            if($row["precioSD"]==$row["precioF"]) {
                echo '<span class="precio-final">$ ' . $precioForma . '</span>';
            }
            else {
                $precioFormaD= number_format($row["precioSD"], 2, '.', ','); 
                echo '<del>$ ' . $precioFormaD . '</del><br>';
                echo '<span class="precio-final">$ ' . $precioForma . '</span>';
            }
            
            echo '</div>';
            echo '<div class="col-md-1 subtotal-col">';
            echo '<h5>Subtotal</h5>';
            $subtotal = $row["precioF"] * $row["cantidad"];
            $subTotalSD= $row["precioSD"] * $row["cantidad"];
            $subTotalF= number_format($subtotal, 2, '.', ',');
            echo '<p class="subtotal">' . $subTotalF . '</p>';
            //echo '<a href="eliminarProC.php?nombre=' . urlencode($row["nombre"]) . '&cantidad=' .$row["cantidad"]. '"><i class="fa-regular fa-trash-can fa-2xl"></i></a>';
            echo '<form action="eliminarProdC.php" method="get">
                <input type="hidden" name="nombreActP" value="'.$row["nombre"].'">
                <input type="hidden" name="cantidadA" value="'.$row["cantidad"].'">
                <input type="hidden" name="descripcionA" value="'.$row["descripcion"].'">
                <input type="hidden" name="precioSDA" value="'.$row["precioSD"].'">
                <input type="hidden" name="precioFA" value="'.$row["precioF"].'">
                <input type="hidden" name="imagenA" value="'.$row["imagen"].'">
                <div id="quantity-selector">
                        <button type="button" onclick="decreaseQuantity(this)">-</button>
                        <input type="text" id="selectorAc" name="cantidadBorrarP" value="'.$row["cantidad"].'">
                        <button type="button" onclick="increaseQuantity(this)">+</button>
                    </div>
                    <br>
                    <button type="submit" class="update-button"><i class="fa-regular fa-trash-can fa"></i></button>
                </form>';
            echo '</div>';
            echo '<div class="col-md-1 cantidad-col">';
            echo '<h5>Cantidad</h5>';
            echo '<p>' . $row["cantidad"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<hr class="my-4">';

            $totalPrecio += $subtotal;
            $totalSub+=$subTotalSD;
        }
        $montoDescuento=$totalSub-$totalPrecio;

        echo '<div class="row">';
        echo '<div class="col-md-8 offset-md-2 text-end">';
        echo '<div class="d-flex justify-content-between mb-3">';

        echo '<div>';
        echo '<h4>Subtotal:</h4>';
        $subtotalTP= number_format($totalSub, 2, '.', ',');
        echo '<p class="total">' . $subtotalTP . '</p>';
        echo '</div>';
        
        echo '<div>';
        echo '<h4>Descuento:</h4>';
        $montoDF= number_format($montoDescuento, 2, '.', ',');
        echo '<p class="total">' . $montoDF . '</p>';
        echo '</div>';

         echo '<div>';
         echo '<h4>Total (Sin IVA):</h4>';
         $totalF= number_format($totalPrecio, 2, '.', ',');
         echo '<p class="total">' . $totalF . '</p>';
         echo '</div>';
       
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
        echo '<div class="col-md-12 text-end">';
         echo '<a href="detallesCompra.php?usuario=' . urlencode($usuarioL) . '&totalCompra=' .$totalPrecio.'" class="btn btn-success">Comprar</a>';
         echo '</div>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "warning",
                    title: "Carrito vacio",
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location.href = "productos.php";
                });
              </script>';
    }
    ?>

</div>
<script>
  function increaseQuantity(button) {
    var quantityInput = button.parentNode.querySelector('input[name="cantidadBorrarP"]');
    var currentQuantity = parseInt(quantityInput.value, 10);
    quantityInput.value = currentQuantity + 1;
}

function decreaseQuantity(button) {
    var quantityInput = button.parentNode.querySelector('input[name="cantidadBorrarP"]');
    var currentQuantity = parseInt(quantityInput.value, 10);

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}

</script>
    
 

</body>
</html>

<script src="js/NavMenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

