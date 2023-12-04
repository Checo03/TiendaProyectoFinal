<?php
session_start();
// Verificar si el usuario está logeado
if (isset($_SESSION['usuario_logueado'])) {
    $usuario_logueado = $_SESSION['usuario_logueado'];
} else {
    // Si el usuario no está logeado, redirigir a la página de inicio de sesión
    header("Location: log.php");
    exit;
}
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el estado de administrador del usuario
$sql_admin = "SELECT admin FROM usuarios WHERE cuenta = '$usuario_logueado'";
$result_admin = $conn->query($sql_admin);

if ($result_admin->num_rows > 0) {
    $row_admin = $result_admin->fetch_assoc();
    $es_admin = $row_admin['admin'];

    // Mensaje de bienvenida según el estado de administrador
    $mensaje_bienvenida = $es_admin ? "Bienvenido Administrador, $usuario_logueado!" : "Bienvenido Usuario, $usuario_logueado!";
} else {
    // En caso de error, muestra un mensaje genérico
    $mensaje_bienvenida = "Bienvenido, $usuario_logueado!";
}

// Cerrar la conexión a la base de datos

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <link rel="shortcut icon" href="../../Media/Img/Favicon/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="CabeceraEstilos.css">
<link rel="stylesheet" href="../../Estilos/PiePaginaEstilos.css">
<link rel="stylesheet" href="../../Estilos/LoginEstilos.css">

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="Container-Inicio">
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
                            <li class="nav-item" style="margin-right: 10px;"><a href="../../acerca_de.php" class="nav-link text-uppercase font-weight-bold">Acerca De</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="../../contactanos.php" class="nav-link text-uppercase font-weight-bold">Contactanos</a></li>

                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>

                            <?php
                                if (isset($_SESSION['usuario_logueado'])) {
                                    $usuario_logueado = $_SESSION['usuario_logueado'];
                            ?>
                            <?php 
                                $sql_admin = "SELECT admin FROM usuarios WHERE cuenta = '$usuario_logueado'";
                                $result_admin = $conn->query($sql_admin);

                                if ($result_admin->num_rows > 0) {
                                    $row_admin = $result_admin->fetch_assoc();
                                    $es_admin = $row_admin['admin'];
                                    // administrador
                                    $mensaje_bienvenida = $es_admin ? "Bienvenido Administrador, $usuario_logueado!" : "Bienvenido Usuario, $usuario_logueado!";
                                ?>
                                    <p><?php echo $mensaje_bienvenida; ?></p>
                                    <li class="nav-item dropdown" style="margin-right: 10px;">
                                    <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
                                    <div class="dropdown-menu">    
                                        <a class="dropdown-item" href="#">Altas</a>
                                        <a class="dropdown-item" href="#">Bajas</a>
                                        <a class="dropdown-item" href="#">Cambios</a>
                                    </div>
                                </li>
                            <?php
                                } else {
                                $mensaje_bienvenida = "Bienvenido, $usuario_logueado!";
                            ?><p><?php echo $mensaje_bienvenida; ?></p>
                            <?php
                                }

                            ?>
                             <li class="nav-item" style="margin-right: 5px;"><a href="cerrar_sesion.php" class="btn btn-outline-primary">Cerrar Sesion</a></li>
    
<?php  } else {
    // Si el usuario no está logeado, redirigir a la página de inicio de sesión
    ?><li class="nav-item" style="margin-right: 5px; margin-left: 30px;"><a href="LOG_REG/log/log.php" class="btn btn-outline-primary">Login</a></li>
    <li class="nav-item" style="margin-right: 5px;"><a href="LOG_REG/registro.html" class="btn btn-outline-primary">Registrarse</a></li>
  <?php  
    
}$conn->close();
?>                        

                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>

        </header>      
        
    <div class="Container-Login">
        <div class="Form-Login">
            <h1>Panel de Control</h1>

            <p><?php echo $mensaje_bienvenida; ?></p>

            <div class="Form-Control">
                <a href="../../index.php">Ir al Inicio</a>
            </div>

            <div class="Form-Control">
                <a href="cerrar_sesion.php">Cerrar Sesión</a>
            </div>
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


    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 
</body>
</html>
