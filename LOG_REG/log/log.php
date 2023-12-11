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

<?php
if (!empty($_POST["remember"])) {
    setcookie("cuenta_correo", $_POST["cuenta_correo"], time() + 3600);
    setcookie("password", $_POST["password"], time() + 3600);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="../../Media/Img/Favicon/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="CabeceraEstilos.css">
<link rel="stylesheet" href="../../Estilos/PiePaginaEstilos.css">
<link rel="stylesheet" href="../../Estilos/LoginEstilos.css">

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="sty.css">

    <style>
        .Container-Login {
            position: relative;
        }

        .Register-Button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .Register-Button button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>

    <title>Iniciar Sesión</title>
</head>
<body>
<div class="Container-Inicio">
<header class="header">
            <nav class="navbar navbar-expand-lg fixed-top py-2">
                <div class="containerN">
                    <!-- Logo Imagen -->
                    <a href="index.php" class="navbar-brand" style="margin-right:30px"><img src="../../Media/Img/logo.png" alt="LOGO" style="width: 70px;  height: 60px;"></a>
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

    </div>  
        
        <div class="Container-Login">
    <form class="Form-Login" action="login.php" method="post">
        <h1>Iniciar Sesión</h1>
        <div class="Form-Control">
            <label for="cuenta_correo">Nombre de cuenta o Correo Electrónico:</label>
            <input type="text" name="cuenta_correo" required value="<?php echo isset($_COOKIE["cuenta_correo"]) ? $_COOKIE["cuenta_correo"] : ''; ?>">
        </div>

        <div class="Form-Control">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required value="<?php echo isset($_COOKIE["password"]) ? $_COOKIE["password"] : ''; ?>">
        </div>

        <div class="Form-Control">
            <label for="captcha">Captcha:</label>
            <img src="captcha.php" alt="CAPTCHA">
            <br>
            <input type="text" name="captcha" required>
        </div>

        <div class="Form-Control">
            <label for="remember">Recordar sesión:</label>
            <input type="checkbox" name="remember" id="remember">
        </div>

        <script>
            // Obtener la referencia al elemento de la casilla de verificación
            var checkbox = document.getElementById("remember");

            // Verificar si la cookie existe
            var passwordCookie = getCookie("password");
            if (passwordCookie !== "") {
                // Marcar la casilla si la cookie existe
                checkbox.checked = true;
            }

            // Función para obtener el valor de una cookie por nombre
            function getCookie(cookieName) {
                var name = cookieName + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var cookieArray = decodedCookie.split(';');
                for (var i = 0; i < cookieArray.length; i++) {
                    var cookie = cookieArray[i].trim();
                    if (cookie.indexOf(name) === 0) {
                        return cookie.substring(name.length, cookie.length);
                    }
                }
                return "";
            }
            
        </script>

        <div class="row">
            <button onclick="window.location.href='../registro.html'" style="margin-left: 100px;">¿No tienes cuenta? Regístrate</button>
            <button type="submit" style="margin-left: 100px;">Iniciar Sesión</button>
        </div>
    </form>
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
