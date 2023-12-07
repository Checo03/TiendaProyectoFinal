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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Studio Sounds</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/InicioEstiloss.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel="stylesheet" href="Estilos/AyudaEstilos.css">

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
    

        <section><br><br><br><br>
        <h1 class="ayuda">¿En qué podemos ayudarte?</h1>
    <div class="soporte1">
        <ol>
            <li>
                <details>
                    <summary>¿Qué opciones de conectividad tienen?</summary>
                    <p>Ofrecemos conectividad vía Bluetooth y cable auxiliar.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Cómo es la calidad de sonido?</summary>
                    <p>Tenemos una excelente calidad de sonida en nuestros productos, manejamos diferentes proveedores, cada uno de ellos tienen características específicas que te pueden ayudar a ver tu mejor opción.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Se incluyen ajustes de ecualización o perfiles de sonido personalizables?</summary>
                    <p>Si, depende del audífono que escojas, pero en general si cuentan con ecualización, directamente de la aplicación del proveedor.
                    </p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Ofrecen una experiencia de sonido envolvente o mejorada?</summary>
                    <p>Nuestros productos cuentan con cancelación de ruida tanto activa como pasiva, dependiendo del producto.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Tienen micrófono incorporado para llamadas telefónicas o asistentes de voz?</summary>
                    <p>Si, nuestros productos cuentan con micrófono para tener "manos libres"</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Existen controles táctiles o botones físicos para gestionar la reproducción de música y llamadas?</summary>
                    <p>Si, dependiendo del producto, pero en su mayoría son táctiles</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Hay actualizaciones de firmware disponibles para mejorar el rendimiento?</summary>
                    <p>Si, desde la aplicación de la marca del producto.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Viene con estuche de carga? ¿Cuáles son los accesorios incluidos?</summary>
                    <p>No, todos nuestros productos traen únicamente su cubo de carga y cable de carga.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Tienen garantía los productos?</summary>
                    <p>Si, 6 meses con nosotros y 1 año con proveedor.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>¿Cómo puedo devolver un producto?</summary>
                    <p>Si en dado caso, te interesa devolver el producto tienes que comunicarte con nosotros y te daremos los pasos a seguir para la devolución.</p>
                </details>
            </li>
            <li>
                <details>
                    <summary>Preguntas Enviadas</summary>
                    <div id="preguntas"></div>
                </details>
            </li>
        </ol>
    </div>
    <br><br><br>
    </section>
    <section id="ayuda2">
        <div class="Container-Pregunta" id="pregunta">
            <div class="Container-Contenido">
                <h1 class="ayuda">Agregar Pregunta</h1>
                <form id="preguntaForm">
                    <label for="preguntaAgregar">Pregunta:</label>
                    <center><textarea id="preguntaAgregar" name="pregunta" rows="4" cols="50" style="width: 600px;" required></textarea></center>
                    <br>
                    <label for="nombre">Nombre:</label>
                    <center><input type="text" id="nombre" name="nombre" style="width: 600px;" required></center>
                    <br>
                    <center><button id="enviar" style="width: 200px;" type="button" onclick="enviarPregunta()">Agregar</button>
                    </center>
                </form>

                <div id="preguntaEnviada" style="display:none;">
                    <h2 style="text-align: center;">Se agregó tu pregunta de forma exitosa!</h2>
                    <h3 style="text-align: center;">(Revisar en area de Preguntas Enviadas)</h3>
                </div>
            </div>
        </div>
    </section>

    <script>
        function enviarPregunta() {
            var pregunta = document.getElementById("preguntaAgregar").value;
            var nombre = document.getElementById("nombre").value;

            var preguntasEnv = document.getElementById('preguntas');
            var nuevaPregunta = document.createElement('div');
            nuevaPregunta.innerHTML = '<strong>' + nombre + ' - </strong> ' + pregunta;
            preguntasEnv.appendChild(nuevaPregunta);
            document.getElementById("preguntaEnviada").style.display = "block";

            //Limpiar campos de texto
            document.getElementById("preguntaAgregar").value = " ";
            document.getElementById("nombre").value = " ";

            /* console.log("Pregunta: " + pregunta);
            console.log("Nombre: " + nombre);

            var preguntaMostrada = document.getElementById("preguntaMostrada");
            preguntaMostrada.innerHTML = "Pregunta: " + pregunta + "<br>Nombre: " + nombre;
            document.getElementById("preguntaEnviada").style.display = "block"; */
        }
    </script>
</div>
</section>

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
</html>