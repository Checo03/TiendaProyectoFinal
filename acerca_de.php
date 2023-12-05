
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de Nosotros</title>
    <link rel="shortcut icon" href="Media/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0fe4f3447c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Estilos/AcercaEstilos.css">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
</head>
    <br><br>
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
                                    <a class="dropdown-item" href="productos.php">Ver Todo</a>
                                    <a class="dropdown-item" href="#">Diademas</a>
                                    <a class="dropdown-item" href="#">EarBuds</a>
                                    <!--Lista De Marcas -->
                                </div>
                            </li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Conocenos</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="#" class="nav-link text-uppercase font-weight-bold">Acerca De</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="contactanos.php" class="nav-link text-uppercase font-weight-bold">Contactanos</a></li>

                            <form style="margin-left: 80px;" class="d-flex" action="">
                                <input class="form-control mr-2" type="search" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                            <?php
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
    ?><li class="nav-item" style="margin-right: 5px; margin-left: 30px;"><a href="LOG_REG/log/log.php" class="btn btn-outline-primary">Login</a></li>
    <li class="nav-item" style="margin-right: 5px;"><a href="LOG_REG/registro.html" class="btn btn-outline-primary">Registrarse</a></li>
  <?php  
    
}
$conn->close();
?>  

                            

                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>
        </header>    
    </div>
    <br><br><br>
    <div class="contenedor-estiloAD">
        <section id="sectionAD">
            <h2 id="h2AD"><i class="fa-solid fa-headphones fa-bounce"></i> ¿QUIÉNES SOMOS?</h2>
            <br>
            <p><b>"ES UN PROYECTO ESCOLAR"</b><br>Somos un equipo apasionado que ha convertido la fascinación por el sonido en un proyecto de vida. En nuestro rincón digital, nos dedicamos a compartir experiencias auditivas excepcionales. Desde la primera nota hasta el último acorde, estamos aquí para guiarte en un viaje sonoro único.
                Nos definimos por nuestra dedicación a la calidad, la innovación y la conexión con nuestra comunidad sonora.</p>
        </section>
    </div>
    <br><br><br><br><br><br>
    <div class="contenedor-estiloAD">
        <section id="sectionAD">
            <h2 id="h2AD"><i class="fa-solid fa-headphones fa-bounce"></i> NUESTRO EQUIPO</h2>
            <br>
            <p>En el corazón de nuestra tienda en línea de audífonos, existe un equipo apasionado y comprometido que trabaja incansablemente para brindarte una experiencia auditiva excepcional. Cada miembro de nuestro equipo comparte una conexión profunda con el mundo del sonido, fusionando conocimientos técnicos con una pasión innata para ofrecer lo mejor en tecnología de audio.</p>
        </section>
                <div class="slider">
                    <span style="--i:2"><img src="Media/Img/AcercaDe/img2.png" alt="img2"></span>
                    <span style="--i:3"><img src="Media/Img/AcercaDe/img3.png" alt="img3"></span>
                    <span style="--i:4"><img src="Media/Img/AcercaDe/img4.png" alt="img4"></span>
                    <span style="--i:5"><img src="Media/Img/AcercaDe/img5.png" alt="img5"></span>
                    <span style="--i:6"><img src="Media/Img/AcercaDe/img6.png" alt="img6"></span>
                    <span style="--i:7"><img src="Media/Img/AcercaDe/img7.png" alt="img7"></span>
                    <span style="--i:8"><img src="Media/Img/AcercaDe/img8.png" alt="img8"></span>
                    <span style="--i:9"><img src="Media/Img/AcercaDe/img9.png" alt="img9"></span>
                </div>
    </div>
    <br><br><br><br><br><br><br><br>

    <div class="TARJETA">
        <div class="tarjetas">
          <div style="background-image: url(Media/Img/AcercaDe/musica2.jpg);" class="tarjetas__item">
            <h2 class="tarjetas__titulo">MISIÓN</h2>
            <div class="tarjetas__info">
              <p id="PT">Proporcionar a nuestros clientes una experiencia auditiva excepcional a través de una cuidadosa selección de audífonos de alta calidad, ofreciendo comodidad, estilo y rendimiento superior. Nos esforzamos por ser líderes en la industria de audio, brindando soluciones innovadoras y satisfaciendo las necesidades de nuestros clientes de manera integral.</p>
            </div>
          </div>
          <div style="background-image: url(Media/Img/AcercaDe/musica3.jpg);" class="tarjetas__item">
            <h2 class="tarjetas__titulo">VISIÓN</h2>
            <div class="tarjetas__info">
              <p id="PT">Ser reconocidos como la tienda en línea de referencia para audífonos, destacando por nuestra excelencia en servicio al cliente, variedad de productos de vanguardia y un compromiso constante con la satisfacción del usuario. Buscamos ser pioneros en la introducción de nuevas tecnologías y tendencias en el mercado de audio, elevando constantemente los estándares de calidad y brindando experiencias auditivas inigualables.</p>
            </div>
          </div>
          <div style="background-image: url(Media/Img/AcercaDe/musica.jpg);" class="tarjetas__item">
            <h2 class="tarjetas__titulo">OBJETIVO</h2>
            <div class="tarjetas__info">
              <p id="PT">Ofrecer una amplia gama de audífonos de marcas líderes, adaptados a diversas preferencias y necesidades de los clientes. Buscamos alcanzar y mantener una posición destacada en el mercado, incrementando la participación de clientes satisfechos y expandiendo nuestra presencia online. Además, nos esforzamos por garantizar una experiencia de compra fácil y segura, respaldada por un servicio de atención al cliente excepcional.</p>
            </div>
          </div>
        </div>
    </div>
        <br><br><br><br><br>
        <div class="contenedor-estiloAD">
            <section id="sectionAD">
                <h2 id="h2AD"><i class="fa-solid fa-headphones fa-bounce"></i> VALORES DE LA EMPRESA</h2>
                <br>
                <p>Los valores que una empresa reflejan su ética, cultura y principios fundamentales. Y para nosotros, es muy importante que nuestros clientes se sientan cómodos e incluidos con nuestros productos, reflejando la importancia que son ellos para nosotros.</p>
            </section>
        </div>
        <br>
        <ol id="lista5">
            <li id="liAD"><b>Calidad:</b> Compromiso con la excelencia y la entrega de productos de alta calidad que satisfan las expectativas y necesidades de los clientes.</li>
            <li id="liAD"><b>Innovación:</b> Buscar constantemente nuevas tecnologías y tendencias en la industria del audio para ofrecer productos de vanguardia.</li>
            <li id="liAD"><b>Integridad:</b> Operar con honestidad, transparencia y ética en todas las interacciones comerciales y relaciones con los clientes.</li>
            <li id="liAD"><b>Inclusividad:</b> Fomentar un ambiente inclusivo que celebre la diversidad, tanto en el equipo interno como entre los clientes.</li> 
            <li id="liAD"><b>Sostenibilidad:</b> Compromiso con prácticas comerciales sociales y ambientalmente responsables, minimizando el impacto ambiental y contribuyendo positivamente a la comunidad.</li>
        </ol>
    <br><br><br><br>
    <div class="contenedor-estiloAD">
        <center><section id="sectionAD">
            <h2 id="h2AD">CONTÁCTANOS PARA MAYOR INFORMACIÓN</h2>
            <br>
            <center><a href="#" class="buttonAcercaD">CONTÁCTANOS </a> <i style="font-size: x-large;" class="fa-solid fa-arrow-pointer fa-beat"></i></center>
        </section></center>
    </div>
    <br><br><br><br>

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
</html>
