function acc_sku() {
    var accion = document.getElementsByName("accion");
    //var radio = true;
    if(accion[0].checked) {
        disable(true);
    }else {
        disable(false);
    }
}
function disable(band) {
    document.getElementById('categoria').disabled = band;
    document.getElementById('marca').disabled = band;
    document.getElementById('nombre').disabled = band;
    document.getElementById('genero').disabled = band;
    document.getElementById('precio_v').disabled = band;
    document.getElementById('desc').disabled = band;
}