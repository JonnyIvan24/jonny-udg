<?php
require_once "conexion.php";
$stm ="";

$sku = (int)$_POST['sku'];
$id_marca = (int)$_POST['marca'];
$id_categoria = (int)$_POST['categoria'];
$_nombre = $_POST['nombre'];
$id_genero = (int)$_POST['genero'];
$precio_venta = (float)$_POST['precio_v'];
$descrip = $_POST['desc'];

$sql = "SELECT * FROM producto WHERE sku = {$_POST['sku']}";
$result = $conn->query($sql);
$count = $result->rowCount();
if ($count > 0) {
    header("Refresh: 0; URL=../pages/form_productos.php");
    echo '<script>alert("¡El sku ya existe!");</script>';
}else{
    $sqlinsert = "INSERT INTO producto (sku, id_marca, id_categoria, id_genero, nombre, descripcion, precio_venta_actual) 
VALUE ($sku, $id_marca, $id_categoria, $id_genero, '".$_nombre."', '".$descrip."', $precio_venta)";
    $stm = $conn->exec($sqlinsert);
    $conn = null;
    header("Refresh: 0; URL=../pages/gestionar_articulos.php");
    echo '<script>
alert("Producto creado exitosamente");
</script>';
    die();
}