<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
    if(isset($_SESSION['cart'][$id])){//si el articulo ya existe en el carrito
        $_SESSION['cart'][$id]['quantity']++;// se incrementa la cantidad
    }else{// se agrega un articulo nuevo al carrito
        $sql = "SELECT * FROM estilo WHERE estilo.codigo_producto = {$id}";
        $result = $conn->query($sql);
        $total_rows = $result->rowCount();
        if ($total_rows >= 0){// si encuentra el articulo
            $_SESSION['cart'][$result];///////////////////////////////////7falta
        }else{// si no encuentra el articulo
            $conn = null;
            header("Location: productos.php");
            exit();
        }
    }

    $_SESSION['cart'] = (int)$_POST['id'];

}else{
    $conn = null;
    header("Location: productos.php");
    exit();
}