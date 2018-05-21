<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}else{
    $pagina_anterior = "../index.php";
}
require "../actions/verificar_rol_admin.php";
$result = "";
if (isset($_GET['sku'])){//si es enviada por get la variable sku
    $sku =(int)$_GET['sku'];
}else{
    $conn = null;
    header("Location: $pagina_anterior");
    die();
}
if (isset($_GET['id'])){// si es enviada por get la variable id
    if ($_GET['id'] !== null){
        $id = (int)$_GET['id'];
        $sqlarticulo = 'SELECT * FROM estilo WHERE codigo_producto='.$id;
        $result = $conn->query($sqlarticulo);
        $articulos = $result->fetchAll();
        foreach ($articulos as $articulo){}
    }
}
$sqltalla = "SELECT * FROM talla";
$results = $conn->query($sqltalla);
$tallas = $results->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de artículos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../js/valida_articulos.js"></script>
</head>
<?php
require "../sections/nav_pages.php";
?>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>Captura de artículos</p><br>
                    <h2>Artículo</h2>
                </header>
                <form <?php if (isset($articulo)) echo 'action="../actions/actualizar_articulo.php?id='.$id.'"';else echo 'action="../actions/crear_articulo.php?sku='.$sku.'"'; ?>
                      method="post" enctype="multipart/form-data" onsubmit="return validar_articulo();">
                    <!--formulario-->
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                            <h4 for="codigo"><span class="required">*</span> Código:</h4>
                            <input name="codigo" id="codigo" type="text" placeholder="Código del articulo..." size="30"
                            <?php if (isset($articulo)) echo 'value="'.$articulo['codigo_producto'].'"';?> onkeyup="verificar_codigo()">
                            <p><span class="required" id="existe_codigo"></span></p>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="talla"><span class="required">*</span> Talla:</h4>
                            <select name="talla" id="talla">
                                <option value="">Seleccione una talla...</option>
                                <?php
                                foreach ($tallas as $talla){
                                    echo "<option value='{$talla['id_talla']}'";
                                    if (isset($articulo)){
                                        if ($articulo['id_talla'] == $talla['id_talla']){
                                            echo " selected";
                                        }
                                    }
                                    echo (" >".utf8_encode($talla['talla'])."</option>");
                                }
                                ?>
                            </select><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="color"><span class="required">*</span> Color:</h4>
                            <input name="color" id="color" type="text" placeholder="Color..." size="30"
                            <?php if (isset($articulo)) echo 'value="'.$articulo['color'].'"';?>><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="precio_"><span class="required">*</span> precio de compra:</h4>
                            <input name="precio_c" id="precio_c" type="text" placeholder="Precio de compra..." size="30"
                            <?php if (isset($articulo)) echo 'value="'.$articulo['precio_costo'].'"';?>><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="stock">Stock:</h4>
                            <input name="stock" id="stock" type="text" placeholder="Stock..." size="30"
                                <?php if (isset($articulo)) echo 'value="'.$articulo['stock'].'"';?>><br>
                        </div>
                            <?php
                            if (isset($articulo['imagen'])){
                                echo '<div class="12u 12u$(xsmall) align-center">';
                                echo '<img src="'.$articulo['ruta'].$articulo['imagen'].'" width="300" height="300">';
                            }else{
                                echo '<div class="4u 12u$(xsmall)">';
                            }
                            ?>
                            <h4 for="imagen"><span class="required">*</span> Imagen:</h4>
                            <input name="imagen" id="imagen" type="file" placeholder="Imagen..." accept="image/*"><br>
                        </div>
                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Grabar datos" class="button special"/></li>
                                <li><a class="button" href="form_productos.php?sku=<?php echo "{$sku}";?>">Regresar</a></li>
                            </ul>
                            <p><span class="required">*</span> Campos obligatorios</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function verificar_codigo() {
            var codigo = parseInt(document.getElementById("codigo").value);
            if (!isNaN(codigo)){
                $.ajax({
                    data:{
                        "codigo1" : $("#codigo").val()
                    },
                    type: 'post',
                    url: '../actions/codigo_existe.php',
                    success:function (response) {
                        $('#existe_codigo').html(response);
                    }
                });
            }
        }
    </script>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;