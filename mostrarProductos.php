
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Categoría: " . $row["categoria"] . "<br>";
        echo "Marca: " . $row["marca"] . "<br>";
        echo "Descripción: " . $row["descripcion"] . "<br>";
        echo "Cantidad: " . $row["cantidad"] . "<br>";
        echo "Precio: $" . $row["precio"] . "<br>";
        echo "Descuento: " . $row["descuento"] . "%<br>";
        echo "Imagen: <img src='" . $row["imagen"] . "' alt='Imagen del producto'><br>";
        echo "---------------------------------------<br>";
    }
} else {
    echo "No se encontraron productos.";
}


$conn->close();
?>
=======
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audifonos";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Categoría: " . $row["categoria"] . "<br>";
        echo "Marca: " . $row["marca"] . "<br>";
        echo "Descripción: " . $row["descripcion"] . "<br>";
        echo "Cantidad: " . $row["cantidad"] . "<br>";
        echo "Precio: $" . $row["precio"] . "<br>";
        echo "Descuento: " . $row["descuento"] . "%<br>";
        echo "Imagen: <img src='" . $row["imagen"] . "' alt='Imagen del producto'><br>";
        echo "---------------------------------------<br>";
    }
} else {
    echo "No se encontraron productos.";
}


$conn->close();
?>

