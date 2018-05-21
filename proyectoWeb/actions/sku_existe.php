<?php
require_once "conexion.php";
if($_POST['sku1']!== ""){
    $sql = "SELECT * FROM producto WHERE sku = {$_POST['sku1']}";
    $result = $conn->query($sql);
    $count = $result->rowCount();
    if ($count > 0) {
        echo "¡El sku ya existe!";
    }else{
        echo "";
    }
}