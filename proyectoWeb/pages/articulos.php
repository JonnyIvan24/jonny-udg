<?php
session_start();
require "../actions/verificar_rol_admin.php";
require_once "../actions/conexion.php";
$result = "";
$sql = "SELECT E.*, P.* FROM estilo E INNER JOIN producto P ON E.sku=P.sku";
$stmt = $conn->query($sql);
$usuarios = $stmt->fetchAll();
?>
    <!DOCTYPE html>
    <html lang="es">
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
        <script language="JavaScript">
            function confirm(nombre) {
                return confirm("¿Estas seguro de querer borrar el usuario " + nombre + "?") == true;
            }
        </script>
    </head>
<?php
require "../sections/nav_pages.php";
?>
    <!-- One -->
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Store Caps & Sneakers</p>
                <h2>Articulos</h2>
            </header>
        </div>
    </section>
    <!-- Two -->
    <form method="post" action="#" id="validar_usuario">
        <section id="two" class="wrapper style2">

        </section>
    </form>

    <?php
    require "../sections/footer_pages.php";
    $conn = null;
    ?>
