function acc_sku() {
    var accion = document.getElementsByName("accion");
    //var radio = true;
    if(accion[0].checked) {//opcion de seleccionar
        disable(true);
    }else if (accion[2].checked){//opcion de agregar
        disable(false);
        clear(true);
    } else {//opcion de editar
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
function clear(band) {
    if (band){
        document.getElementById('categoria').value = "";
        document.getElementById('marca').value = "";
        document.getElementById('nombre').value = "";
        document.getElementById('genero').value = "";
        document.getElementById('precio_v').value = "";
        document.getElementById('desc').value = "";
    }
}