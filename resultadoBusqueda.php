<?php
    session_start();    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audifonos";

    $connAudi = new mysqli($servername, $username, $password, $dbname);


    if ($connAudi->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $busqueda = isset($_POST['campo']) ? $_POST['campo'] : '';

    $promo = false;

    if(empty($busqueda)){
        $busqueda = isset($_GET['marca']) ? $_GET['marca'] : '';
        $promo = true;
    }

    $sql = "SELECT * FROM productos WHERE LOWER(nombre) LIKE LOWER('%$busqueda%') OR LOWER(marca) LIKE LOWER('%$busqueda%') OR LOWER(categoria) LIKE LOWER('%$busqueda%') OR LOWER(color) LIKE LOWER('%$busqueda%')";


    $result = mysqli_query($connAudi, $sql);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolt Sound Studios</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel="stylesheet" href="Estilos/estilosMenuProd.css">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>

    <style>
        body{
            margin: 0;
            background-color: beige !important;
        }

        #botonTienda{
            text-align: center;
            border: none;
            background-color: black;
            color: white;
            width: 175px;
            height: 50px;
        }

        #botonTienda:hover{
            background-color: #008170;  
        }


    </style>
</head>
<body>
    <?php 
        include("ConfigBD/configSesion.php");

        include("Cabecera.php"); ?>
    <br> <br> <br> <br> <br>
    <main>
        <?php if($result){ //Comprueba Si Existe La Base De Datos 

            if(mysqli_num_rows($result) > 0){ //Ve Si Encontro Resultados 
                    if($promo){ ?>    
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h2><b>Checa Nuestros Productos</b></h2>
                            <br>
                        </div>
                    </div>
                <?php }else{ ?>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h2><b>Resultados Para:  </b><?php echo htmlspecialchars($busqueda) ?></h1>
                            <br>
                        </div>
                    </div>

                <?php } 
                echo '<div class="row row-cols-1 row-cols-md-4 g-4">';
                while ($row = $result->fetch_assoc()) {
                    
                    echo '<div class="col">';
                    echo '<div class="card producto-card" style="margin: 15px;">';
                    echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '</div>';
                    echo '<ul class="list-group list-group-flush">';
                    echo '<li class="list-group-item"><span class="etiqueta">Categoria: </span>' . $row["categoria"] . '</li>';
                    echo '<li class="list-group-item"><span class="etiqueta">Precio:</span> $' . $row["precio"] . '</li>';
                    if($row["descuento"]=="si") {
                        echo '<li class="list-group-item"><span class="etiqueta">Aprovecha que este articulo cuenta con un descuento de: </span> ' . $row["montodesc"] . ' pesos</li>';
                    }
                    else {
                        echo '<li class="list-group-item"><span class="etiqueta">Por el momento el producto no cuenta con descuento, mantente al pendiente</span></li>';
                    }
                    echo '</ul>';
                    echo '<div class="card-body text-center">';
                    echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary btn-ver-detalles">Ver mas</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';

             }else{  // No Hay Base De Datos ?>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <br> <br> <br>
                        <h2><b> No Se Encontaron Resultados Para:  </b><?php echo htmlspecialchars($busqueda) ?></h1>
                        <br>
                    </div>
                </div>
                <div style="text-align: center;">
                    <form action="productos.php">
                            <button id="botonTienda">Ir A Tienda</button>
                    </form>
                </div>
            <?php } 
            } else{  ?>

            <p>No Hay Base De Datos</p>

        <?php }  ?>

        <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h2 class="mb-4">Descubre la Excelencia en Sonido</h2>
            <p class="lead">
                En Revolt Sound Studios, nos enorgullece ofrecer audífonos de la más alta calidad que transforman tu experiencia auditiva. Nuestra dedicación a la excelencia en sonido es evidente en cada par que exportamos.
            </p>
            <p class="lead">
                Lo que nos distingue de la competencia es nuestro compromiso inquebrantable con la calidad y la innovación. Cada par de audífonos que vendemos es el resultado de años de experiencia y pasión por el sonido de alta fidelidad.
            </p>
            <p class="lead">
                Nuestros productos son cuidadosamente diseñados y fabricados para ofrecer una calidad de sonido superior que te sumerge en la música como nunca antes. Ya sea que estés en un estudio de grabación profesional o simplemente disfrutando de tu música favorita, nuestros audífonos están diseñados para ofrecer una experiencia única.
            </p>
            <p class="lead">
                Únete a nosotros en Revolt Sound Studios y descubre la diferencia. Compra con confianza, sabiendo que cada par de audífonos que ofrecemos está respaldado por nuestra dedicación a la calidad y nuestro compromiso con la satisfacción del cliente.
            </p>
        </div>
    </div>
</div>
<br>
    </main>

    <?php include("footer.php"); ?>
    
</body>
</html>

<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
