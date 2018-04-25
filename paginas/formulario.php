<?php
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];
$genero = $_POST["genero"];
$carrera = $_POST["carrera"];
$semestre = $_POST["semestre"];
$comentarios = $_POST["comentarios"];
$equipo = $_POST["equipo"];
echo "Nombre: ",$nombre;
echo "<br>","Apellido(s): ",$apellidos;
echo "<br>","Sexo: ",$genero;
echo "<br>","Carrera: ",$carrera;
echo "<br>","Semestre: ",$semestre;
echo "<br>","comentarios: ",$comentarios;
echo "<br>","Equipos: ",$equipo;
?>