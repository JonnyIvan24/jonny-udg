<?php
require_once "conexion.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqldelete = "DELETE FROM bicicletas WHERE bicicletas.id_bicicleta=".$id;
    $stmt = $conn->exec($sqldelete);
    $conn = null;
    header("Refresh: 0; URL=../reporte_general_bicicletas.php");
    exit('<script type="text/javascript">
        alert("Bicicleta eliminada exitosamente");
        </script>');
}else{
    header("Refresh: 0; URL=../reporte_general_bicicletas.php");
    exit();
}