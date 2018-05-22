<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_GET['sku'])){
    $sku = (int)$_GET['sku'];
    $sql = "SELECT P.*, M.*, C.*, G.*, E.* FROM producto P INNER JOIN marca M ON P.id_marca = M.id_marca
INNER JOIN categoria C ON P.id_categoria = C.id_categoria INNER JOIN estilo E ON P.sku = E.sku
INNER JOIN genero G ON P.id_genero = G.id_genero WHERE P.sku=".$sku;
    $stmt = $conn->query($sql);
    $totalrows = $stmt->rowCount();
    if ($totalrows <= 0 ){ // si no existe el sku
        $conn = null;
        header("Location: productos.php");
        exit();
    }
    $productos = $stmt->fetchAll();
    $sqlarticulos = "SELECT * FROM producto WHERE producto.sku=".$sku;
    $stmt = $conn->query($sqlarticulos);
    $nombres = $stmt->fetchAll();
    foreach ($nombres as $nombre){}
}else{
    $conn = null;
    header("Location: productos.php");
    exit();
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
            <h2><?php echo utf8_encode($nombre['nombre']); ?></h2>
        </header>
    </div>
</section>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p><b><?php echo utf8_decode($nombre['descripcion'])?></b></p>
                </header><br>
                <div class="gallery">
                    <?php
                    foreach ($productos as $producto){
                        echo ('
                <div>
                    <div class="image fit align-center">
                        <a href="articulos_producto.php?sku='.$producto['sku'].'"><img src="'.$producto['ruta'].$producto['imagen'].'" alt="" width="300" height="300" /></a>
                            <p>
                            <b>'.utf8_decode($producto['nombre']).'</b><br>
                            <b>Precio:</b> $'.$producto['precio_venta_actual'].'<br>
                            <b>Marca:</b> '.utf8_decode($producto['marca']).'<br>
                            <b>Categoría:</b> '.utf8_decode($producto['categoria']).'<br>
                            <b>Genero:</b> '.utf8_decode($producto['genero']).'<br>');
                        if ($producto['stock']<=0){// sin stock
                            echo ('<b></b><br>');
                        }else if ($producto['stock']<=1){// bajo de stock
                            echo('');
                        }
                            echo ('</p>
                            <footer class="align-center">
                                <input class="button special" value="Comprar"');
                        if ($producto['stock']<= 0) {
                            echo 'disabled';
                        }
                        echo ('>
							</footer>
                    </div>
                </div>
                ');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;
?>