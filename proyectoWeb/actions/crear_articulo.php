<?php
require_once "conexion.php";
$result ="";

if (isset($_GET['sku'])){//crear articulo
    $sku = $_GET['sku'];
    $id = (int)$_POST['codigo'];
    $talla = (int)$_POST['talla'];
    $color = $_POST['color'];
    $precio_c = (float)$_POST['precio_c'];
    $stock = (int)$_POST['stock'];
    $ruta = '../images/productos/'.$sku.'-'.$id.'/';
    $imagen = "";
    $sqlinsert = "INSERT INTO estilo (codigo_producto, sku, id_talla, color, ruta, imagen, stock, precio_costo) 
            VALUE ($id, $sku, $talla, '$color', '$ruta', '$imagen', $stock, $precio_c)";
    $result = $conn->exec($sqlinsert);
    $imagen = $_FILES["imagen"]["name"];
    agregar_imagen($sku, $id);
    $sqlup ="UPDATE estilo SET imagen ='".$imagen."' WHERE estilo.codigo_producto=".$id;
    $result = $conn->exec($sqlup);
    $conn = null;
    header("Refresh: 0; URL=../pages/form_productos.php?sku='$sku'");
    guardado();
    die();
}else{
    header("Refresh: 0; URL=../pages/form_productos.php?sku='$sku'");
    skunull();
    die();
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
?>