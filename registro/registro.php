<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$cuenta = $_POST['cuenta'];
$correo = $_POST['correo'];
$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$admin = 0;
$bloq = 0;


$verificar_duplicados = "SELECT * FROM proy.usuarios WHERE cuenta='$cuenta' OR correo='$correo'";
$resultado = $conn->query($verificar_duplicados);

if ($resultado->num_rows > 0) {
    echo "Error: El nombre de usuario o correo electrónico ya están registrados";
} else {
    
    $clave_acceso = isset($_POST['clave_acceso']) ? $_POST['clave_acceso'] : '';

    if (!empty($clave_acceso)) {
        
        if ($clave_acceso === '1234') {
            $admin = 1;

            
            $sql = "INSERT INTO proy.usuarios (nombre, cuenta, correo, pregunta, respuesta, password, admin, bloq) VALUES ('$nombre', '$cuenta', '$correo', '$pregunta', '$respuesta', '$password', '$admin', '$bloq')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Clave de acceso incorrecta. No se ha registrado el usuario.";
        }
    } else {
        
        $sql = "INSERT INTO proy.usuarios (nombre, cuenta, correo, pregunta, respuesta, password, admin, bloq) VALUES ('$nombre', '$cuenta', '$correo', '$pregunta', '$respuesta', '$password', '$admin', '$bloq')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
            header("Location: log/login.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>