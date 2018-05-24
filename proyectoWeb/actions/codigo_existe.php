<?php
require_once "conexion.php";
if($_POST['codigo1']!== ""){
    if (is_numeric($_POST['codigo1'])){
        $id = (int)$_POST['codigo1'];
        if($id >= 1){
            $sql = "SELECT * FROM estilo WHERE codigo_producto = {$id}";
            $result = $conn->query($sql);
            $count = $result->rowCount();
            if ($count > 0) {
                echo "¡El código ya existe!";
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