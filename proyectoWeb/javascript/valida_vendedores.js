function validar_vendedor() {
    var idvendedor = document.getElementById("idvendedor").value;
    var nombre = document.getElementById("nombre").value;
    var paterno = document.getElementById("paterno").value;
    var materno= document.getElementById("materno").value;
    var dia = document.getElementById("dia").selectedIndex;
    var mes = document.getElementById("mes").selectedIndex;
    var year = document.getElementById("year").selectedIndex;

    var filter6=/^[A-Za-z_\-\.\s\xF1\xD1]+$/;
    var letrasn = false;
    var letrasp = false;
    var letrasm = false;

    if (filter6.test(document.getElementById("nombre").value)) {
        letrasn = false;
    }else{
        letrasn = true;
    }
    if (filter6.test(document.getElementById("paterno").value)) {
        letrasp = false;
    }else{
        letrasp = true;
    }
    if (filter6.test(document.getElementById("materno").value)) {
        letrasm = false;
    }else{
        letrasm = true;
    }

    if (idvendedor.length == 0 || idvendedor == null || /^\s+$/.test(idvendedor)) {
        alert("Favor de escribir un usuario");
        document.getElementById("idvendedor").focus();
        return false;
    }else if (nombre.length == 0 || nombre == null || /^\s+$/.test(nombre)) {
        alert("Favor de escribir el nombre del vendedor");
        document.getElementById("nombre").focus();
        return false;
    }else if (letrasn) {
        alert("Favor de escribir solo letras o sin acentos");
        document.getElementById("nombre").focus();
        return false;
    }else if (paterno.length == 0 || paterno == null || /^\s+$/.test(paterno)) {
        alert("Favor de escribir el apellido paterno del vendedor");
        document.getElementById("paterno").focus();
        return false;
    }else if (letrasp) {
        alert("Favor de escribir solo letras o sin acentos");
        document.getElementById("paterno").focus();
        return false;
    }else if (materno.length == 0 || materno == null || /^\s+$/.test(materno)) {
        alert("Favor de escribir el apellido materno del vendedor");
        document.getElementById("materno").focus();
        return false;
    }else if (letrasm) {
        alert("Favor de escribir solo letras o sin acentos");
        document.getElementById("materno").focus();
        return false;
    }else if (dia == 0 || dia == null){
        alert("por favor seleccione el dia de contratación");
        document.getElementById("dia").focus();
        return false;
    }else if (mes == 0 || mes == null){
        alert("por favor seleccione el mes de contratación");
        document.getElementById("mes").focus();
        return false;
    }else if (year == 0 || year == null){
        alert("por favor seleccione el año de contratación");
        document.getElementById("year").focus();
        return false;
    }
    return true;
}