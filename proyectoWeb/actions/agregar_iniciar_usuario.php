<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "conexion.php";
$pagina_anterior = $_SERVER['HTTP_REFERER'];
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
$sqlinsert = "INSERT INTO usuario (nombre, apaterno, amaterno, email, pass, telefono, fecha_nac, id_rol)
VALUE ('$nombre', '$apaterno', '$amaterno', '$email', '$pass', '$telefono', '$fecha', $rol)";
$stmt = $conn->exec($sqlinsert);


$sql = "SELECT * FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);

$rows = $result->fetchAll();
foreach ($rows as $row){}
if ($pass == $row['pass']) {
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario'] = $row['nombre'];
    $_SESSION['rol'] = $row['id_rol'];
    $_SESSION['id'] = $row['id_usuario'];
    $_SESSION['start'] = time();
    //$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    echo'<script type="text/javascript">
        alert("Bienvenido '.$_SESSION['usuario'].'");
        </script>';
    header("Refresh: 0; URL=$pagina_anterior");
} else {
    echo('<script type=\"text/javascript\">
        alert(\"Error al crear usuario, por favor revise sus datos\");
        </script>');
    header("Refresh: 0; URL=../pages/form_usuario.php?id=".$row['id_usuario']."");
}
$conn = null;

?>