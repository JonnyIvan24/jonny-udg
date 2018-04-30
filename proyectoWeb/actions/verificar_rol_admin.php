<?php
if(!isset($_SESSION['rol'])){
    header("Location: ../index.php");
    die();
}if (isset($_SESSION['rol'])){
    if ($_SESSION['rol'] !==2){
        header("Location: ../index.php");
        die();
    }
}