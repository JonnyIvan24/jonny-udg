<?php
require_once "conexion.php";
$stm = "";
$nombre = $_POST['txtBici'];
$marca = $_POST['combo_marca'];
$material = $_POST['txtMaterial'];
$accesorios = $_POST['txtAccesorios'];

$sqlinsert = "INSERT INTO bicicletas (nombre_bicicleta, marca_bicicleta, material_bicicleta, accesorios_bicicleta) 
VALUE ('$nombre', '$marca', '$material', '$accesorios')";
$stm = $conn->exec($sqlinsert);
$conn = null;
header("Refresh: 0; URL=../reporte_general_bicicletas.php");
exit('<script>
alert("Se guardo correctamente");
</script>');