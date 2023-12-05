<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Sound Studio</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel="stylesheet" href="Estilos/Contactanos.css">


    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
</head>
<body id="main-container">
    <div class="Container-Header" style="background-color: #005B41;">
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
                            <?php
session_start();
// Verificar si el usuario está logeado

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


?>
                            <!-- Menu Admin 
                              -->
                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                            <?php

// Verificar si el usuario está logeado
if (isset($_SESSION['usuario_logueado'])) {
    $usuario_logueado = $_SESSION['usuario_logueado'];
    ?>
    <?php 
                               $stmt = $conn->prepare("SELECT admin FROM usuarios WHERE cuenta = ?");
                               $stmt->bind_param("s", $usuario_logueado);
                               $stmt->execute();
                               $result_admin = $stmt->get_result();
                           
                               // Verificar si la consulta fue exitosa
                               if ($result_admin === false) {
                                   die("Error de consulta: " . $conn->error);
                               }
                           
                               // Obtener el valor de admin
                               $row_admin = $result_admin->fetch_assoc();
                               $admin_value = $row_admin['admin'];
                           
                               // Verificar si admin es igual a 0
                               if ($admin_value == 0) {
                                   $mensaje_bienvenida = "Bienvenido Usuario, $usuario_logueado!";
                               } else {
                                   $mensaje_bienvenida = "Bienvenido Administrador, $usuario_logueado!";
                                   // Resto del código para administradores
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
                                }

                            ?>
    <li class="nav-item" style="margin-right: 5px;"><a href="Log_REG/log/cerrar_sesion.php" class="btn btn-outline-primary">Cerrar Sesion</a></li>
    
<?php  } else {
    // Si el usuario no está logeado, redirigir a la página de inicio de sesión
    ?><li class="nav-item" style="margin-right: 5px; margin-left: 30px;"><a href="Log_REG/log/log.php" class="btn btn-outline-primary">Login</a></li>
    <li class="nav-item" style="margin-right: 5px;"><a href="Log_REG/registro.html" class="btn btn-outline-primary">Registrarse</a></li>
  <?php  
    
}$conn->close();
?>                        
                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>
        </header>    
    </div>

        <br><br><br><br>
        <h1>CONTACTANOS</h1>
        
        <div class="Container-Form">
            <div id="formulario">
                <h2>¿Ocurrió algún problema? Háznoslo saber</h2>
                <form action="correo.php" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                
                    <input type="submit" value="Enviar" id="submit-button">
                </form>
            </div>
        </div>
        
    
        <div id="redes-sociales">
            <h2>Estamos en las siguientes redes sociales:</h2>
            <a href="https://twitter.com/AudifonosUAA" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/twitter.png" alt="Twitter Logo" width="30" height="30">
            </a>
            <a href="https://www.facebook.com/profile.php?id=61553795859447" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/facebook.png" alt="Facebook Logo" width="35" height="35">
            </a>
            <a href="https://www.instagram.com/TU_USUARIO_DE_INSTAGRAM" target="_blank" rel="noopener noreferrer">
                <img src="Media/Img/Contactanos/Redes/instagram.jpeg" alt="Instagram Logo" width="35" height="35">
            </a>
        </div>
        <br> <br>
    </div>
    
 
   
    <br><br>
    <div id="Contenedor-Contacto">
        <h2>¿Por qué somos mejor que otras empresas?</h2>
        <br>
        <p>
            Revolt Studio es una empresa innovadora que ha irrumpido en el mundo de la tecnología auditiva con una propuesta única y emocionante. Aunque recién está comenzando su trayectoria, ya ha dejado una marca distintiva gracias a su compromiso con la calidad, el diseño vanguardista y la última tecnología en audio.
            
            Lo que distingue a Revolt Studio de otras empresas es su enfoque centrado en la experiencia del usuario. Cada par de audífonos ha sido cuidadosamente diseñado para ofrecer un sonido excepcional y una comodidad sin igual. Además, la empresa se enorgullece de utilizar materiales de alta calidad que garantizan durabilidad y resistencia.
            
            La tecnología de punta incorporada en los audífonos de Revolt Studio ofrece una experiencia de audio inigualable. Desde la cancelación de ruido hasta la conectividad Bluetooth de última generación, estos audífonos no solo cumplen con las expectativas, sino que las superan.
            Revolt Studio está destinada a convertirse en un referente en el mercado de audífonos, ofreciendo una combinación única de calidad, estilo y rendimiento que la distingue de la competencia. Con audífonos diseñados para elevar la experiencia auditiva, Revolt Studio está lista para conquistar el corazón de los amantes de la música y audiófilos exigentes.
        </p> 
    </div>
    <br><br><br><br>
    <h2>También nos pueden encontrar en la siguiente ubicación:</h2>
    <br>
    <div id="ubicacion">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7403.06308333198!2d-102.32193823628147!3d21.914108023178432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429eee23dfea56d%3A0xc2edcc935471e5fa!2sUniversidad%20Aut%C3%B3noma%20de%20Aguascalientes%2C%2020100%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1701019181041!5m2!1ses-419!2smx" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p><b>Universidad Autónoma de Aguascalientes<br>
            Avenida Universidad 940 <br> 449 910 7400<br>
            Abierto ⋅ Cierra a las 9 p.m.</b> </p>
    </div>
    <br><br>
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
    </div>
    
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>