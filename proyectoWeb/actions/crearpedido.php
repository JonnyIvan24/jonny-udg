<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}else{
    $pagina_anterior = "../pages/productos.php";
}

if (isset($_SESSION['id'])){
    require_once "conexion.php";
    $fecha = date("Y/m/d");
    $total = total();
    $sqlpedido = "INSERT INTO pedido (id_usuario, fecha, total, status) 
VALUE ({$_SESSION['id']}, '{$fecha}', {$total}, 1)";//estatus 1 es para pedido en proceso
    //echo $sqlpedido;
    $stm = $conn->exec($sqlpedido);
    $idpedido = $conn->lastInsertId();

    foreach ($_SESSION['cart'] as $item) {///////// llenar la tabla intermedia de muchos a muchos
        $sqldetalle = "INSERT INTO detalle_pedido (folio_pedido, codigo_producto, cantidad, precio_venta) 
VALUE ({$idpedido}, {$item['articulo']['codigo_producto']}, {$item['quantity']}, {$item['articulo']['precio_venta_actual']})";
        //echo $sqldetalle;
        $stm = $conn->exec($sqldetalle);
    }
    $conn = null;
    $_SESSION['cart'] = null;
    $_SESSION['num_art'] = null;
    header("Refresh: 0; URL=../pages/mispedidos.php");
    exit('<script type="text/javascript">
     alert("Compra creada con exito");
     </script>');
}else{
    $conn = null;
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
     alert("Inicie sesión");
     </script>');
}

function total(){
    $suma = 0.0;
    foreach ($_SESSION['cart'] as $item) {
        $suma = $suma+(float)$item['articulo']['precio_venta_actual']*(int)$item['quantity'];
    }
    return $suma;
}