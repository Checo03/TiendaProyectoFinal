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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Sound Studios</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/InicioEstiloss.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

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
                                    <a class="dropdown-item" href="productos.php">Ver Todo</a>
                                    <a class="dropdown-item" href="#">Diademas</a>
                                    <a class="dropdown-item" href="#">EarBuds</a>
                                    <!--Lista De Marcas -->
                                </div>
                            </li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="ayuda.php" class="nav-link text-uppercase font-weight-bold">Ayuda</a></li>
                            <li class="nav-item" style="margin-right: 10px;"><a href="acerca_de.php" class="nav-link text-uppercase font-weight-bold">Acerca De</a></li>
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
                                       <a class="dropdown-item" href="altasProductos.php">Altas</a>
                                           <a class="dropdown-item" href="adminProductos.php">Bajas</a>
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
    
}$conn->close();
?>                        

                            <li class="nav-item" style="margin-left: 20px;"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i></a></li>       
                        </ul>
                    </div>
                </div>
            </nav>

        </header>      

        <main>
            <div class="Img-Banner">
                <div class="Container-Img-Banner">
                    <img src="Media/Img/Inicio/Banner1.jpg">
                    <div class="Banner-Text">
                        <h1>Revolt Sound Studios</h1>
                        <p>Siente la calidad en cada nota</p>
                        <br><br>
                        <button>VER MAS</button>
                    </div>
                </div>
            </div> 
            
            <section>
                <div class="Categorias-Title" style="margin-top: 50px;">
                    <h2>Conoce nuestros nuevos productos...</h2>
                    <p style="font-size: 20px; font-style: italic;" class="text-center">Productos 100% oiginales de la mejor calidad, ganando la confianza de nuestros clientes</p>
                </div>
                <div class="accordian">
                    <ul>
                        <li>
                            <div class="image_title">
                                <a href="#">Audífonos Gamer Inalámbricos - Blancos</a>
                            </div>
                            <a href="#">
                                <img style="height: 400px; width: 685px;" src="Media/Img/Contactanos/promos/audif.jpg"/>
                            </a>
                        </li>
                        <li>
                            <div class="image_title">
                                <a href="#">Audífonos Gamer Inalámbricos - Morados</a>
                            </div>
                            <a href="#">
                                <img style="height: 400px; width: 890px;" src="Media/Img/Contactanos/promos/audiff2.jpeg">
                            </a>
                        </li>
                        <li>
                            <div class="image_title">
                                <a href="#">Audífonos Gamer Inalámbricos - Amarillos</a>
                            </div>
                            <a href="#">
                                <img style="height: 400px; width: 760px;" src="Media/Img/Contactanos/promos/audiff3.jpeg"/>
                            </a>
                        </li>
                        <li>
                            <div class="image_title">
                                <a href="#">Audífonos Gamer Inalámbricos - Verde Platino</a>
                            </div>
                            <a href="#">
                                <img style="height: 400px; width: 760px;" src="Media/Img/Contactanos/promos/audi4.jpeg"/>
                            </a>
                        </li>
                        <li>
                            <div class="image_title">
                                <a href="#">Audífonos Gamer Inalámbricos - Negros</a>
                            </div>
                            <a href="#">
                                <img style="height: 400px; width: 785px;" src="Media/Img/Contactanos/promos/audif5.jpg"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <div class="Container-Categorias">
                <div class="Categorias-Title" style="margin-bottom: 30px;">
                    <h2>Marcas que manejamos</h2>
                    <p style="font-size: 20px; font-style: italic;" class="text-center">Descubre la gran cantidad de marcas que tenemos para ti</p>
                </div>
                <div class="Categorias" style="margin-bottom: 50px;">
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/apple_marca2.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Apple</div>

                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/jbl_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">JBL</div>
                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/sony_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Sony</div>
                        </a>
                    </div>
                </div>
                <div class="Categorias">
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/bose_marcas.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Bose</div>

                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/sennheiser_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Sennheiser</div>
                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="#">
                            <img src="Media/Img/Inicio/huawei_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Huawei</div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Comentarios -->
            <section class="wrapper">
                <div class="container">
                    <div class="row">
                    <div class="Categorias-Title" style="margin-bottom: 30px;">
                        <h2>Comentrios sobre nuestros productos...</h2>
                    </div>
                    </div>
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4"><div class="card text-dark card-has-bg click-col" style="background-image:url('Media/Img/Inicio/Diadema.jpg');">
                        <img class="card-img d-none" src="" alt="Media/Img/Inicio/Diadema.jpg">
                        <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2">Comentario</small>
                            <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">¡Estoy impresionada con los audífonos inalámbricos que compré, definitivamente recomendaría estos audífonos a cualquier amante de la música!</a></h4>
                        <small><i class="far fa-clock"></i> Noviembre 29, 2023</small>
                        </div>
                        <div class="card-footer">
                        <div class="media">
                <img class="mr-3 rounded-circle" src="Media/Img/Inicio/users.png" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body">
                    <h6 class="my-0 text-dark d-block">María López</h6>
                    <small>Cliente frecuente</small>
                </div>
                </div>
                        </div>
                        </div>
                    </div></div>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4"><div class="card text-dark card-has-bg click-col" style="background-image:url('Media/Img/Inicio/Earbuds.jpg');">
                        <img class="card-img d-none" src="Media/Img/Inicio/Earbuds.jpg" alt="">
                        <div class="card-img-overlay d-flex flex-column">       
                        <div class="card-body">
                            <small class="card-meta mb-2">Comentario</small>
                            <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Los audífonos deportivos que adquirí son simplemente geniales. ¡Totalmente satisfecho con mi compra!</a></h4>
                        <small><i class="far fa-clock"></i> Diciembre 01, 2023</small>
                        </div>
                        <div class="card-footer">
                        <div class="media">
                <img class="mr-3 rounded-circle" src="Media/Img/Inicio/users.png" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body">
                    <h6 class="my-0 text-dark d-block">Juan González</h6>
                    <small>Cliente frecuente</small>
                </div>
                </div>
                        </div>
                        </div>
                    </div></div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4"><div class="card text-dark card-has-bg click-col" style="background-image:url('Media/Img/Inicio/comentarios.jpg');">
                        <img class="card-img d-none" src="" alt="Media/Img/Inicio/comentarios.jpg">
                        <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2">Comentario</small>
                            <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Mis nuevos audífonos con cancelación de ruido son una maravilla. La cancelación de ruido es increíblemente efectiva.</a></h4>
                        <small><i class="far fa-clock"></i> Noviembre 26, 2023</small>
                        </div>
                        <div class="card-footer">
                        <div class="media">
                <img class="mr-3 rounded-circle" src="Media/Img/Inicio/users.png" alt="Generic placeholder image" style="max-width:50px">
                <div class="media-body">
                    <h6 class="my-0 text-dark d-block">Emily Smith</h6>
                    <small>Cliente frecuente</small>
                </div>
                </div>
                        </div>
                        </div>
                    </div></div>                
                </div>
                
                </div>
                </section>

            <!-- Ultimas ofertas     -->
            <div class="Container-Ofertas">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="Categorias-Title">
                                <h2>Ultimas Ofertas</h2>
                                <p style="font-size: 20px; font-style: italic;">Aun no se acaba el buen fin aprovecha las ofertas que te da la familia Revolt</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="Oferta">
                                <div class="Img-Oferta">
                                    <div class="date">04 FEB</div>
                                    <a href="#">
                                        <img src="Media/Img/Inicio/oferta1.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5 ><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="#" class="px-btn-arrow">
                                            <span>Ver Oferta</span>
                                            <i class="arrow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="Oferta">
                                <div class="Img-Oferta">
                                    <div class="date">04 FEB</div>
                                    <a href="#">
                                        <img src="Media/Img/Inicio/oferta2.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="#" class="px-btn-arrow">
                                            <span>Ver Oferta</span>
                                            <i class="arrow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="Oferta">
                                <div class="Img-Oferta">
                                    <div class="date">04 FEB</div>
                                    <a href="#">
                                        <img src="Media/Img/Inicio/oferta3.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="#" class="px-btn-arrow">
                                            <span>Ver Oferta</span>
                                            <i class="arrow"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

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

    
    
    
    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 
</body>
