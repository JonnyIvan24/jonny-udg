function validar_articulo() {
    var idarticulo = document.getElementById("idarticulo").value;
    var articulo = document.getElementById("articulo").value;
    var precio = document.getElementById("precio").value;
    var numero = parseInt(document.getElementById("precio").value);
    var marca = document.getElementById("marca").value;

    if (idarticulo.length == 0 || idarticulo == null || /^\s+$/.test(idarticulo)) {
        alert("Favor de escribir el ID del articulo");
        document.getElementById("idarticulo").focus();
        return false;
    }else if (articulo.length == 0 || articulo == null || /^\s+$/.test(articulo)) {
        alert("Favor de escribir el nombre del articulo");
        document.getElementById("articulo").focus();
        return false;
    }else if (precio.length == 0 || precio == null || /^\s+$/.test(precio)) {
        alert("Favor de escribir el precio del articulo");
        document.getElementById("precio").focus();
        return false;
    }else if(isNaN(numero)){
        alert("Favor de escribir solo números");
        document.getElementById("precio").focus();
        return false;
    }else if (marca.length == 0 || marca == null || /^\s+$/.test(marca)) {
        alert("Favor de escribir la marca del articulo");
        document.getElementById("marca").focus();
        return false;
    }
    return true;
}