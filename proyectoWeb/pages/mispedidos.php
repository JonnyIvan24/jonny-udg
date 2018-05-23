<?php
session_start();
require_once "../actions/conexion.php";
$sqlpedido = "SELECT * FROM pedido p2 ON dp.folio_pedido = p2.folio_pedido
INNER JOIN usuario u ON p2.id_usuario = u.id_usuario WHERE u.id_usuario={$_SESSION['id']}";
echo $sql;
$result = $conn->query($sql);
$pedidos = $result->fetchAll();
$totalpedidos = $result->rowCount();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
</head>
<?php
require "../sections/nav_pages.php";
?>
<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Store Caps & Sneakers</p>
            <h2>Mis pedidos</h2>
        </header>
    </div>
</section>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <!--tabla-->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Articulo</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($pedidos as $pedido){
                            foreach ($productos as $producto){
                                echo '<tr>
                            <td>'.$pedido['folio_pedido'].'</td>
                            <td>'.date("d",$producto['fecha']).'</td>
                            <td>'.$producto['marca'].'</td>
                            <td>'.$producto['categoria'].'</td>
                            <td>'.$producto['genero'].'</td>
                            <td>$'.$producto['precio_venta_actual'].'</td>
                            <td>
                            <button type="button" class="btn btn-info">Detalles</button>
                            <a href="form_productos.php?sku='.$producto['sku'].'"><button type="button" class="btn btn-success">Editar</button></a>
                            <a href="../actions/eliminar_producto.php?sku='.$producto['sku'].'"><button type="button" class="btn btn-danger" 
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


                        ?>
                    </header>
            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;
?>