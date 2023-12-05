<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Productos</title>
    <link rel="stylesheet" href="Estilos/estilosMenuProd.css">
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>

</head>
<body>
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
<?php
echo '<br><br><br>';
echo ' <div class="busquedaCat">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post" class="bg-light p-4 rounded">
                    <div class="mb-3">
                        <label for="categoriaS" class="form-label">Filtrar por categoría:</label>
                        <select class="form-select" id="categoriaS" name="categoriaS">
                            <option value="todas">Todas</option>
                            <option value="earbuds">Earbuds</option>
                            <option value="diadema">Diadema</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"  name="categoriaF" id="categoriaF">Filtrar</button>
                </form>
            </div>
        </div>
        </div>';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
if(isset($_POST["categoriaF"])) {
    $filtrarC=$_POST["categoriaS"];
    if($filtrarC=="earbuds") {
        echo '<h3 class="tituloC">Categoria encontrada: Earbuds</h3>';
        $sqlE = "SELECT * FROM productos WHERE categoria='$filtrarC'";
        $resultE = $conn->query($sqlE);

        if ($resultE->num_rows > 0) {
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = $resultE->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card producto-card" style="margin: 15px;">';
                echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                echo '</div>';
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"><span class="etiqueta">Categoria: </span>' . $row["categoria"] . '</li>';
                echo '<li class="list-group-item"><span class="etiqueta">Precio:</span> $' . $row["precio"] . '</li>';
                if($row["descuento"]=="si") {
                    echo '<li class="list-group-item"><span class="etiqueta">Aprovecha que este articulo cuenta con un descuento de: </span> ' . $row["montodesc"] . ' pesos</li>';
                }
                else {
                    echo '<li class="list-group-item"><span class="etiqueta">Por el momento el producto no cuenta con descuento, mantente al pendiente</span></li>';
                }
                echo '</ul>';
                echo '<div class="card-body text-center">';
                echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary btn-ver-detalles">Ver mas</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No se encontraron productos.";
        }

    }
    if($filtrarC=="diadema") {
        echo '<h3 class="tituloC">Categoria encontrada: Diadema</h3>';
        $sqlD = "SELECT * FROM productos WHERE categoria='$filtrarC'";
        $resultD = $conn->query($sqlD);

        if ($resultD->num_rows > 0) {
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = $resultD->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card producto-card" style="margin: 15px;">';
                echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                echo '</div>';
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"><span class="etiqueta">Categoria: </span>' . $row["categoria"] . '</li>';
                echo '<li class="list-group-item"><span class="etiqueta">Precio:</span> $' . $row["precio"] . '</li>';
                if($row["descuento"]=="si") {
                    echo '<li class="list-group-item"><span class="etiqueta">Aprovecha que este articulo cuenta con un descuento de: </span> ' . $row["montodesc"] . ' pesos</li>';
                }
                else {
                    echo '<li class="list-group-item"><span class="etiqueta">Por el momento el producto no cuenta con descuento, mantente al pendiente</span></li>';
                }
                echo '</ul>';
                echo '<div class="card-body text-center">';
                echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary btn-ver-detalles">Ver mas</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No se encontraron productos.";
        }

    }
    if($filtrarC=="todas") {
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card producto-card" style="margin: 15px;">';
                echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                echo '</div>';
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item"><span class="etiqueta">Categoria: </span>' . $row["categoria"] . '</li>';
                echo '<li class="list-group-item"><span class="etiqueta">Precio:</span> $' . $row["precio"] . '</li>';
                if($row["descuento"]=="si") {
                    echo '<li class="list-group-item"><span class="etiqueta">Aprovecha que este articulo cuenta con un descuento de: </span> ' . $row["montodesc"] . ' pesos</li>';
                }
                else {
                    echo '<li class="list-group-item"><span class="etiqueta">Por el momento el producto no cuenta con descuento, mantente al pendiente</span></li>';
                }
                echo '</ul>';
                echo '<div class="card-body text-center">';
                echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary btn-ver-detalles">Ver mas</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "No se encontraron productos.";
        }
        
    }
} else {
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col">';
            echo '<div class="card producto-card" style="margin: 15px;">';
            echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
            echo '</div>';
            echo '<ul class="list-group list-group-flush">';
            echo '<li class="list-group-item"><span class="etiqueta">Categoria: </span>' . $row["categoria"] . '</li>';
            echo '<li class="list-group-item"><span class="etiqueta">Precio:</span> $' . $row["precio"] . '</li>';
            if($row["descuento"]=="si") {
                echo '<li class="list-group-item"><span class="etiqueta">Aprovecha que este articulo cuenta con un descuento de: </span> ' . $row["montodesc"] . ' pesos</li>';
            }
            else {
                echo '<li class="list-group-item"><span class="etiqueta">Por el momento el producto no cuenta con descuento, mantente al pendiente</span></li>';
            }
            echo '</ul>';
            echo '<div class="card-body text-center">';
            echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary btn-ver-detalles">Ver mas</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No se encontraron productos.";
    }
}


$conn->close();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h2 class="mb-4">Descubre la Excelencia en Sonido</h2>
            <p class="lead">
                En Revolt Sound Studios, nos enorgullece ofrecer audífonos de la más alta calidad que transforman tu experiencia auditiva. Nuestra dedicación a la excelencia en sonido es evidente en cada par que exportamos.
            </p>
            <p class="lead">
                Lo que nos distingue de la competencia es nuestro compromiso inquebrantable con la calidad y la innovación. Cada par de audífonos que vendemos es el resultado de años de experiencia y pasión por el sonido de alta fidelidad.
            </p>
            <p class="lead">
                Nuestros productos son cuidadosamente diseñados y fabricados para ofrecer una calidad de sonido superior que te sumerge en la música como nunca antes. Ya sea que estés en un estudio de grabación profesional o simplemente disfrutando de tu música favorita, nuestros audífonos están diseñados para ofrecer una experiencia única.
            </p>
            <p class="lead">
                Únete a nosotros en Revolt Sound Studios y descubre la diferencia. Compra con confianza, sabiendo que cada par de audífonos que ofrecemos está respaldado por nuestra dedicación a la calidad y nuestro compromiso con la satisfacción del cliente.
            </p>
        </div>
    </div>
</div>
<br>

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



</body>

<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



</html>