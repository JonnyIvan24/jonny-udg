<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}
require "../actions/verificar_rol_admin.php";
$result = "";

if (isset($_GET['sku'])){
    if ($_GET['sku'] !== null){
        $id = (int)$_GET['sku'];
        $sqlsku = 'SELECT * FROM producto WHERE sku='.$id;
        $result = $conn->query($sqlsku);
        $productos = $result->fetchAll();
        foreach ($productos as $producto){}
        $sqlestilo = 'SELECT * FROM estilo INNER JOIN talla ON estilo.id_talla = talla.id_talla WHERE sku='.$id;
        $result = $conn->query($sqlestilo);
        $estilos = $result->fetchAll();
        $total_filas = $result->rowCount();
    }
}

$sqlmarca = "SELECT * FROM marca";
$result = $conn->query($sqlmarca);
$marcas = $result->fetchAll();
$sqlcategoria = "SELECT * FROM categoria";
$result = $conn->query($sqlcategoria);
$categorias = $result->fetchAll();
$sqlgenero = "SELECT * FROM genero";
$result = $conn->query($sqlgenero);
$generos = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de artículos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>

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
                    <p>Captura de productos</p><br>
                    <h2>Producto "SKU"</h2>
                </header>
                <form <?php if (isset($producto))
                    echo 'action="../actions/actualizar_producto.php?sku='.$producto['sku'].'"' ; else
                        echo 'action="../actions/crear_producto.php"';
                    ?> method="post" enctype="multipart/form-data">
                    <!--formulario-->
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                            <h4 for="sku"><span class="required">*</span> SKU:</h4>
                            <input name="sku" id="sku" type="text" placeholder="SKU..." size="30"
                                <?php if (isset($producto)) echo 'disabled value="'.$producto['sku'].'"';?> onkeyup="verificar_sku()">
                            <p><span id="existe_sku" class="required"></span></p>
                            <br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="categoria"><span class="required">*</span> Categoría:</h4>
                            <select name="categoria" id="categoria">
                                <option value="">Seleccione una categoría...</option>
                                <?php
                                foreach ($categorias as $categoria){
                                    echo "<option value='{$categoria['id_categoria']}'";
                                    if (isset($producto)){
                                        if ($producto['id_categoria'] == $categoria['id_categoria']){
                                            echo " selected";
                                        }
                                    }
                                    echo ">".$categoria['categoria']."</option>";
                                }
                                ?>
                            </select><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="marca"><span class="required">*</span> Marca:</h4>
                            <select name="marca" id="marca">
                                <option value="">Seleccione una marca...</option>
                                <?php
                                foreach ($marcas as $marca){
                                    echo "<option value='{$marca['id_marca']}'";
                                    if (isset($producto)){
                                        if ($producto['id_marca'] == $marca['id_marca']){
                                            echo " selected";
                                        }
                                    }
                                    echo ">".$marca['marca']."</option>";
                                }
                                ?>
                            </select><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="nombre"><span class="required">*</span> Nombre:</h4>
                            <input name="nombre" id="nombre" type="text" placeholder="Nombre..."
                                <?php if (isset($producto)) echo 'value="'.$producto['nombre'].'"';?>><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="genero"><span class="required">*</span> Genero:</h4>
                            <select name="genero" id="genero">
                                <option value="">Seleccione un genero...</option>
                                <?php
                                foreach ($generos as $genero){
                                    echo "<option value='{$genero['id_genero']}'";
                                    if (isset($producto)){
                                        if ($producto['id_genero'] == $genero['id_genero']){
                                            echo " selected";
                                        }
                                    }
                                    echo ">".utf8_encode($genero['genero'])."</option>";
                                }
                                ?>
                            </select><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="preciov"><span class="required">*</span> Precio de venta:</h4>
                            <input name="precio_v" id="precio_v" type="text" placeholder="Precio de venta..."
                                <?php if (isset($producto)) echo 'value="'.$producto['precio_venta_actual'].'"';?>><br>
                        </div>
                        <div class="12u 12u$(xsmall)">
                            <h4 for="desc"><span class="required">*</span> Descripción:</h4>
                            <textarea name="desc" id="desc"  placeholder="Descripción..."><?php if (isset($producto)) echo $producto['descripcion'];?></textarea><br><br>
                        </div>
                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Grabar datos" class="button special" /></li>
                                <li><a class="button" href="gestionar_articulos.php">Regresar</a></li>
                            </ul>
                            <p><span class="required">*</span> Campos obligatorios</p>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($total_filas)){
                    echo "<header class=\"align-center\">
                    <p>Artículos ligados al producto</p>
                    <h2>".$producto['nombre']."</h2>
                </header><br>
                <div class=\"table-wrapper\">
                    <table>
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Stock</th>
                            <th>Costo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>";
                    foreach ($estilos as $estilo){
                        $codigo = $estilo['codigo_producto'];
                        echo ('<tr>
                                <td>'.$codigo.'</td>
                                <td>'.$estilo['talla'].'</td>
                                <td>'.$estilo['color'].'</td>
                                <td>'.$estilo['stock'].'</td>
                                <td>$ '.$estilo['precio_costo'].'</td>
                                <td>
                                <button type="button" class="btn btn-info">Detalles</button>
                                <a href="form_articulo.php?sku='.$producto['sku'].'&id='.$estilo['codigo_producto'].'"><button type="button" class="btn btn-success">Editar</button></a>
                                <a href="../actions/eliminar_articulo.php?id='.$estilo['codigo_producto'].'"><button type="button" class="btn btn-danger" 
                                onclick="return confirm1('.$estilo['codigo_producto'].');"
                                >Eliminar</button></a>
                                </td>
                            </tr>');
                    }
                    echo "</tbody>
                    </table>
                    <header class=\"align-center\">";
                    if ($total_filas == 0) {
                        echo'<h3>No hay artículos</h3>';
                    }
                    echo '<a href="form_articulo.php?sku='.$producto['sku'].'" class="button special big">Agregar</a>
                    </header>';

                }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function verificar_sku() {
            var sku = parseInt(document.getElementById("sku").value);
            if (!isNaN(sku)){
                $.ajax({
                    data:{
                        "sku1" : $("#sku").val()
                    },
                    type: 'post',
                    url: '../actions/sku_existe.php',
                    success:function (response) {
                        $('#existe_sku').html(response);
                    }
                });
            }
        }
    </script>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;