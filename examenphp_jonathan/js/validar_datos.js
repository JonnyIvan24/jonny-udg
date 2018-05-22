function validar_bici() {
    var nombre = document.getElementById('txtBici').value;
    var marca = document.getElementById('combo_marca').value;
    var material = document.getElementById('txtMaterial').value;
    var accesorios = document.getElementById('txtAccesorios').value;

    if (nombre.length == 0 || nombre == null || /^\s+$/.test(nombre)) {
        alert("Favor de escribir el nombre");
        document.getElementById("txtBici").focus();
        return false;
    }else if (marca.length == 0 || marca == null || /^\s+$/.test(marca) || marca == "00"){
        alert("Favor de escojer una marca");
        document.getElementById("combo_marca").focus();
        return false;
    }else if (material.length == 0 || material == null || /^\s+$/.test(material)) {
        alert("Favor de escribir el material de la bici");
        document.getElementById("txtMaterial").focus();
        return false;
    }else if (material.length !== 0 || material == null || /^\s+$/.test(material)) {
        alert("Favor de escribir el material de la bici");
        document.getElementById("txtMaterial").focus();
        return false;
    }else if (accesorios.length == 0 || accesorios == null || /^\s+$/.test(accesorios)) {
        alert("Favor de escribir el(los) accesorio(s)");
        document.getElementById("txtAccesorios").focus();
        return false;
    }else {
        return true;
    }
}