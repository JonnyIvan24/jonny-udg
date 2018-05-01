<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}
require "../actions/verificar_rol_admin.php";
$result = "";

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
                    <h2>SKU</h2>
                </header>
                <form action="" method="post">
                    <!--formulario-->
                    <div class="row uniform">
                        <div class="12u$">
                            <h3>Acciones para SKU:</h3>
                            <input type="radio" id="selec" name="accion" checked>
                            <label for="selec">Seleccionar</label>
                            <input type="radio" id="edit"  name="accion">
                            <label for="edit">Editar</label>
                            <input type="radio" id="add"  name="accion">
                            <label for="add">Agregar</label>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="sku"><span class="required">*</span> SKU:</h4>
                            <input name="sku" id="sku" type="text" placeholder="SKU..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="categoria"><span class="required">*</span> Categoría:</h4>
                            <input name="categoria" id="categoria" type="text" placeholder="Categoría..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="marca"><span class="required">*</span> Marca:</h4>
                            <input name="marca" id="marca" type="text" placeholder="Marca..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="nombre"><span class="required">*</span> Nombre:</h4>
                            <input name="nombre" id="nombre" type="text" placeholder="Nombre..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="genero"><span class="required">*</span> Genero:</h4>
                            <input name="genero" id="genero" type="text" placeholder="Genero..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="precio"><span class="required">*</span> Precio:</h4>
                            <input name="precio" id="precio" type="text" placeholder="Precio..." size="30"><br>
                        </div>
                        <div class="12u 12u$(xsmall)">
                            <h4 for="desc"><span class="required">*</span> Descripción:</h4>
                            <textarea name="desc" id="desc"  placeholder="Descripción..."></textarea><br><br>
                        </div>
                    </div>
                        <header class="align-center">
                            <p> </p>
                            <h2>Artículo</h2>
                        </header>
                    <div class="row uniform">
                        <div class="4u 12u$(xsmall)">
                            <h4 for="codigo"><span class="required">*</span> Código:</h4>
                            <input name="codigo" id="codigo" type="text" placeholder="Código del articulo..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="talla"><span class="required">*</span> Talla:</h4>
                            <input name="talla" id="talla" type="text" placeholder="Talla..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="color"><span class="required">*</span> Color:</h4>
                            <input name="color" id="color" type="text" placeholder="Color..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="precio_"><span class="required">*</span> precio de compra:</h4>
                            <input name="precio_c" id="precio_c" type="text" placeholder="Precio de compra..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="stock">Stock:</h4>
                            <input name="stock" id="stock" type="text" placeholder="Stock..." size="30"><br>
                        </div>
                        <div class="4u 12u$(xsmall)">
                            <h4 for="imagen"><span class="required">*</span> Imagen:</h4>
                            <input name="imagen" id="imagen" type="file" placeholder="Imagen..."><br>
                        </div>
                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Capturar datos" class="button special" /></li>
                                <li><a class="button" href="gestionar_articulos.php">Regresar</a></li>
                            </ul>
                            <p><span class="required">*</span> Campos obligatorios</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;