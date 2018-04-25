<?php
/**
 * Created by PhpStorm.
 * User: Jonny
 * Date: 14/09/2017
 * Time: 09:09 PM
 */
$comprador= $_POST["comprador"];
$tipo = $_POST["tipo"];
$marca = $_POST["marca"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$year = $_POST["year"];
$accesorios = $_POST["accesorios"];
$observaciones = $_POST["observaciones"];
echo "Comprador: ",$comprador;
echo "<br>","Tipo: ",$tipo;
echo "<br>","Marca: ",$marca;
echo "<br>","Fecha: ",$dia;
echo "/",$mes;
echo "/",$year;
echo "<br>","Accesorios: ",$accesorios;
echo "<br>","Observaciones: ",$observaciones;
?>