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
if (isset($_POST['rol'])){
    $rol = (int)$_POST['rol'];
}else{
    $rol = 2;
}

$sql = "UPDATE usuario  SET nombre = '".$nombre."', apaterno = '".$apaterno."', amaterno = '".$amaterno."'
, email = '".$email."', pass='".$pass."' , telefono = '".$telefono."', fecha_nac = '".$fecha."', id_rol = ".$rol."
WHERE usuario.id_usuario =".$id;
$stmt = $conn->exec($sql);
$conn = null;
header("Refresh: 0; URL=$pagina_anterior");
echo'<script type="text/javascript">
        alert("Usuario actualizado exitosamente");
        </script>';
die();
?>
