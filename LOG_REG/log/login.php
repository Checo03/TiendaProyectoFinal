
<?php
session_start();
//cookies
if(!empty($_POST["remember"])){
    setcookie("cuenta_correo",$_POST["cuenta_correo"],time()+3600);
    setcookie("password",$_POST["password"],time()+3600);
   
}
if (empty($_POST['cuenta_correo']) || empty($_POST['password']) || empty($_POST['captcha'])) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// CAPTCHA
if ($_POST['captcha'] !== $_SESSION['captcha']) {
    echo "<script>alert('El código CAPTCHA no es válido.'); window.location.href = 'log.php';</script>";
    exit;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proy";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener las variables del formulario
$cuenta_correo = $_POST['cuenta_correo'];
$password = $_POST['password'];

// Consulta SQL
$sql = "SELECT * FROM usuarios WHERE cuenta = '$cuenta_correo'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado
    $row = $result->fetch_assoc();
    $hashed_password = $row['password']; // Asegúrate de usar la función de hash que estás utilizando
    $bloq = $row['bloq']; // Obtener el valor de bloq

    if ($bloq == 1) {
        // La cuenta está bloqueada
        echo "<script>alert('Su cuenta esta bloqueada. Puede recuperarla aun...'); window.location.href = 'recover_password.html';</script>";
    exit;
    } elseif (password_verify($password, $hashed_password)) {
        // Contraseña válida, restablecer intentos fallidos
        $_SESSION['intentos_fallidos'] = 0;
        $_SESSION['usuario_logueado'] = $cuenta_correo;
        header("Location: panel_control.php");
        exit;
        // Resto del código para el login exitoso...
        echo "Inicio de sesión exitoso.";

    } else {
        
        $_SESSION['intentos_fallidos']++;

        
        if ($_SESSION['intentos_fallidos'] >= 3) {
            // Bloquear la cuenta
            $sql_update = "UPDATE usuarios SET bloq = 1 WHERE cuenta = '$cuenta_correo'";
            $conn->query($sql_update);

            echo "Su cuenta ha sido bloqueada debido a múltiples intentos fallidos.";
        } else {
            echo "Nombre de cuenta o contraseña incorrectos.";
        }
    }
} else {
    echo "Nombre de cuenta o contraseña incorrectos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
