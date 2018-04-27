<?php
// declaramos las 4 variables para la conexion de la BD
$servername = "localhost";  //----- Servidor donde esta la BD
$username = "root";         //----- Usuario para entrar a la BD
$password = "";      //----- Password para entrar a la BD
$basededatos = "tienda_ropa"; //----- Nombre de la BD
// en un bloque try - catch escribimos la linea de conexion
try{
    //Creamos la variable $conn que usaremos en todo el proyecto web
    $conn = new PDO("mysql:host=$servername;dbname=$basededatos", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //imprimimos en pantalla si pudimos conectar  a la base de datos
    //echo ("<div align='center'><h1>Si se conecto</h1></div>");
} catch (PDOException $e){
    //Imprimimos en pantalla cuando NO se pudo conectar a la BD
    echo ("<div align='center'><h1>No se pudo conectar: </h1></div>" . $e->getMessage());
}
?>