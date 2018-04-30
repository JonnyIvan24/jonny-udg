<?php
if(!isset($_SESSION['loggedin'])){
    header("Location: ../index.php");
    die();
}else if (isset($_SESSION['loggedin'])){
    if (!$_SESSION['loggedin']){
        header("Location: ../index.php");
        die();
    }
}