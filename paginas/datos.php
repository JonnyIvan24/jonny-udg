<?php
/**
 * Created by PhpStorm.
 * User: Jonny
 * Date: 27/11/2017
 * Time: 08:08 PM
 */
$comprador = $_POST["comprador"];
$tipo = $_POST["tipo"];
$marca = $_POST["marca"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$year = $_POST["year"];
$accesorios = $_POST["accesorios"];
$observaciones = $_POST["observaciones"];
echo "Nombre: ",$comprador;
echo "<br>","Tipo: ",$tipo;
echo "<br>","Marca: ",$marca;
echo "<br>","Fecha: ",$dia,"/",$mes,"/",$year;
echo "<br>","Accesorios: ",$accesorios;
echo "<br>","Observaciones: ",$observaciones;
?>