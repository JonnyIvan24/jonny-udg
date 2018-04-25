function validar() {
    var comprador = document.getElementById("comprador").value;
    var dia = document.getElementById("dia").selectedIndex;
    var mes = document.getElementById("mes").selectedIndex;
    var year = document.getElementById("year").selectedIndex;
    var tipo = document.getElementById("tipo").selectedIndex;
    var marca = document.getElementsByName("marca");
    var accesorios = document.getElementsByName("accesorios");
    var observaciones = document.getElementById("observaciones").value;
    var radio = true;
    var check = true;
    var filter6=/^[A-Za-z_\-\.\s\xF1\xD1]+$/;
    var letras = false;
    for(var i=0; i < marca.length; i++) {
        if(marca[i].checked) {
            radio = false;
            break;
        }
    }
    for(var i=0; i < accesorios.length; i++) {
        if(accesorios[i].checked) {
            check = false;
            break;
        }
    }
    if (filter6.test(document.getElementById("comprador").value)) {
        letras = false;
    }else{
        letras = true;
    }

    if (comprador.length == 0 || comprador == null || /^\s+$/.test(comprador)) {
        alert("Favor de escribir el nombre del comprador");
        document.getElementById("nombre").focus();
        return false;
    }else if (letras) {
        alert("Favor de escribir solo letras");
        //document.getElementById("nombre").focus();
        return false;
    }else if(tipo == 0 || tipo == null){
        alert("por favor seleccione una tipo de moto");
        return false;
    }else  if(radio){
        alert("por favor selecione una marca");
        return false;
    }else if (dia == 0 || dia == null){
        alert("por favor selecione el dia");
        return false;
    }else if (mes == 0 || mes == null){
        alert("por favor selecione el mes");
        return false;
    }else if (year == 0 || year == null){
        alert("por favor selecione el año");
        return false;
    }else if(check){
        alert("por favor selecione un accesorio");
        return false;
    }else if (observaciones == null || observaciones.length == 0 || /^\s+$/.test(observaciones)){
        alert("Favor de escribir alguna observacion");
        //document.getElementById("observaciones").focus();
        return false;
    }
    return true;
}