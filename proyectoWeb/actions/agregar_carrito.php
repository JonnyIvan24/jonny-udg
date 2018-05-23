<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
    if (!isset($_SESSION['num_art'])){//si no esta seteado
        $_SESSION['num_art']=0;
    }
    if(isset($_SESSION['cart'][$id])){//si el articulo ya existe en el carrito
        $_SESSION['cart'][$id]['quantity']++;// se incrementa la cantidad del articulo
        $_SESSION['num_art']++;// se incrementa la cantidad de los articulos
        $numero = "(".$_SESSION['num_art'].")";
        echo $numero;
    }else{// se agrega un articulo nuevo al carrito
        $sql = "SELECT * FROM estilo WHERE estilo.codigo_producto = {$id}";
        $result = $conn->query($sql);
        $total_rows = $result->rowCount();
        if ($total_rows >= 0){// si encuentra el articulo
            $_SESSION['num_art']++;// se incrementa la cantidad de los articulos
            $_SESSION['cart'][$id]=array(
                "id"=> $id,
                "quantity" => 1
            );
            $numero = "(".$_SESSION['num_art'].")";
            echo $numero;
        }else{// si no encuentra el articulo
            $conn = null;
            header("Location: ../pages/productos.php");
            exit();
        }
    }
}else{
    $conn = null;
    header("Location: ../pages/productos.php");
    exit();
}