<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}
require "../actions/verificar_rol_admin.php";
$result = "";
$sql = 'SELECT P.sku, P.nombre, P.precio_venta_actual, m.marca, c2.categoria, g.genero
FROM producto P INNER JOIN marca m ON P.id_marca = m.id_marca INNER JOIN categoria c2 ON P.id_categoria = c2.id_categoria INNER JOIN genero g ON P.id_genero = g.id_genero';
$stmt = $conn->query($sql);
$total_filas = $stmt->rowCount();
$productos = $stmt->fetchAll();

?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../js/valida_usuario.js"></script>
    <script id="conf">
        function confirm1(nombre) {
            return confirm("¿Estas seguro de querer borrar el articulo " + nombre + "?") == true;
        }
    </script>
</head>
<?php
require "../sections/nav_pages.php";
?>

<form method="post" action="#" id="validar_usuario">
    <section id="two" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <header class="align-center">
                        <p>Gestión de</p>
                        <h2>Productos</h2>
                    </header>
                    <!--tabla-->
                    <div class="table-wrapper">
                        <table>
                            <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Categoria</th>
                                <th>Género</th>
                                <th>Precio Venta</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($productos as $producto){
                                echo '<tr>
                            <td>'.$producto['sku'].'</td>
                            <td>'.utf8_encode($producto['nombre']).'</td>
                            <td>'.$producto['marca'].'</td>
                            <td>'.$producto['categoria'].'</td>
                            <td>'.$producto['genero'].'</td>
                            <td>$'.$producto['precio_venta_actual'].'</td>
                            <td>
                            <button type="button" class="btn btn-info">Detalles</button>
                            <a href="form_productos.php?sku='.$producto['sku'].'"><button type="button" class="btn btn-success">Editar</button></a>
                            <a href="../actions/eliminar_productos.php?sku='.$producto['sku'].'"><button type="button" class="btn btn-danger" 
                            onclick="return confirm1('.$producto['sku'].');"
                            >Eliminar</button></a>
                            </td>
                        </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <header class="align-center">
                            <?php

                                if ($total_filas == 0) {
                                    echo('<h3>No hay productos</h3>');
                                }

                            ?>
                            <a href="form_productos.php" class="button special big">Agregar</a>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php
require "../sections/footer_pages.php";
$conn = null;
?>