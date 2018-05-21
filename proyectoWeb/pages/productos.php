<?php
session_start();
require "../actions/verificar_rol_admin.php";
require_once "../actions/conexion.php";
$result = "";
$sql = "SELECT P.*, E.* FROM producto P INNER JOIN estilo E ON P.sku = E.sku";
$stmt = $conn->query($sql);
$totalrows = $stmt->rowCount();
$productos = $stmt->fetchAll();
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
            <h2>Productos</h2>
        </header>
    </div>
</section>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <div class="gallery">
                    <?php
                    foreach ($productos as $producto){
                        echo ('
                <div>
                    <div class="image fit">
                        <a href="#"><img src="'.$producto['ruta'].$producto['imagen'].'" alt="" width="300" height="300" /></a>
                            <p class="align-center">
                            <span>'.$producto['nombre'].'</span><br>
                            <span>Precio: $'.$producto['precio_venta_actual'].'</span>
                            </p>
                            <footer class="align-center">
								<a href="#" target="_blank" class="button alt">Más detalles</a>
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