<?php
if (!empty($_POST["remember"])) {
    setcookie("cuenta_correo", $_POST["cuenta_correo"], time() + 3600);
    setcookie("password", $_POST["password"], time() + 3600);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        .Container-Login {
            position: relative;
        }

        .Register-Button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .Register-Button button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>

    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="Container-Login">
        <form class="Form-Login" action="login.php" method="post">
            <h1>Iniciar Sesión</h1>
            <div class="Form-Control">
                <label for="cuenta_correo">Nombre de cuenta o Correo Electrónico:</label>
                <input type="text" name="cuenta_correo" required value="<?php if (isset($_COOKIE["cuenta_correo"])) {echo $_COOKIE["cuenta_correo"];}?>">
            </div>

            <div class="Form-Control">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required value="<?php if (isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>">
            </div>

            <div class="Form-Control">
                <label for="captcha">Captcha:</label>
                <img src="captcha.php" alt="CAPTCHA">
                <br>
                <input type="text" name="captcha" required>
            </div>

            <div class="Form-Control">
    <label for="remember">Recordar sesión:</label>
    <input type="checkbox" name="remember" id="remember">
</div>

<script>
// Obtener la referencia al elemento de la casilla de verificación
var checkbox = document.getElementById("remember");

// Verificar si la cookie existe
if (document.cookie.indexOf("password") !== -1) {
    // Marcar la casilla si la cookie existe
    checkbox.checked = true;
}
</script>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <div class="Register-Button">
            <button onclick="window.location.href='../registro.html'">¿No tienes cuenta? Regístrate</button>
        </div>
    </div>
</body>
</html>
