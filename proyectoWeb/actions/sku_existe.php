<?php
require_once "conexion.php";
if ($_POST['sku1']!== "") {
    if(is_numeric($_POST['sku1'])){
        $id = (int)$_POST['sku1'];
        if($id >= 1){
            $sql = "SELECT * FROM producto WHERE sku = {$id}";
            $result = $conn->query($sql);
            $count = $result->rowCount();
            if ($count > 0) {
                echo "¡El sku ya existe!";
            }
        }else{
            echo "¡Ingrese solo números enteros!";
        }
    }else{
        echo "¡Inserte solo datos númericos";
    }
}else{
    echo "¡Inserte un dato númerico!";
}