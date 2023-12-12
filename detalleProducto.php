
<?php
    session_start();
    include("ConfigBD/configSesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <script src="https://kit.fontawesome.com/1d06ada3de.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="Estilos/estilosDetalleProd.css">
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    
</head>
<body>
<div class="Container-Inicio">
       <?php include("Cabecera.php"); ?> 
        <br><br><br><br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audifonos";
    
    $conexion= new mysqli($servername, $username, $password, $dbname);
  
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
  
    if (isset($_GET['id'])) {
        $idProducto = $_GET['id'];
        $sql="SELECT * FROM productos WHERE id='$idProducto'";
        $resultado=$conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila=$resultado->fetch_assoc();
            echo '<div class="container mt-3">
                    <p class="breadcrumb">
                        <a href="index.php" class="breadcrumb-link">Home</a> /
                        <a href="productos.php" class="breadcrumb-link">Productos</a> /
                        <a href="#" class="breadcrumb-link">'.$fila["nombre"].'</a>
                    </p>
                </div>';
        }
       

    } else {
        echo "ID de producto no valido.";
        exit;
    }

    $imagen =$fila["imagen"];
    echo $_SESSION['usuario_logueado'];

    ?>
    <br>
    <div class="container-fluid">
        <div class="column image-column">
        <div id="zoomify-container">
            <img id="zoomify-image" src="<?php echo $imagen; ?>" alt="Imagen">
        </div>
        <div class="thumbnail-buttons">
            <?php

            $imagen2 = $fila["imagen2"];
            $imagen3 = $fila["imagen3"];
            $imagen4 = $fila["imagen4"];

            if (!empty($imagen)) {
                echo '<button class="thumbnail-button" onclick="cambiarImagen(\'' . $imagen . '\')">';
                echo '<img src="' . $imagen . '" alt="Thumbnail 2">';
                echo '</button>';
            }
            if (!empty($imagen2)) {
                echo '<button class="thumbnail-button" onclick="cambiarImagen(\'' . $imagen2 . '\')">';
                echo '<img src="' . $imagen2 . '" alt="Thumbnail 2">';
                echo '</button>';
            }

            if (!empty($imagen3)) {
                echo '<button class="thumbnail-button" onclick="cambiarImagen(\'' . $imagen3 . '\')">';
                echo '<img src="' . $imagen3 . '" alt="Thumbnail 3">';
                echo '</button>';
            }

            if (!empty($imagen4)) {
                echo '<button class="thumbnail-button" onclick="cambiarImagen(\'' . $imagen4 . '\')">';
                echo '<img src="' . $imagen4 . '" alt="Thumbnail 4">';
                echo '</button>';
            }
            ?>
        </div>
</div>
        
        <div class="info-column">
            <h2 class="product-name"><?php echo $fila["nombre"]; ?></h2>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "audifonos";
                
                $conexionC = new mysqli($servername, $username, $password, $dbname);
                
                
                if ($conexionC->connect_error) {
                    die("Conexión fallida: " . $conexionC->connect_error);
                }
                $nombreProducto = $fila["nombre"];
                $sumaCalif=0;
                $numRegistros=0;
                $calificacionPromedio=0;
                $sql2 = "SELECT * FROM comentarios WHERE producto='$nombreProducto'";
                $resultadoC=$conexion->query($sql2);
                if ($resultadoC->num_rows > 0) {
                    while ($comen = $resultadoC->fetch_assoc()) {
                        $sumaCalif=$sumaCalif+$comen["calificacion"];
                        $numRegistros=$numRegistros+1;

                    }
                    $calificacionPromedio=$sumaCalif/$numRegistros;
                    $enteroCalif = round($calificacionPromedio);
                    if($enteroCalif==1) {
                        echo '<p class="comment-rating">Calificacion: ⭐</p>';
                    }
                    if($enteroCalif==2) {
                        echo '<p class="comment-rating">Calificacion: ⭐⭐</p>';
                    }
                    if($enteroCalif==3) {
                        echo '<p class="comment-rating">Calificacion: ⭐⭐⭐</p>';
                    }
                    if($enteroCalif==4) {
                        echo '<p class="comment-rating">Calificacion: ⭐⭐⭐⭐</p>';
                    }
                    if($enteroCalif==5) {
                        echo '<p class="comment-rating">Calificacion: ⭐⭐⭐⭐⭐</p>';
                    }
                    echo '<p class="comment-rating">Opiniones ('.$numRegistros. ')</p>';


                }
                else {
                    echo "Este producto aun no tiene calificacion";
                }

            ?>
            <p class="product-info"><span class="leyenda">Id del producto:</span> <?php echo $fila["id"]; ?></p>
            <p class="product-marca"><span class="leyenda">Marca: </span><?php echo $fila["marca"]; ?></p>
            <?php $precioFinal=$fila["precio"]-$fila["montodesc"]; ?>
            <?php if ($fila["descuento"] == "si") { ?>
                <div class="contenedorPrecio">
                <p class="product-info priceTachado"><del>$<?php echo $fila["precio"]; ?></del></p>
                <?php
                ?>
                <p class="product-info discount">$<?php echo $precioFinal ?></p>
                </div>
                <p class="product-info ahorro">Usted esta ahorrando <?php echo $fila["montodesc"]; ?> pesos en esta compra</p>

            <?php } else { ?>
                <p class="product-info price">$<?php echo $fila["precio"]; ?></p>
            <?php } ?>
            <p class="product-info"><span class="leyenda">Disponibilidad en tienda: </span><?php echo $fila["cantidad"]; ?> piezas</p>
            <p class="product-info"><span class="leyenda">Color: </span><?php echo $fila["color"]; ?></p>
            <p class="product-conect"><span class="leyenda">Conectividad:</span> <?php echo $fila["conectividad"]; ?></p>
            <p class="product-conect"><span class="leyenda">Cantidad:</span></p>
            <form id="cartForm" action="carrito.php" method="get">
            <div id="quantity-selector">
                <button type="button" onclick="decreaseQuantity()">-</button>
                <input type="text" id="quantity" name="cantidadS" value="1" readonly>
                <button type="button" onclick="increaseQuantity()">+</button>
            </div>
           
            <hr class="lineaDivision">
            <b><p class="product-desc">Descripcion: </p></b>
            <p class="product-desc"><?php echo $fila["descripcion"]; ?></p>
            
        </div>

        <div class="column highlights-column">
            <div class="infPago"><p>Formas de pago</p>
            <i class="fa-solid fa-money-bill-1 fa-2xl"></i>
            <i class="fa-regular fa-credit-card fa-2xl"></i>
            <i class="fa-solid fa-wallet fa-2xl"></i>
            <i class="fa-brands fa-bitcoin fa-2xl"></i>
            </div>
            <div class="infEnvios"><p>Envios a cualquier parte del mundo</p>
            <i class="fa-solid fa-truck-fast fa-2xl"></i>
            </div>
            <div class="infMeses"><p>Contamos con meses sin intereses, pregunta por tu promocion</p>
            <i class="fa-solid fa-handshake fa-2xl"></i>
            </div>
            <div class="infGarantia"><p>Todos nuestros productos cuentan con garantia un año en tienda</p>
            <i class="fa-solid fa-spinner fa-2xl"></i>
            </div>
            <br><br>
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
            <input type="hidden" name="precioFinal" value="<?php echo $precioFinal; ?>">
            <?php
            $usuario=$_SESSION['usuario_logueado'];
            ?>
            <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
            <div class="carritoShare">
                <i class="fa-solid fa-cart-plus fa-2xl"></i>
                <button type="submit" class="btn btn-primary btn-ver-detalles">Agregar al carrito</button>
                <i class="fa-solid fa-share-nodes fa-2xl"></i>
                <p>Compartir</p>
            </div>
        </div>
        </form>
    </div>
    <div class="comments-section">
        <h3>Comentarios</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "audifonos";
        
        $conexionC = new mysqli($servername, $username, $password, $dbname);
        
        
        if ($conexionC->connect_error) {
            die("Conexión fallida: " . $conexionC->connect_error);
        }
        $nombreProducto = $fila["nombre"];
        $sql2 = "SELECT * FROM comentarios WHERE producto='$nombreProducto'";
        $resultadoC=$conexion->query($sql2);
        if ($resultadoC->num_rows > 0) {
            while ($comen = $resultadoC->fetch_assoc()) {
                echo '<hr class="lineaDivision">';
                echo '<div class="comment">';
                echo '<p class="comment-user">'.$comen["nombre"]. '</p>';
                echo '<p class="comment-title">'.$comen["titulo"]. '</p>';
                if($comen["calificacion"]==1) {
                    echo '<p class="comment-rating">Calificacion: ⭐</p>';
                }
                if($comen["calificacion"]==2) {
                    echo '<p class="comment-rating">Calificacion: ⭐⭐</p>';
                }
                if($comen["calificacion"]==3) {
                    echo '<p class="comment-rating">Calificacion: ⭐⭐⭐</p>';
                }
                if($comen["calificacion"]==4) {
                    echo '<p class="comment-rating">Calificacion: ⭐⭐⭐⭐</p>';
                }
                if($comen["calificacion"]==5) {
                    echo '<p class="comment-rating">Calificacion: ⭐⭐⭐⭐⭐</p>';
                }
                echo '<p class="comment-text">'.$comen["comentario"].'</p>';
                echo '</div>';
                
            }
            
            
        } else {
            echo "No hay reseñas sobre este producto aun";
        }
       

        ?>
        <br><br>
        <div class="comment-form">
            <h3>Deja tu Comentario</h3>
            <form action="registrarComentario.php" method="post">
                <div class="form-group">
                    <label for="nombreUsu">Nombre de Usuario:</label>
                    <input type="text" id="nombreUsu" name="nombreUsu" required>
                </div>
                <div class="form-group">
                    <label for="titulo">Título del Comentario:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="calificacion">Calificación:</label>
                    <select id="calificacion" name="calificacion">
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comentarioUsu">Comentario:</label>
                    <textarea id="comentarioUsu" name="comentarioUsu" rows="4" required></textarea>
                </div>
                <input type="hidden" id="nombreP" name="nombreP" value="<?php echo $nombreProducto; ?>">

                <button type="submit">Enviar Comentario</button>
            </form>
        </div>
    </div>
    <div class="Container-Footer">
            <footer>
                    <div class="footer-content">
                        <div class="contact-info">
                            <h2>Información de Contacto</h2>
                            <p><i class="fas fa-map-marker-alt"></i> Dirección: Aguascalientes MX</p>
                            <p><i class="fas fa-phone"></i> Teléfono: +449-584-4979</p>
                            <p><i class="fas fa-envelope"></i> Correo Electrónico: revoltstudio@empresa.com</p>
                        </div>
                        <div class="social-links">
                            <h2>Síguenos en Redes Sociales</h2>
                            <div class="icon-container">
                                <span class="separator">|</span>
                                <a href="https://www.facebook.com/emi.harrera"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <span class="separator">|</span>
                                <a href="https://twitter.com/emiiherrerra_10"><i class="fab fa-twitter fa-lg"></i></a>
                                <span class="separator">|</span>
                                <a href="https://www.instagram.com/e.jherrera.10/"><i class="fab fa-instagram fa-lg"></i></a>
                                <span class="separator">|</span>
                                <a href="https://www.youtube.com"><i class="fab fa-youtube fa-lg"></i></a>
                                <span class="separator">|</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="copyright">
                        &copy; 2023 REVOLT-STUDIO| Todos los derechos reservados.
                    </div>
                    <div class="empresa2">
                        <img src="Media/Img/logo_final.png" width="100"  alt="">
                    </div>
            </footer>
        </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const zoomifyContainer = document.getElementById('zoomify-container');
        const zoomifyImage = document.getElementById('zoomify-image');

        const zoom = mediumZoom(zoomifyImage, {
            margin: 20,
            background: '#000',
            scrollOffset: 0,
        });

        zoomifyContainer.addEventListener('dblclick', function () {
            zoom.toggle();
        });
    });

    function cambiarImagen(nuevaImagen) {
        document.getElementById('zoomify-image').src = nuevaImagen;
        
    }
    function increaseQuantity() {
      var quantityInput = document.getElementById('quantity');
      var currentQuantity = parseInt(quantityInput.value, 10);
      quantityInput.value = currentQuantity + 1;
    }

    function decreaseQuantity() {
      var quantityInput = document.getElementById('quantity');
      var currentQuantity = parseInt(quantityInput.value, 10);
      
      if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
      }
    }
</script>
<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>

