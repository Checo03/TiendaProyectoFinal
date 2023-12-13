<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-2">
        <div class="containerN">
            <!-- Logo Imagen -->
            <a href="../../index.php" class="navbar-brand" style="margin-right:30px"><img src="../../Media/Img/logo_final.png" alt="LOGO" style="width: 70px;  height: 60px;"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
                    <!-- Tienda -->
                    <li class="nav-item" style="margin-right: 10px;"><a href="../../productos.php" class="nav-link text-uppercase font-weight-bold">Tienda</a></li>

                    <!-- Menu -->
                    <li class="nav-item dropdown" style="margin-right: 30px;">
                        <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
                        <div class="dropdown-menu">    
                            <a class="dropdown-item" href="../../acerca_de.php">Acerca De</a>
                             <a class="dropdown-item" href="../../ayuda.php">Ayuda</a>
                            <a class="dropdown-item" href="../../contactanos.php">Contactanos</a>
                        </div>
                    </li>
                            
                    <!-- Sentencia Inicio Sesión -->
                    <?php if (isset($_SESSION['usuario_logueado'])) {
                        if ($admin_value == 0) { ?>

                            <!-- Mensaje Usuario -->
                            <li class="nav-item" style="margin-right: 10px; margin-left:10px; margin-top: 5px;"><p style="color: #ffffff;"><?php echo $mensaje_bienvenida; ?></p></li>
                            <li class="nav-item" style="margin-right: 210px;"><a href="cerrar_sesion.php" class="btn btn-outline-primary">Cerrar Sesion</a></li>
                                    
                    <?php } elseif ($admin_value == 1) { ?>

                        <!-- Menu Admin -->
                            <li class="nav-item dropdown" style="margin-right: 10px;">
                                <button type="button" class="nav-link text-uppercase font-weight-bold custom-dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</button>
                                <div class="dropdown-menu">    
                                    <a class="dropdown-item" href="../../altasProductos.php">Altas</a>
                                    <a class="dropdown-item" href="../../adminProductos.php">Bajas</a>
                                    <a class="dropdown-item" href="../../graficas.php">Graficas</a>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-right: 30px; margin-left:10px; margin-top: 5px;"><p style="color: #ffffff;"><?php echo $mensaje_bienvenida; ?></p></li>
                            <li class="nav-item" style="margin-right: 160px;"><a href="cerrar_sesion.php" class="btn btn-outline-primary">Cerrar Sesion</a></li>
                    <?php } 
                    } else { ?>
                        <li class="nav-item" style="margin-right: 10px;"><a href="log.php" class="btn btn-outline-primary">Login</a></li>
                        <li class="nav-item" style="margin-right: 270px;"><a href="../registroPag.html" class="btn btn-outline-primary">Registrarse</a></li>
                    <?php } ?>
                            
                    <!-- Buscador -->
                    <form style="margin-left: 80px;" class="d-flex" action="../../resultadoBusqueda.php" method="post">
                        <input name="campo" class="form-control mr-2" type="text" placeholder="¿Qué estas buscando?" aria-label="¿Qué estas buscando?">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                            
                    <!-- Carrito -->
                    <li class="nav-item" style="margin-left: 20px;">
                        <a href="#" class="nav-link" id="cart-icon-link">
                            <i class="fa-solid fa-cart-shopping" style="color: #ffffff; font-size: 24px;"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>