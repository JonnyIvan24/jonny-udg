<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
require "verificar_rol_admin.php";
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $sqlbuscar = "SELECT * FROM estilo WHERE estilo.codigo_producto=".$id;
    $result = $conn->query($sqlbuscar);
    $articulos = $result->fetchAll();
    foreach ($articulos as $articulo){
        $directorio = "../images/productos/".$articulo['sku']."-".$articulo['codigo_producto'];
    }
    if (BorrarDirectorio($directorio)){
        header("Refresh: 0; URL=$pagina_anterior");
        exit('<script type="text/javascript">
        alert("No se encontro el directorio de las imagenes del artículo a borrar");
        </script>');
    }

    $sqldelete = "DELETE FROM estilo WHERE estilo.codigo_producto=".$id;
    $stmt = $conn->exec($sqldelete);
    $conn = null;
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
        alert("Artículo eliminado exitosamente");
        </script>');
}else{
    $conn = null;
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
        alert("No se específico que artículo borrar");
        </script>');
}

function BorrarDirectorio($directorio){
    if(file_exists($directorio)){// verifica si existe el directorio
        $archivos = scandir($directorio); //hace una lista de archivos del directorio
        $num = count($archivos); //los cuenta
        //echo $num;
        //echo $directorio;
        //echo $archivos[3];
//Los borramos
        for ($i = 2; $i < $num; $i++) {
            chown($directorio."/".$archivos[$i],465);
            chmod($directorio."/".$archivos[$i],0777);
            unlink($directorio."/".$archivos[$i]);
        }
//borramos el directorio
        chown($directorio,465);
        chmod($directorio,0777);
        rmdir($directorio);
        return false;
    }else{
        return true;
    }
}
?>