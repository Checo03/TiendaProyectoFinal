<?php
    session_start();
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $mensaje_bienvenida = ""; 
    if (isset($_SESSION['usuario_logueado'])) {
        $usuario_logueado = $_SESSION['usuario_logueado'];
        $stmt = $conn->prepare("SELECT admin FROM usuarios WHERE cuenta = ?");
        $stmt->bind_param("s", $usuario_logueado);
        $stmt->execute();
        $result_admin = $stmt->get_result();

        if ($result_admin === false) {
            die("Error de consulta: " . $conn->error);
        }

        $row_admin = $result_admin->fetch_assoc();
        $admin_value = $row_admin['admin'];

        if ($admin_value == 0) {
            $mensaje_bienvenida = "Hola $usuario_logueado!";
        } elseif ($admin_value == 1) {
            $mensaje_bienvenida = "Hola admin $usuario_logueado!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu administrador</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
    <style>
        body .navbar{
            color: white;
            background-color: #005B41 !important ;
        }
        .descripcionC {
            max-width:500px;
            text-align: justify;
        }
    </style>
</head>
<body>
<header class="header">
            <nav class="navbar navbar-expand-lg fixed-top py-2">
                <div class="containerN">
                    <!-- Logo Imagen -->
                    <a href="index.php" class="navbar-brand" style="margin-right:30px"><img src="Media/Img/logo_final.png" alt="LOGO" style="width: 70px;  height: 60px;"></a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                            <!-- Tienda -->
                            <li class="nav-item" style="margin-right: 10px;"><a href="productos.php" class="nav-link text-uppercase font-weight-bold">Tienda</a></li>

                            <!-- Menu -->
                            <li class="nav-item dropdown" style="margin-right: 30px;">
                                <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
                                <div class="dropdown-menu">    
                                    <a class="dropdown-item" href="acerca_de.php">Acerca De</a>
                                    <a class="dropdown-item" href="ayuda.php">Ayuda</a>
                                    <a class="dropdown-item" href="contactanos.php">Contactanos</a>
                                </div>
                            </li>
                            
                            <!-- Sentencia Inicio Sesión -->
                            <?php 
                            if (isset($_SESSION['usuario_logueado'])) {
                                if ($admin_value == 0) {
                                    ?>
                                    <!-- Mensaje Usuario -->
                                    <li class="nav-item" style="margin-right: 10px; margin-left:10px"><p style="color: #ffffff;"><?php echo $mensaje_bienvenida; ?></p></li>
                                    
                                <?php } elseif ($admin_value == 1) { ?>

                                     <!-- Menu Admin -->
                                    <li class="nav-item dropdown" style="margin-right: 10px;">
                                        <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
                                        <div class="dropdown-menu">    
                                            <a class="dropdown-item" href="altasProductos.php">Altas</a>
                                            <a class="dropdown-item" href="adminProductos.php">Bajas</a>
                                        </div>
                                    </li>
                                    <li class="nav-item" style="margin-right: 30px; margin-left:10px"><p style="color: #ffffff;"><?php echo $mensaje_bienvenida; ?></p></li>
                                <?php } ?>
                                <li class="nav-item" style="margin-right: 10px;"><a href="Log_REG/log/cerrar_sesion.php" class="btn btn-outline-primary">Cerrar Sesion</a></li>
                            <?php } else { ?>
                                <li class="nav-item" style="margin-right: 10px;"><a href="LOG_REG/log/log.php" class="btn btn-outline-primary">Login</a></li>
                                <li class="nav-item" style="margin-right: 5px;"><a href="LOG_REG/registro.html" class="btn btn-outline-primary">Registrarse</a></li>
                            <?php } ?>

                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>

                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
             


<?php
$servidor='localhost';
$cuenta='root';
$password='';
$bd='audifonos';

$conexion = new mysqli($servidor,$cuenta,$password,$bd);

if ($conexion->connect_errno){
    die('Error en la conexion');
} else {
    
    $sql = "SELECT * FROM productos";
    $result = $conexion->query($sql);
if ($result->num_rows > 0) {
    echo'<br><br><br>';
    echo '<div class="mt-4">';
    echo '<h2 class="text-center mb-4">Vista de registros de los productos</h2>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Categoria</th>';
    echo '<th scope="col">Marca</th>';
    echo '<th scope="col">Descripcion</th>';
    echo '<th scope="col">Cantidad</th>';
    echo '<th scope="col">Precio</th>';
    echo '<th scope="col">Descuento</th>';
    echo '<th scope="col">Monto descuento</th>';
    echo '<th scope="col">Imagen presentacion</th>';
    echo '<th scope="col">Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $row["id"] . '</th>';
        echo '<td>' . $row["nombre"] . '</td>';
        echo '<td>' . $row["categoria"] . '</td>';
        echo '<td>' . $row["marca"] . '</td>';
        echo '<td class="descripcionC">' . $row["descripcion"] . '</td>';
        echo '<td>' . $row["cantidad"] . '</td>';
        echo '<td>' . $row["precio"] . '</td>';
        echo '<td>' . $row["descuento"] . '</td>';
        echo '<td>' . $row["montodesc"] . '</td>';
        echo '<td><img src="' . $row["imagen"] . '" alt="Imagen presentación" style="max-width: 100px; max-height: 250px;"></td>';
        echo '<td>';
        echo '<a href="eliminarPro.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm mr-2">Eliminar</a>';
        echo '<a href="modificarPro.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Editar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
else {
    echo "Sin clientes";
}


}
?>
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
<script src="js/NavMenu.js"></script>
<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</body>

</html>