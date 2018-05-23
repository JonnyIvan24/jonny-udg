<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}else{
    $pagina_anterior = "productos.php";
}
if (!isset($_SESSION['num_art'])){//si no esta seteada la variable cart
    if(isset($pagina_anterior)){
        header("Refresh: 0; URL=$pagina_anterior");
    }else{
        header("Refresh: 0; URL=productos.php");
    }
    exit('<script type="text/javascript">
     alert("No hay articulos en tu carrito de compras");
     </script>');
}else{
    if ($_SESSION['num_art'] <= 0){// si no hay articulos
        if(isset($pagina_anterior)){
            header("Refresh: 0; URL=$pagina_anterior");
        }else{
            header("Refresh: 0; URL=productos.php");
        }
        exit('<script type="text/javascript">
        alert("No hay articulos en tu carrito de compras");
        </script>');
    }
}

require_once "../actions/conexion.php";
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
            <h2>Carrito de compras</h2>
        </header>
    </div>
</section>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <header class="align-center">
                <a href="<?php echo $pagina_anterior; ?>" class="button big">Seguir comprando</a><br>
            </header>
            <div class="content">
                <!--tabla-->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Género</th>
                            <th>Color</th>
                            <th>Precio Venta</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $suma = 0.0;
                        foreach ($_SESSION['cart'] as $item) {
                            $suma = $suma+(float)$item['articulo']['precio_venta_actual']*(int)$item['quantity'];
                            echo '<tr>
                            <td>'.utf8_encode($item['articulo']['nombre']).'</td>
                            <td>'.utf8_encode($item['articulo']['talla']).'</td>
                            <td>'.utf8_encode($item['articulo']['genero']).'</td>
                            <td>'.utf8_encode($item['articulo']['color']).'</td>
                            <td>$ '.$item['articulo']['precio_venta_actual'].'</td>
                            <td>'.$item['quantity'].'</td>
                            <td>$ '.(float)$item['articulo']['precio_venta_actual']*(int)$item['quantity'].'</td>
                                    </tr>';
                        }
                        ?>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="align-right">Total</td>
                                    <td>$<?php echo $suma; ?></td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                    <header class="align-center">
                        <?php


                        ?>
                        <a href="../actions/crearpedido.php" class="button special big">Comprar todo</a>
                    </header>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;
?>