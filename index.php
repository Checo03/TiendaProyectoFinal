<?php
    session_start();
   
    include 'ConfigBD/configSesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Sound Studios</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/InicioEstiloss.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

    <?php include("ConfigBD/configCabecera.html"); ?>

</head>
<body>
    <div class="Container-Inicio">

        <?php include "Cabecera.php" ?>


        <main>
            <div class="Img-Banner">
                <div class="Container-Img-Banner">
                    <img src="Media/Img/Inicio/Banner1.jpg">
                    <div class="Banner-Text">
                        <h1>Revolt Sound Studios</h1>
                        <p>Siente la calidad en cada nota</p>
                        <br><br>
                        <form action="productos.php">
                            <button>VER MAS</button>
                        </form>
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
                                <a href="resultadoBusqueda.php?marca=Tune">Audifonos JBL Tune - Blancos</a>
                            </div>
                            <a href="resultadoBusqueda.php?marca=Tune">
                                <img style="height: 400px; width: 685px;" src="Media/Img/Contactanos/promos/JBLTune.jpg"/>
                            </a>
                        </li>
                        <li>
                            <div class="image_title">
                                <a href="resultadoBusqueda.php?marca=Tercera">AirPods Tercera Generacion</a>
                            </div>
                            <a href="resultadoBusqueda.php?marca=Tercera">
                                <img style="height: 400px; width: 890px;" src="Media/Img/Contactanos/promos/AirPodsPromo.jpg">
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
                        <a href="resultadoBusqueda.php?marca=Apple">
                            <img src="Media/Img/Inicio/apple_marca2.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Apple</div>
                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="resultadoBusqueda.php?marca=JBL">
                            <img src="Media/Img/Inicio/jbl_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">JBL</div>
                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="resultadoBusqueda.php?marca=Sony">
                            <img src="Media/Img/Inicio/sony_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Sony</div>
                        </a>
                    </div>
                </div>
                <div class="Categorias">
                    <div class="Categoria-Foto">
                        <a href="resultadoBusqueda.php?marca=Bose">
                            <img src="Media/Img/Inicio/bose_marcas.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Bose</div>

                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="resultadoBusqueda.php?marca=Sennheiser">
                            <img src="Media/Img/Inicio/sennheiser_marca.jpg" class="Img-Cat">
                            <div class="Text-Categoria">Sennheiser</div>
                        </a>
                    </div>
                    <div class="Categoria-Foto">
                        <a href="resultadoBusqueda.php?marca=Huawei">
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
                                    <a href="resultadoBusqueda.php?marca=Tercera">
                                        <img src="Media/Img/Inicio/oferta1.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5 ><a href="resultadoBusqueda.php?marca=Tercera">AirPods Tercera Generacion</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="resultadoBusqueda.php?marca=Tercera" class="px-btn-arrow">
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
                                    <a href="resultadoBusqueda.php?marca=Tune">
                                        <img src="Media/Img/Inicio/oferta2.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5><a href="resultadoBusqueda.php?marca=Tune">JBL Tune 510BT</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="resultadoBusqueda.php?marca=Tune" class="px-btn-arrow">
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
                                    <a href="cupones.php">
                                        <img src="Media/Img/Inicio/oferta3.jpg" title="" alt="">
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h5><a href="cupones.php">Revisa Nuestros Cupones</a></h5>
                                    <p></p>
                                    <div class="btn-bar">
                                        <a href="cupones.php" class="px-btn-arrow">
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

        <?php include("footer.php"); ?>

    
    
    
    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    

    <!-- Actualiar Carrito -->
    
    
</body>

</html>

<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>