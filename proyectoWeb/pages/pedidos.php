<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}else{
    $pagina_anterior = "../index.php";
}
if (!isset($_SESSION['id'])){
    $conn = null;
    header("Refresh: 0; URL=../index.php");
    exit('<script type="text/javascript">
     alert("Inicie sesión");
     </script>');
}
require_once "../actions/conexion.php";
$sqlpedido = "SELECT * FROM pedido p2 INNER JOIN usuario u ON p2.id_usuario = u.id_usuario";
$result = $conn->query($sqlpedido);
$pedidos = $result->fetchAll();
$totalpedidos = $result->rowCount();
?>
    <!DOCTYPE html>
    <html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Pedidos</title>
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
            <h2>Gestión de pedidos</h2>
        </header>
    </div>
</section>
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <?php
                    if ($totalpedidos<=0){
                        echo "<p><b><span class='required'>No tienes compras</span></b></p><br><br>";
                    }
                    ?>
                </header>
                <!--tabla-->
                <div class="row uniform">
                    <div class="table-wrapper 6u 12u$(xsmall)">
                        <table>
                            <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciónes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pedidos as $pedido) {if($pedido['status']== 1){
                                $status = "En Proceso";
                            }else if($pedido['status']== 0){
                                $status = "Cancelada";
                            }else if($pedido['status']== 2){
                                $status = "Pagada";
                            }else if($pedido['status']== 3) {
                                $status = "Completada";
                            }else {
                                $status = "No definido";
                            }
                                echo '<tr>
                                <td>' . $pedido['folio_pedido'] . '</td>
                                <td>' . date("d/m/y", strtotime( $pedido['fecha'])). '</td>
                                <td>' . utf8_encode($pedido['nombre'] ." ". $pedido ['apaterno']) . '</td>
                                <td>$ ' . $pedido['total'] . '</td>
                                <td>' . $status . '</td>
                                <td><button type="button" class="btn btn-info" onclick="mostrar_detalles('.$pedido['folio_pedido'].')">Detalles</button>';
                                if ($pedido['status']!=0 && $pedido['status']!= 2){
                                    echo '<a href="../actions/cancelar_pedido.php?id='.$pedido['folio_pedido'].'"><button type="button" class="btn btn-danger" 
                            onclick="return cancelarmipedido('.$pedido['folio_pedido'].');"
                            >Cancelar</button></a>
                                </td>
                            </tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-wrapper 6u 12u$(xsmall)" id="detalles">
                    </div>
                </div>
                <div class="row uniform">
                    <header class="align-center">
                        <br><a href="<?php echo $pagina_anterior;?>"><button type="button" class="button special big">Regresar</button></a>
                    </header>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function mostrar_detalles(pedido) {
                var id = parseInt(pedido);
                if (!isNaN(id)){
                    $.ajax({
                        data:{
                            "id" : id
                        },
                        type: 'post',
                        url: '../actions/detalles_pedido.php',
                        success:function (response) {
                            $('#detalles').html(response);
                        }
                    });
                }
            }
        </script>
</section>
<?php
require "../sections/footer_pages.php";
$conn = null;
?>