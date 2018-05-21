<?php
require_once "conexion.php";
if($_POST['codigo1']!== ""){
    $sql = "SELECT * FROM estilo WHERE codigo_producto = {$_POST['codigo1']}";
    $result = $conn->query($sql);
    $count = $result->rowCount();
    if ($count > 0) {
        echo "¡El código ya existe!";
    }else{
        echo "";
    }
}else{
    echo "";
}