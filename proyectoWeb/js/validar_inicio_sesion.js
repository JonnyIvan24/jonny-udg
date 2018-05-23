function validar_inicio() {
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    if (email.length == 0 || email == null || /^\s+$/.test(email)) {
        alert("Favor de escribir el e-mail");
        document.getElementById("email").focus();
        return false;
    }else if (pass.length == 0 || pass == null || /^\s+$/.test(pass)) {
        alert("Favor de escribir la contraseña");
        document.getElementById("pass").focus();
        return false;
    }else
        return true;
}