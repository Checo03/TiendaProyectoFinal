<?php
    session_start();
   
    include("ConfigBD/configSesion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Estilos/estilosAltasProd.css">
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>

    <title>Revolt Sound Studio</title>
</head>
<body>

    <?php include("Cabecera.php") ?>


        <br><br><br>   
    
<div class="container mt-5">
    <h2 class="mb-4">Registro de Producto</h2>
    <form action="registrarProducto.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="earbuds">Earbuds</option>
                <option value="diadema">Diadema</option>
            </select>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="8" required></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad en Existencia:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="conectividad">Conectividad:</label>
            <input type="text" class="form-control" id="conectividad" name="conectividad"  required>
        </div>
        <div class="form-group">
            <label for="colorP">Color:</label>
            <input type="text" class="form-control" id="colorP" name="colorP"  required>
        </div>
        <div class="form-group">
            <label for="descuentoH">Descuento:</label>
            <select class="form-control" id="descuentoH" name="descuentoH" required>
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>
        </div>
        <div class="form-group" id="montoDesc" style="display: none;">
            <label for="descuento">Monto de Descuento (en pesos):</label>
            <input type="number" class="form-control" id="descuento" name="descuento" step="1">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen presentacion:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="imagen2">Imagen 2:</label>
            <input type="file" class="form-control-file" id="imagen2" name="imagen2" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="imagen3">Imagen 3:</label>
            <input type="file" class="form-control-file" id="imagen3" name="imagen3" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="imagen4">Imagen 4:</label>
            <input type="file" class="form-control-file" id="imagen4" name="imagen4" accept="image/*" required>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar Producto</button>
        </div>
    </form>
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

<script>
    document.getElementById('descuentoH').addEventListener('change', function () {
        var descuentoInput = document.getElementById('montoDesc');
        if (this.value === 'si') {
            descuentoInput.style.display = 'block';
        } else {
            descuentoInput.style.display = 'none';
        }
    });
</script>
    <script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>