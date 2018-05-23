<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
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
// tratar de manera diferente desde el archivo agregar_carrito.php
foreach ($_SESSION['cart'] as $item){
    echo json_encode($item['id']);
    $sqlcarrito = "SELECT P.*, M.*, C.*, G.*, E.*, T.* FROM producto P INNER JOIN marca M ON P.id_marca = M.id_marca
INNER JOIN categoria C ON P.id_categoria = C.id_categoria INNER JOIN estilo E ON P.sku = E.sku
INNER JOIN genero G ON P.id_genero = G.id_genero INNER JOIN talla T ON E.id_talla = T.id_talla WHERE P.sku={$item['id']}";
    $result = $conn->query($sqlcarrito);
    $p = $result->fetchAll();
    $productos[$item['id']] = array(
        "articulo" => $p
    );
}
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
            <div class="content">
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

                                echo json_encode($producto['articulo']['sku']);
                            }
                        ?>
                        </tbody>
                    </table>
                    <header class="align-center">
                        <?php


                        ?>
                        <a href="form_productos.php" class="button special big">Agregar</a>
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