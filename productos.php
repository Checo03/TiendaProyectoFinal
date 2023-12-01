<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Mostrar los resultados en tarjetas Bootstrap
if ($result->num_rows > 0) {
    echo '<div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center;">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card" style="width: 23rem; margin: 15px;">';
        echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="Producto" style="width: 100%; height: 300px;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
        echo '<p class="card-text">' . $row["descripcion"] . '</p>';
        echo '</div>';
        echo '<ul class="list-group list-group-flush">';
        echo '<li class="list-group-item">Precio: ' . $row["precio"] . '</li>';
        echo '<li class="list-group-item">Desucuento: ' . $row["descuento"] . '</li>';
        echo '<li class="list-group-item">Cantidad:' . $row["cantidad"] . '</li>';
        echo '</ul>';
        echo '<div class="card-body text-center">';
        echo '<a href="detalleProducto.php?id=' . $row["id"] . '" class="btn btn-primary">Ver Detalles</a>';
        echo '</div>';
        echo '</div>';
        echo '<br>';
    }
    echo '</div>';
} else {
    echo "No se encontraron productos.";
}

// Cerrar conexión
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleMenuProductos.css">

    <title>Productos</title>
</head>
<body>
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
            <label for="imagen">Imagen del Producto:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar Producto</button>
        </div>
    </form>
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


</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>