<?php
session_start();
require_once "conexion.php";
$result = "";
$pagina_anterior = $_SERVER['HTTP_REFERER'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
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
        alert(\"Datos erroneos correo o contraeña incorrectos\");
        </script>');
     header("Refresh: 0; URL=$pagina_anterior");
 }
$conn = null;

?>