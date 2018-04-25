function validar_cliente() {
    var idcliente = document.getElementById("idcliente").value;
    var domicilio = document.getElementById("domicilio").value;
    var razon = document.getElementById("razon").value;
    var giro = document.getElementById("giro").value;
    var rfc = document.getElementById("rfc").value;

    if (idcliente.length == 0 || idcliente == null || /^\s+$/.test(idcliente)) {
        alert("Favor de escribir el ID del cliente");
        document.getElementById("idcliente").focus();
        return false;
    }else if (domicilio.length == 0 || domicilio == null || /^\s+$/.test(domicilio)) {
        alert("Favor de escribir el domicilio del cliente");
        document.getElementById("domicilio").focus();
        return false;
    }else if (razon.length == 0 || razon == null || /^\s+$/.test(razon)) {
        alert("Favor de escribir la razón social del cliente");
        document.getElementById("razon").focus();
        return false;
    }else if (giro.length == 0 || giro == null || /^\s+$/.test(giro)) {
        alert("Favor de escribir el giro del cliente");
        document.getElementById("giro").focus();
        return false;
    }else if (rfc.length == 0 || rfc == null || /^\s+$/.test(rfc)) {
        alert("Favor de escribir el RFC del cliente");
        document.getElementById("rfc").focus();
        return false;
    }
    return true;
}