<?php
// Conexión a la base de datos (reemplaza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$cuenta = $_POST['cuenta'];
$correo = $_POST['correo'];
$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$admin = 0;
$bloq = 0;

// Verificar duplicados antes de registrar
$verificar_duplicados = "SELECT * FROM proy.usuarios WHERE cuenta='$cuenta' OR correo='$correo'";
$resultado = $conn->query($verificar_duplicados);

if ($resultado->num_rows > 0) {
    echo "Error: El nombre de usuario o correo electrónico ya están registrados";
} else {
    // Verificar clave de acceso (solo para administradores si se proporciona)
    $clave_acceso = isset($_POST['clave_acceso']) ? $_POST['clave_acceso'] : '';

    if (!empty($clave_acceso)) {
        // Validar la clave de acceso solo si se proporciona
        if ($clave_acceso === '1234') {
            $admin = 1;

            // Insertar datos en la base de datos
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
        // Si la clave de acceso no se proporciona, realizar el registro sin validarla
        $sql = "INSERT INTO proy.usuarios (nombre, cuenta, correo, pregunta, respuesta, password, admin, bloq) VALUES ('$nombre', '$cuenta', '$correo', '$pregunta', '$respuesta', '$password', '$admin', '$bloq')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>