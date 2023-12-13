<?php
    session_start();
   
    include("ConfigBD/configSesion.php");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu administrador</title>
    <link rel="shortcut icon" href="Media/Img/Favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="Estilos/CabeceraEstilos.css">
    <link rel="stylesheet" href="Estilos/PiePaginaEstilos.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/91b95836a0.js" crossorigin="anonymous"></script>
    <style>
        body .navbar{
            color: white;
            background-color: #005B41 !important ;
        }
        .descripcionC {
            max-width:500px;
            text-align: justify;
        }
    </style>
</head>
<body>


<?php include("Cabecera.php"); ?>
             

<?php
$servidor='localhost';
$cuenta='root';
$password='';
$bd='audifonos';

$conexion = new mysqli($servidor,$cuenta,$password,$bd);

if ($conexion->connect_errno){
    die('Error en la conexion');
} else {
    
    $sql = "SELECT * FROM productos";
    $result = $conexion->query($sql);
if ($result->num_rows > 0) {
    echo'<br><br><br>';
    echo '<div class="mt-4">';
    echo '<h2 class="text-center mb-4">Vista de registros de los productos</h2>';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Categoria</th>';
    echo '<th scope="col">Marca</th>';
    echo '<th scope="col">Descripcion</th>';
    echo '<th scope="col">Cantidad</th>';
    echo '<th scope="col">Precio</th>';
    echo '<th scope="col">Descuento</th>';
    echo '<th scope="col">Monto descuento</th>';
    echo '<th scope="col">Imagen presentacion</th>';
    echo '<th scope="col">Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">' . $row["id"] . '</th>';
        echo '<td>' . $row["nombre"] . '</td>';
        echo '<td>' . $row["categoria"] . '</td>';
        echo '<td>' . $row["marca"] . '</td>';
        echo '<td class="descripcionC">' . $row["descripcion"] . '</td>';
        echo '<td>' . $row["cantidad"] . '</td>';
        echo '<td>' . $row["precio"] . '</td>';
        echo '<td>' . $row["descuento"] . '</td>';
        echo '<td>' . $row["montodesc"] . '</td>';
        echo '<td><img src="' . $row["imagen"] . '" alt="Imagen presentación" style="max-width: 100px; max-height: 250px;"></td>';
        echo '<td>';
        echo '<a href="eliminarPro.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm mr-2">Eliminar</a>';
        echo '<a href="modificarPro.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">Editar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
else {
    echo "Sin clientes";
}


}
?>
<br><br><br>
<?php include("footer.php"); ?>
<script src="js/NavMenu.js"></script>
<script src="js/NavMenu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</body>

</html>