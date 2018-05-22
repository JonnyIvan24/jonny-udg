<?php
require_once "php/conexion.php";
$sql = "SELECT * FROM bicicletas";
$result = $conn->query($sql);
$bicicletas = $result->fetchAll();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte general bicicletas</title>
</head>
<body>
<fieldset class="align-center">
    <legend>Reporte general de bicicletas</legend>
    <table class="align-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Material</th>
            <th>Accesorios</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($bicicletas as $bicicleta){
            echo ('<tr>
                            <td>'.$bicicleta['id_bicicleta'].'</td>
                            <td>'.utf8_encode($bicicleta['nombre_bicicleta']).'</td>
                            <td>'.utf8_encode($bicicleta['marca_bicicleta']).'</td>
                            <td>'.utf8_encode($bicicleta['material_bicicleta']).'</td>
                            <td>'.utf8_encode($bicicleta['accesorios_bicicleta']).'</td>
                            <td>
                            <a href="reporte_para_editar_bicicletas.php?id='.$bicicleta['id_bicicleta'].'"><button type="button" class="btn btn-success">Editar</button></a>
                            <a href="php/eliminar_bicicleta.php?id='.$bicicleta['id_bicicleta'].'"><button type="button" class="btn btn-danger" 
                            onclick="return confirm('.$bicicleta['nombre_bicicleta'].')"
                            >Eliminar</button></a>
                            </td>
                        </tr>');
        }
        ?>
        </tbody>
    </table>
    <a href="formulario_examen_prograWeb_2018a.html">Agregar</a>
</fieldset>
</body>
</html>
