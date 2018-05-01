<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
require "verificar_rol_admin.php";
if(isset($_GET['id']) && $_GET['id'] !== null){
    $id = (int)$_GET['id'];
    $sqldelete = "DELETE FROM estilo WHERE estilo.codigo_producto=".$id;
    $stmt = $conn->exec($sqldelete);
    $conn = null;
    echo'<script type="text/javascript">
        alert("Artículo eliminado exitosamente");
        </script>';
    header("Refresh: 0; URL=$pagina_anterior");
}else{
    echo'<script type="text/javascript">
        alert("No se específico que artículo borrar");
        </script>';
    header("Refresh: 0; URL=$pagina_anterior");
}
?>