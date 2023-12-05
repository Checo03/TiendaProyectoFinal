<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos/estilosModProd.css">
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d06ada3de.js" crossorigin="anonymous"></script>
  
    
</head>
<body>

<?php
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'audifonos';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexión');
}


$idP= $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = $idP";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $modP= $resultado->fetch_assoc();
    $nombre = $modP['nombre'];
    $categoria = $modP['categoria'];
    $marca = $modP['marca'];
    $descripcion = $modP['descripcion'];
    $cantidad = $modP['cantidad'];
    $precio = $modP['precio'];
    $conectividad=$modP["conectividad"];
    $colorP=$modP["color"];
    $descuentoSN=$modP["descuento"];
    $montoD=$modP["montodesc"];
    $imagen=$modP["imagen"];
    $imagen2=$modP["imagen2"];
    $imagen3=$modP["imagen3"];
    $imagen4=$modP["imagen4"];

} else {
    echo 'No se encontro el producto solicitado.';
}

?>
 <header class="header">
            <nav class="navbar navbar-expand-lg fixed-top py-2">
                <div class="containerN">
                    <a href="index.php" class="navbar-brand"><img src="Media/Img/logo_final.png" alt="LOGO" style="width: 70px;  height: 60px;"></a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                    
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                            <li class="nav-item dropdown" style="margin-right: 10px;">
                                <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</button>
                                <div class="dropdown-menu">    
                                    <a class="dropdown-item" href="#">Ver Todo</a>
                                    <a class="dropdown-item" href="#">Diademas</a>
                                    <a class="dropdown-item" href="#">EarBuds</a>
                                    <!--Lista De Marcas -->
                                </div>
                            </li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Conocenos</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Acerca De</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="contactanos.php" class="nav-link text-uppercase font-weight-bold">Contactanos</a></li>
                            <!-- Menu Admin 
                            <li class="nav-item dropdown" style="margin-right: 10px;">
                                <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
                                <div class="dropdown-menu">    
                                    <a class="dropdown-item" href="#">Altas</a>
                                    <a class="dropdown-item" href="#">Bajas</a>
                                    <a class="dropdown-item" href="#">Cambios</a>
                                </div>
                            </li>  -->
                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                            <li class="nav-item" style="margin-right: 5px; margin-left: 30px;"><a href="#" class="btn btn-outline-primary">Login</a></li>
                            <li class="nav-item" style="margin-right: 5px;"><a href="#" class="btn btn-outline-primary">Registrarse</a></li>
                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>
        </header>      
<br><br><br><br>
<div class="container">
    <h2 class="mb-4">Editar Producto</h2>
    <form action="guardarModPro.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" id="idP" name="idP" value="<?php echo $idP; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="earbuds" <?php echo ($categoria == 'earbuds') ? 'selected' : ''; ?>>Earbuds</option>
                <option value="diadema" <?php echo ($categoria == 'diadema') ? 'selected' : ''; ?>>Diadema</option>
            </select>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marca; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="8" required><?php echo $descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad en Existencia:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $precio; ?>" required>
        </div>
        <div class="form-group">
            <label for="conectividad">Conectividad:</label>
            <input type="text" class="form-control" id="conectividad" name="conectividad" value="<?php echo $conectividad; ?>" required>
        </div>
        <div class="form-group">
            <label for="colorP">Color:</label>
            <input type="text" class="form-control" id="colorP" name="colorP" value="<?php echo $colorP; ?>"  required>
        </div>
        <div class="form-group">
            <label for="descuentoH">Descuento:</label>
            <select class="form-control" id="descuentoH" name="descuentoH" required>
                <option value="no" <?php echo ($descuentoSN === 'no') ? 'selected' : ''; ?>>No</option>
                <option value="si" <?php echo ($descuentoSN === 'si') ? 'selected' : ''; ?>>Sí</option>
            </select>
        </div>
        <div class="form-group" id="montoDesc" style="display: none;">
            <label for="descuento">Monto de Descuento (en pesos):</label>
            <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo $montoD; ?>" step="1">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen presentacion:</label>
            <img src="<?php echo $imagen; ?>" alt="Imagen presentacion"><?php echo $imagen; ?>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
            <input type="hidden" name="imagen_actual" value="<?php echo $imagen; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen2">Imagen 2:</label>
            <img src="<?php echo $imagen2; ?>" alt="Imagen 2"><?php echo $imagen2; ?>
            <input type="file" class="form-control-file" id="imagen2" name="imagen2" accept="image/*">
            <input type="hidden" name="imagen2_actual" value="<?php echo $imagen2; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen3">Imagen 3:</label>
            <img src="<?php echo $imagen3; ?>" alt="Imagen 3"> <?php echo $imagen3; ?>
            <input type="file" class="form-control-file" id="imagen3" name="imagen3" accept="image/*">
            <input type="hidden" name="imagen3_actual" value="<?php echo $imagen3; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen4">Imagen 4:</label>
            <img src="<?php echo $imagen4; ?>" alt="Imagen 4"> <?php echo $imagen4; ?>
            <input type="file" class="form-control-file" id="imagen4" name="imagen4" accept="image/*">
            <input type="hidden" name="imagen4_actual" value="<?php echo $imagen4; ?>">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="guardarC" id="guardarC">Guardar Cambios</button>
        </div>
    </form>
</div>
<br><br><br>
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
    document.getElementById('descuentoH').addEventListener('change', function () {
        var descuentoInput = document.getElementById('montoDesc');
        if (this.value === 'si') {
            descuentoInput.style.display = 'block';
        } else {
            descuentoInput.style.display = 'none';
        }
    });
</script>
  
    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>
