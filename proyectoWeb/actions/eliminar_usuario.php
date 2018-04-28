<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
if(isset($_GET['id']) && $_GET['id'] !== null){
    $id = (int)$_GET['id'];
    $sqldelete = "DELETE FROM usuario WHERE id_usuario=".$id;
    $stmt = $conn->exec($sqldelete);
    $conn = null;
    echo'<script type="text/javascript">
        alert("Usuario eliminado exitosamente");
        </script>';
    header("Refresh: 0; URL=$pagina_anterior");
}else{
    echo'<script type="text/javascript">
        alert("No se específico que usuario borrar");
        </script>';
    header("Refresh: 0; URL=$pagina_anterior");
}
?>