<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
require "verificar_rol_admin.php";
if(isset($_GET['sku'])) {
    $sku = (int)$_GET['sku'];
    $sqlbuscararticulos = "SELECT * FROM estilo WHERE estilo.sku= ".$sku;
    $result = $conn->query($sqlbuscararticulos);
    $articulos = $result->rowCount();
    if ($articulos > 0){// si el producto tiene articulos relacionados
        header("Refresh: 0; URL=../pages/gestionar_articulos.php");
        exit('<script type="text/javascript">
        alert("No se puede borrar el producto por que tiene articulos relacionados con el");
        </script>');
    }else{
        $sqldelete = "DELETE FROM producto WHERE producto.sku=".$sku;
        $stm = $conn->exec($sqldelete);
        header("Refresh: 0; URL=../pages/gestionar_articulos.php");
        exit('<script type="text/javascript">
        alert("Producto eliminado exitosamente");
        </script>');
    }
}
