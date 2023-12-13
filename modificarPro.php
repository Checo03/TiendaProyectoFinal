<?php
    session_start();
    include("ConfigBD/configSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos/estilosModProd.css">
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d06ada3de.js" crossorigin="anonymous"></script>
  
    
</head>
<body>

<?php
    include("Cabecera.php");

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'audifonos';

$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
}


$idP= $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = $idP";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $modP= $resultado->fetch_assoc();
    $nombre = $modP['nombre'];
    $categoria = $modP['categoria'];
    $marca = $modP['marca'];
    $descripcion = $modP['descripcion'];
    $cantidad = $modP['cantidad'];
    $precio = $modP['precio'];
    $conectividad=$modP["conectividad"];
    $colorP=$modP["color"];
    $descuentoSN=$modP["descuento"];
    $montoD=$modP["montodesc"];
    $imagen=$modP["imagen"];
    $imagen2=$modP["imagen2"];
    $imagen3=$modP["imagen3"];
    $imagen4=$modP["imagen4"];

} else {
    echo 'No se encontro el producto solicitado.';
}
    
?>

      
<br><br><br><br>
<div class="container">
    <h2 class="mb-4">Editar Producto</h2>
    <form action="guardarModPro.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" id="idP" name="idP" value="<?php echo $idP; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="earbuds" <?php echo ($categoria == 'earbuds') ? 'selected' : ''; ?>>Earbuds</option>
                <option value="diadema" <?php echo ($categoria == 'diadema') ? 'selected' : ''; ?>>Diadema</option>
            </select>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marca; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="8" required><?php echo $descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad en Existencia:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $precio; ?>" required>
        </div>
        <div class="form-group">
            <label for="conectividad">Conectividad:</label>
            <input type="text" class="form-control" id="conectividad" name="conectividad" value="<?php echo $conectividad; ?>" required>
        </div>
        <div class="form-group">
            <label for="colorP">Color:</label>
            <input type="text" class="form-control" id="colorP" name="colorP" value="<?php echo $colorP; ?>"  required>
        </div>
        <div class="form-group">
            <label for="descuentoH">Descuento:</label>
            <select class="form-control" id="descuentoH" name="descuentoH" required>
                <option value="no" <?php echo ($descuentoSN === 'no') ? 'selected' : ''; ?>>No</option>
                <option value="si" <?php echo ($descuentoSN === 'si') ? 'selected' : ''; ?>>Sí</option>
            </select>
        </div>
        <div class="form-group" id="montoDesc" style="display: none;">
            <label for="descuento">Monto de Descuento (en pesos):</label>
            <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo $montoD; ?>" step="1">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen presentacion:</label>
            <img src="<?php echo $imagen; ?>" alt="Imagen presentacion"><?php echo $imagen; ?>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
            <input type="hidden" name="imagen_actual" value="<?php echo $imagen; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen2">Imagen 2:</label>
            <img src="<?php echo $imagen2; ?>" alt="Imagen 2"><?php echo $imagen2; ?>
            <input type="file" class="form-control-file" id="imagen2" name="imagen2" accept="image/*">
            <input type="hidden" name="imagen2_actual" value="<?php echo $imagen2; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen3">Imagen 3:</label>
            <img src="<?php echo $imagen3; ?>" alt="Imagen 3"> <?php echo $imagen3; ?>
            <input type="file" class="form-control-file" id="imagen3" name="imagen3" accept="image/*">
            <input type="hidden" name="imagen3_actual" value="<?php echo $imagen3; ?>">
        </div>
        <hr style="border-top: 2px solid #3498db">
        <div class="form-group">
            <label for="imagen4">Imagen 4:</label>
            <img src="<?php echo $imagen4; ?>" alt="Imagen 4"> <?php echo $imagen4; ?>
            <input type="file" class="form-control-file" id="imagen4" name="imagen4" accept="image/*">
            <input type="hidden" name="imagen4_actual" value="<?php echo $imagen4; ?>">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="guardarC" id="guardarC">Guardar Cambios</button>
        </div>
    </form>
</div>
<br><br><br>
<?php include("footer.php"); ?>

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

</html>

