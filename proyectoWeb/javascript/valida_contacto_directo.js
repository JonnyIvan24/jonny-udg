function validar_contacto() {
    var nombre = document.getElementById("nombre").value;
    var sexo = document.getElementsByName("sexo");
    var edad = document.getElementById("edad").selectedIndex;
    var noticias = document.getElementsByName("noticias");
    var radio = true;
    var check = true;
    var filter6=/^[A-Za-z_\-\.\s\xF1\xD1]+$/;
    var letras = false;
    for(var i=0; i < sexo.length; i++) {
        if(sexo[i].checked) {
            radio = false;
            break;
        }
    }
    for(var i=0; i < noticias.length; i++) {
        if(noticias[i].checked) {
            check = false;
            break;
        }
    }
    if (filter6.test(document.getElementById("nombre").value)) {
        letras = false;
    }else{
        letras = true;
    }

    if (nombre.length == 0 || nombre == null || /^\s+$/.test(nombre)) {
        alert("Favor de escribir tu nombre");
        document.getElementById("nombre").focus();
        return false;
    }else if (letras) {
        alert("Favor de escribir solo letras y sin acentos");
        document.getElementById("nombre").focus();
        return false;
    }else  if(radio){
        alert("por favor selecione el sexo");
        return false;
    }else if (edad == 0 || edad == null){
        alert("por favor selecione que edad tiene");
        document.getElementById("edad").focus();
        return false;
    }else if(check){
        alert("por favor selecione una noticia");
        return false;
    }
    return true;
}