<?php
require_once "conexion.php";
$pagina_anterior = $_SERVER['HTTP_REFERER'];
$stm = "";
if(isset($_GET['sku'])){
    $sku = (int)$_GET['sku'];
    $marca = (int)$_POST['marca'];
    $categoria = (int)$_POST['categoria'];
    $genero = (int)$_POST['genero'];
    $nombre = utf8_decode($_POST['nombre']);
    $desc = utf8_decode($_POST['desc']);
    $precio_v = (float)$_POST['precio_v'];
    $sqlupdate = "UPDATE producto SET id_marca = $marca, id_categoria = $categoria, id_genero = $genero,
nombre = '".$nombre."', descripcion = '".$desc."', precio_venta_actual =".$precio_v." WHERE sku = $sku";
    $stm = $conn->exec($sqlupdate);
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
        alert("Producto actualizado correctamente");
        </script>');
}else{
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
        alert("No se especificó que producto actualizar");
        </script>');
}
