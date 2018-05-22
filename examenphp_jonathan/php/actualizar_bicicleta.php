<?php
require_once "conexion.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $nombre = $_POST['txtBici'];
    $marca = $_POST['combo_marca'];
    $material = $_POST['txtMaterial'];
    $accesorios = $_POST['txtAccesorios'];
    $sqlup = "UPDATE bicicletas SET nombre_bicicleta = '".$nombre."', marca_bicicleta = '".$marca."', 
    material_bicicleta = '".$material."', accesorios_bicicleta = '".$accesorios."' WHERE bicicletas.id_bicicleta = ".$id;
    //echo $sqlup;
    $result = $conn->query($sqlup);
    $conn = null;
    header("Refresh: 0; URL=../reporte_general_bicicletas.php");
    exit('<script>
alert("Se guardo correctamente");
</script>');
}else{
    header("Refresh: 0; URL=../reporte_general_bicicletas.php");
    exit();
}