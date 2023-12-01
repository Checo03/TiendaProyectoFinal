function validarPassword() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        document.getElementById("error_password").innerHTML = "Las contraseñas no coinciden";
    } else {
        document.getElementById("error_password").innerHTML = "";
    }
}

function validarFormulario() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        document.getElementById("error_password").innerHTML = "Las contraseñas no coinciden";
        return false;
    } else {
        return true;
    }
}
