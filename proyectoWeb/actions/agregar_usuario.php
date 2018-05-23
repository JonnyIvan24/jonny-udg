<?php
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
$result = "";
$nombre = utf8_decode($_POST['nombre']);
$apaterno = utf8_decode($_POST['apaterno']);
$amaterno = utf8_decode($_POST['amaterno']);
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha_nac'];
if(isset($_POST['rol']) && $_POST !== null ){
    $rol = (int)$_POST['rol'];
}else{
    $rol = 1;
}
$sqlbuscar = "SELECT * FROM usuario WHERE email = '{$email}'";
$result = $conn->query($sqlbuscar);
$rowcount = $result->rowCount();
echo $rowcount;
if($rowcount <= 0){
    $sqlinsert = "INSERT INTO usuario (nombre, apaterno, amaterno, email, pass, telefono, fecha_nac, id_rol)
VALUE ('$nombre', '$apaterno', '$amaterno', '$email', '$pass', '$telefono', '$fecha', $rol)";
    $stmt = $conn->exec($sqlinsert);
    $conn = null;
    header("Refresh: 0; URL=../pages/usuarios.php");
    exit('<script type="text/javascript">
        alert("Usuario '.$nombre.' agregado correctamente");
        </script>');
}else{
    $conn = null;
    header("Refresh: 0; URL=$pagina_anterior");
    exit('<script type="text/javascript">
        alert("Ya existe el e-mail");
        </script>');
}
?>