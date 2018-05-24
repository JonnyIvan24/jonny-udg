<?php
require_once "conexion.php";
$pagina_anterior = $_SERVER['HTTP_REFERER'];
if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $id_talla = (int)$_POST['talla'];
    $color = utf8_decode($_POST['color']);
    $stock = (int)$_POST['stock'];
    $precio_c = (float)$_POST['precio_c'];

    $sqlbuscar = "SELECT * FROM estilo WHERE estilo.codigo_producto=".$id;
    $result = $conn->query($sqlbuscar);
    $articulos = $result->fetchAll();
    foreach ($articulos as $articulo){
        $directorio = "../images/productos/".$articulo['sku']."-".$articulo['codigo_producto'];
        $sku = (int)$articulo['sku'];
    }

    if($_FILES['imagen']['name']!== ""){//actualizar con imagen diferente
        //////////////////borrar imagen antigua///////////////
        if (BorrarArchivos($directorio)){
            header("Refresh: 0; URL=$pagina_anterior");
            exit('<script type="text/javascript">
        alert("No se encontro el directorio de las imagenes del artículo a borrar");
        </script>');
        }
        $imagen = $_FILES['imagen']['name'];
        agregar_imagen($sku,$id);
        $sql = "UPDATE estilo SET id_talla=".$id_talla.", color='".$color."', imagen='".$imagen."',
         stock=".$stock.", precio_costo=".$precio_c." WHERE codigo_producto=".$id;
        //echo $sql;
        $stmt = $conn->exec($sql);
        $conn = null;
        header("Refresh: 0; URL =../pages/form_productos.php?sku=".$sku);
        echo ("<script>alert('Articulo actualizado correctamente");
        die();

    }else{////////////////actualizar con la misma imagen///////////////////
        $sql = "UPDATE estilo SET id_talla=".$id_talla.", color='".$color."',
         stock=".$stock.", precio_costo=".$precio_c." WHERE codigo_producto=".$id;
        //echo $sql;
        $stmt = $conn->exec($sql);
        $conn = null;
        header("Refresh: 0; URL =../pages/form_productos.php?sku=".$sku);
        echo ("<script>alert('Articulo actualizado correctamente");
        die();
    }

}else{
    $conn = null;
    header("Refresh: 0; URL ='../pages/gestionar_articulos.php'");
    echo ("<script>alert('No se especificó que articulo se quiere actualizar");
    die();
}

function BorrarArchivos($directorio){
    if(file_exists($directorio)){// verifica si existe el directorio
        $archivos = scandir($directorio); //hace una lista de archivos del directorio
        $num = count($archivos); //los cuenta
        //echo $num;
        //echo $directorio;
        //echo $archivos[3];
//borramos los archivos
        for ($i = 2; $i < $num; $i++) {
            chown($directorio."/".$archivos[$i],465);
            chmod($directorio."/".$archivos[$i],0777);
            unlink($directorio."/".$archivos[$i]);
        }
        return false;
    }else{
        return true;
    }
}

function agregar_imagen($sku, $id){
    if($_FILES["imagen"]["error"]>0){//esta variable es necesaria para guardar algun archivo
        //si hay algun
        echo "Error al cargar archivo";
    }else{// si no hay error al cargar el archivo
        $permitidos = array("image/gif"."image/png"."image/jpg");//tipos de archivos
        $limite_kb = 2000;//tamaño del archivo maximo permitido

        /* primero checar que el archivo cumpla con los requisitos en este ejemplo
        comprobamos el tipo y el tamaño */
        if(in_array($_FILES["imagen"]["type"], $permitidos) || $_FILES["imagen"]
            ["size"]<= $limite_kb * 1024){
            //si cumple primero creamos la ruta
            $ruta = '../images/productos/'.$sku.'-'.$id.'/';
            // y despues lo concatenamos con el nombre
            $archivo = $ruta.$_FILES["imagen"]["name"];
            //echo $ruta;

            if(!file_exists($ruta)){//verificamos la ruta
                mkdir($ruta);// asi creamos la carpeta
            }

            // esta validacion es para validar en caso de que ya exita el archivo
            if(!file_exists($archivo)){
                $result = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
                if($result){
                    return $archivo;
                    //echo ("Imagen guardada");
                }else{
                    //echo ("Imagen no guardada");
                }
            }else{
                //echo("La imagen ya existe");
            }

        }else{//si no cumple mandamos mensaje
            //echo ("Imagen no permitido o accede el tamaño");
            echo '<script>
alert("Imagen no permitido o accede el tamaño");
</script>';
        }
    }
}