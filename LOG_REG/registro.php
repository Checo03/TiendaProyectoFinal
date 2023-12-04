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
    ?>
    <script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
    title: 'No se puede volver a Regisrar ese Nombre de cuenta o correo ya registrados',
    icon: 'error',
confirmButtonText: 'Aceptar'
}).then(() => {
console.log('Redirigiendo a Introducir los datos de nuevo');
window.location.href = 'registro.html';
});
});
</script>


    <?php
} else {
    
    $clave_acceso = isset($_POST['clave_acceso']) ? $_POST['clave_acceso'] : '';

    if (!empty($clave_acceso)) {
        
        if ($clave_acceso === '1234') {
            $admin = 1;

            
            $sql = "INSERT INTO proy.usuarios (nombre, cuenta, correo, pregunta, respuesta, password, admin, bloq) VALUES ('$nombre', '$cuenta', '$correo', '$pregunta', '$respuesta', '$password', '$admin', '$bloq')";

            if ($conn->query($sql) === TRUE) {
                ?>
            <script>
        document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Registro exitoso',
            icon: 'success',
        confirmButtonText: 'Aceptar'
        }).then(() => {
        console.log('Redirigiendo a Login');
        window.location.href = 'log/log.php';
        });
        });
        </script>
        
        
            <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            ?>
    <script>
document.addEventListener('DOMContentLoaded', function () {
Swal.fire({
    title: 'Clave de acceso incorrecta. No se ha registrado el usuario.',
    icon: 'error',
confirmButtonText: 'Aceptar'
}).then(() => {
console.log('Redirigiendo a Registro...');
window.location.href = 'registro.html';
});
});
</script>


    <?php
              }
    } else {
        
        $sql = "INSERT INTO proy.usuarios (nombre, cuenta, correo, pregunta, respuesta, password, admin, bloq) VALUES ('$nombre', '$cuenta', '$correo', '$pregunta', '$respuesta', '$password', '$admin', '$bloq')";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
        document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Registro exitoso',
            icon: 'success',
        confirmButtonText: 'Aceptar'
        }).then(() => {
        console.log('Redirigiendo a Login');
        window.location.href = 'log/log.php';
        });
        });
        </script>
        
        
            <?php
            
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>