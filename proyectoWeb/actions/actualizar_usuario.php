<?php
require_once "conexion.php";
$pagina_anterior = $_SERVER['HTTP_REFERER'];
$result = "";
$id = (int)$_GET['id'];
$nombre = utf8_decode($_POST['nombre']);
$apaterno = utf8_decode($_POST['apaterno']);
$amaterno = utf8_decode($_POST['amaterno']);
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha_nac'];
$rol = (int)$_POST['rol'];
$sql = "UPDATE usuario  SET nombre = '".$nombre."', apaterno = '".$apaterno."', amaterno = '".$amaterno."'
, email = '".$email."', pass='".$pass."' , telefono = '".$telefono."', fecha_nac = '".$fecha."', id_rol = ".$rol."
WHERE usuario.id_usuario =".$id;
$stmt = $conn->exec($sql);
echo'<script type="text/javascript">
        alert("Usuario actualizado exitosamente");
        </script>';
header("Refresh: 0; URL=$pagina_anterior");
?>
