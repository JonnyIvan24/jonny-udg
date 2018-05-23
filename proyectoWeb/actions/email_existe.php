<?php
require_once "conexion.php";
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $sql = "SELECT * FROM usuario WHERE usuario.email = '{$email}'";
    $result = $conn->query($sql);
    $count = $result->rowCount();
    if ($count > 0) {
        echo "¡Ya existe el e-mail!";
    }
}