<?php
require_once "conexion.php";
$result ="";

if (isset($_POST['accion'])){//si existe
    $accion_sku = $_POST['accion'];
    $sku = $_POST['sku'];

    if ($accion_sku == 1){// seleccionar
        $sql = "SELECT * FROM producto WHERE producto.sku=".$sku;
        $result = $conn->query($sql);
        $ifexist = $result->rowCount();
        if ($ifexist != 0){
            $id = (int)$_POST['codigo'];
            $talla = (int)$_POST['talla'];
            $color = $_POST['color'];
            $precio_c = (float)$_POST['precio_c'];
            $stock = (int)$_POST['stock'];
            $imagen = "";
            $sqlinsert = "INSERT INTO estilo (codigo_producto, sku, id_talla, color, imagen, stock, precio_costo) 
            VALUE ($id, $sku, $talla, '$color', '$imagen', $stock, $precio_c)";
            $result = $conn->exec($sqlinsert);
            $ruta = '../images/productos/'.$sku.'-'.$id.'/';
            $imagen = $ruta.$_FILES["imagen"]["name"];
            agregar_imagen($sku, $id);
            $sqlup ="UPDATE estilo SET imagen ='".$imagen."' WHERE estilo.codigo_producto=".$id;
            $result = $conn->exec($sqlup);
            guardado();
            $conn = null;
            header("Refresh: 0; URL=../pages/gestionar_articulos.php");
        }else{
            skunull();
        }


    }elseif ($accion_sku == 2){//editar
        //


    }elseif ($accion_sku == 3){//crear
        $categoria = (int)$_POST['categoria'];
        $marca = (int)$_POST['marca'];
        $nombre = $_POST['nombre'];
        $genero = (int)$_POST['genero'];
        $precio_v = (float)$_POST['precio_v'];
        $desc = $_POST['desc'];
        $sqlsku = "INSERT INTO producto (id_marca, id_categoria, id_genero, nombre, descripcion, precio_venta_actual) 
VALUE ($marca, $categoria, $genero, '$nombre', '$desc', $precio_v )";
        $result = $conn->exec($sqlsku);
        $id = (int)$_POST['codigo'];
        $talla = (int)$_POST['talla'];
        $color = $_POST['color'];
        $precio_c = (float)$_POST['precio_c'];
        $stock = (int)$_POST['stock'];
        $imagen = "";
        $sqlinsert = "INSERT INTO estilo (codigo_producto, sku, id_talla, color, imagen, stock, precio_costo) 
            VALUE ($id, $sku, $talla, '$color', '$imagen', $stock, $precio_c)";
        echo $sqlinsert;
        $result = $conn->exec($sqlinsert);
        $ruta = '../images/productos/'.$sku.'-'.$id.'/';
        $imagen = $ruta.$_FILES["imagen"]["name"];
        agregar_imagen($sku, $id);
        $sqlup ="UPDATE estilo SET imagen ='".$imagen."' WHERE estilo.codigo_producto=".$id;
        $result = $conn->exec($sqlup);
        guardado();
        $conn = null;
        header("Refresh: 0; URL=../pages/gestionar_articulos.php");
    }else{
        echo ('No se escogio una acción valida para sku');
    }
}else{
    echo ('No se escogio una acción valida para sku');
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

function skunull(){
    echo '<script>
alert("no existe el sku");
</script>';
}
function guardado(){
    echo '<script>
alert("Se guardo correctamente");
</script>';
}
$conn = null;
?>