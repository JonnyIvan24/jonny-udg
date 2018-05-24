<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
$sqlcancelar = "UPDATE pedido SET status=0 WHERE pedido.folio_pedido=".$_GET['id'];
$stm = $conn->exec($sqlcancelar);
$conn = null;
header("Refresh: 0; URL=$pagina_anterior");
exit('<script type="text/javascript">
     alert("Compra cancelada con exito, despues nos comunicaremos con usted");
     </script>');