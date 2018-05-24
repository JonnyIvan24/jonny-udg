<?php
session_start();
require_once "../actions/conexion.php";
if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
    $sql = "SELECT * FROM pedido p 
INNER JOIN detalle_pedido dp ON p.folio_pedido = dp.folio_pedido
INNER JOIN estilo e ON dp.codigo_producto = e.codigo_producto
INNER JOIN talla t ON e.id_talla = t.id_talla
INNER JOIN producto p2 ON e.sku = p2.sku 
INNER JOIN marca m ON p2.id_marca = m.id_marca WHERE p.folio_pedido = {$id}";
    $result = $conn->query($sql);
    $articulos = $result->fetchAll();
    echo '
                        <table class="alt">
                            <thead>
                            <tr>
                                <th>Nombre del articulo</th>
                                <th>Marca</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                            </thead>
                            <tbody>';
    foreach ($articulos as $articulo){
        echo '<tr>
                            <td>'.utf8_encode($articulo['nombre']).'</td>
                            <td>'.utf8_encode($articulo['marca']).'</td>
                            <td>'.utf8_encode($articulo['talla']).'</td>
                            <td>'.utf8_encode($articulo['color']).'</td>
                            <td>'.$articulo['cantidad'].'</td>
                            <td>$'.$articulo['precio_venta'].'</td>
                            </tr>';
    }
    echo "</table>";
    $conn = null;
}else{
    $conn = null;
    header("Location: ../pages/mispedidos.php");
    exit('<script type="text/javascript">
     alert("Inicie sesión");
     </script>');
}