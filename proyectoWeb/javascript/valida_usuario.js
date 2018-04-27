function validar_usuario() {
    var nombre = document.getElementById("nombre").value;
    var apaterno = document.getElementById("apaterno").value;
    var amaterno = document.getElementById("amaterno").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var telefono = document.getElementById("telefono").value;
    var fecha_nac = document.getElementById("fecha_nac").value;
    var rol = document.getElementById("rol").value;

    if (nombre.length == 0 || nombre == null || /^\s+$/.test(nombre)) {
        alert("Favor de escribir el(los) nombre(s)");
        document.getElementById("nombre").focus();
        return false;
    }else if (apaterno.length == 0 || apaterno == null || /^\s+$/.test(apaterno)) {
        alert("Favor de escribir el apellido paterno");
        document.getElementById("apaterno").focus();
        return false;
    }else if (amaterno.length == 0 || amaterno == null || /^\s+$/.test(amaterno)) {
        alert("Favor de escribir el apellido materno");
        document.getElementById("amaterno").focus();
        return false;
    }else if (email.length == 0 || email == null || /^\s+$/.test(email)) {
        alert("Favor de escribir el e-Mail");
        document.getElementById("email").focus();
        return false;
    }else if (pass.length == 0 || pass == null || /^\s+$/.test(pass)) {
        alert("Favor de escribir la contraseña");
        document.getElementById("pass").focus();
        return false;
    }else if (telefono.length == 0 || telefono == null || /^\s+$/.test(telefono)) {
        alert("Favor de escribir el telefóno");
        document.getElementById("telefono").focus();
        return false;
    }else if (fecha_nac.length == 0 || fecha_nac == null || /^\s+$/.test(fecha_nac)) {
        alert("Favor de escribir la fecha de nacimiento");
        document.getElementById("fecha_nac").focus();
        return false;
    }else if (rol.length == 0 || rol == null || /^\s+$/.test(rol)) {
        alert("Favor de escoger un rol");
        document.getElementById("rol").focus();
        return false;
    }
    return true;
}