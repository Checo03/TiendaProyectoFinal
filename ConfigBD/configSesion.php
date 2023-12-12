<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    include 'ConfigBD/configAudi.php';

    $mensaje_bienvenida = ""; 
    if (isset($_SESSION['usuario_logueado'])) {
        $usuario_logueado = $_SESSION['usuario_logueado'];
        $stmt = $conn->prepare("SELECT admin FROM usuarios WHERE cuenta = ?");
        $stmt->bind_param("s", $usuario_logueado);
        $stmt->execute();
        $result_admin = $stmt->get_result();

        if ($result_admin === false) {
            die("Error de consulta: " . $conn->error);
        }

        $row_admin = $result_admin->fetch_assoc();
        $admin_value = $row_admin['admin'];

        if ($admin_value == 0) {
            $mensaje_bienvenida = "Hola $usuario_logueado!";
        } elseif ($admin_value == 1) {
            $mensaje_bienvenida = "Hola admin $usuario_logueado!";
        }
    }

?>