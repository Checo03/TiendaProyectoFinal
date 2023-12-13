<?php
    session_start();
   
   include("../../ConfigBD/configSesion.php");

    if (!empty($_POST["remember"])) {
        setcookie("cuenta_correo", $_POST["cuenta_correo"], time() + 3600);
        setcookie("password", $_POST["password"], time() + 3600);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="../../Media/Img/Favicon/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="../../Estilos/CabeceraEstilos.css">
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
        <?php include("Cabeceraloh.php"); ?>
    
        <br><br><br><br>
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
       <center>
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
        <h3>12/12/2023</h3>
        <p>PROYECTO ESCOLAR UAA /PROGRAMACION PAGINAS WEB</p>
    </div>
    <div class="empresa2">
        <img src="Img/logo_empresa2.jpeg" width="100"  alt="">
    </div>
</footer>
</center>
    </div>


    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 
</body>
</html>
