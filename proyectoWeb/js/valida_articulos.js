function validar_articulo() {
    var codigo = parseInt(document.getElementById("codigo").value);
    var talla = parseInt(document.getElementById("talla").value);
    var precio = parseFloat(document.getElementById("precio_c").value);
    var color = document.getElementById("color").value;
    var stock = parseInt(document.getElementById("stock").value);

    if (isNaN(codigo)) {
        alert("Favor de escribir el código 'solo números' ");
        document.getElementById("codigo").focus();
        return false;
    }else if (isNaN(talla)) {
        alert("Favor de seleccionar una talla");
        document.getElementById("talla").focus();
        return false;
    }else if (isNaN(precio)) {
        alert("Favor de escribir el precio del articulo");
        document.getElementById("precio_c").focus();
        return false;
    }else if (color.length == 0 || color == null || /^\s+$/.test(color)) {
        alert("Favor de escribir el color");
        document.getElementById("color").focus();
        return false;
    }else if (isNaN(stock)) {
        alert("Favor de escribir el stock, si no hay en stock poner 0");
        document.getElementById("stock").focus();
        return false;
    }
    return true;
}