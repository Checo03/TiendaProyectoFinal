<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audifonos";

    $connAudi = new mysqli($servername, $username, $password, $dbname);


    if ($connAudi->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

?>