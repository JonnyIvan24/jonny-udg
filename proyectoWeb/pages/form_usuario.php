<?php
session_start();
$pagina_anterior = $_SERVER['HTTP_REFERER'];
require_once "../actions/conexion.php";
$result = "";
$sql = 'SELECT * FROM rol';
$stmt = $conn->query($sql);
$rols = $stmt->fetchAll();
if (isset($_GET['id']) && $_GET['id'] !== null){
    $id = (int)$_GET['id'];
    $sqlusuario = 'SELECT * FROM usuario WHERE usuario.id_usuario = '.$id;
    $stmt1 = $conn->query($sqlusuario);
    $usuarios = $stmt1->fetchAll();
    foreach ($usuarios as $usuario){
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../js/valida_usuario.js"></script>
</head>
<body class="subpage">
<form method="post" <?php if (isset($usuario)){echo ('action="../actions/actualizar_usuario.php?id='.$usuario['id_usuario'].'"');}else{echo ('action="../actions/agregar_usuario.php"');} ?> onsubmit="return validar_usuario();" {

}" id="form_usuario" ">
    <!-- Header -->
    <header id="header">
        <div class="logo"><a href="../index.php">Lust Caps & Sneakers <span>by Jonathan</span></a></div>
        <a href="#menu">Menu</a>
    </header>
    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="../pages/quienes.html">Quienes somos</a></li>
            <li><a href="../pages/servicios.html">Nuestros servicios</a></li>
            <li><a href="../pages/ubicacion.html">Ubicación</a></li>
            <li class="desplegar"><a class="formulario" href="#submenu">FORMULARIOS </a>
                <ul class="submenu">
                    <li><a href="../pages/contacto_directo.html">Contacto directo</a></li>
                    <li><a href="../pages/captura_vendedores.html">Capturar vendedores</a> </li>
                    <li><a href="usuarios.php">Capturar clientes</a> </li>
                    <li><a href="../pages/captura_articulos.html">Capturar articulos</a> </li>
                </ul></li>
        </ul>
    </nav>
    <!-- One -->
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Store Caps & Sneakers</p>
                <h2>Usuario</h2>
            </header>
        </div>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <header class="align-center">
                        <p>Formulario</p>
                        <?php
                        if (isset($usuario)){
                            echo ('<h2>Editar datos de '.utf8_encode($usuario['nombre']).'</h2>');
                        }else{
                            echo ('<h2>Captura de datos</h2>');
                        }
                        ?>
                    </header>
                    <!--formulario-->
                    <div class="row uniform">
                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="nombre">Nombre: <span class="required">*</span> </h4>
                                <input name="nombre" id="nombre" type="text" placeholder="Nombre(s)..." size="50" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['nombre']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="apaterno">Apellido paterno: <span class="required">*</span> </h4>
                                <input name="apaterno" id="apaterno" type="text" placeholder="Apellido paterno..." size="15" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['apaterno']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="amaterno">Apellido materno: <span class="required">*</span> </h4>
                                <input name="amaterno" id="amaterno" type="text" placeholder="Apellido materno..." size="15" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['amaterno']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="email">e-Mail: <span class="required">*</span> </h4>
                                <input class="form-control" aria-describedby="emailHelp" name="email" id="email" type="email" placeholder="nombre@email.com..." size="60" value="<?php if (isset($usuario)){ echo $usuario['email'];} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="pass">Contraseña: <span class="required">*</span> </h4>
                                <input name="pass" id="pass" type="password" placeholder="Contraseña..." size="15"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="telefono">Telefóno: <span class="required">*</span> </h4>
                                <input name="telefono" id="telefono" type="number" placeholder="Telefóno..." size="12" value="<?php if (isset($usuario)){ echo $usuario['telefono'];} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="Fecha de nacimiento">Fecha: <span class="required">*</span> </h4>
                                <input name="fecha_nac" id="fecha_nac" type="date" placeholder="Fecha de nacimiento..." value="<?php if (isset($usuario)){ echo $usuario['fecha_nac'];} ?>"><br>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['rol']) && $_SESSION['rol']==2) {
                            echo('<div class="4u 12u$(small)">
                            <h4>Rol: <span class="required">*</span> </h4>
                            <div class="select-wrapper">
                                <select name="rol" id="rol">
                                    <option value="">Seleccione un rol...</option>');
                            foreach ($rols as $rol) {
                                echo('<option value="' . $rol['id_rol'] . '"');
                                if (isset($usuario)) {
                                    if ($usuario['id_rol'] == $rol['id_rol']) {
                                        echo('selected');
                                    }
                                }
                                echo('>' . utf8_encode($rol['rol']) . '</option> ');
                            }
                            echo ('</select>
                            </div>
                        </div>');
                        }
                                    ?>

                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Capturar datos" class="button special" /></li>
                                <li><input type="reset" value="Borrar datos" class="alt" /></li>
                                <li><a class="button" href="<?php echo $pagina_anterior;?>">Regresar</a></li>
                            </ul>
                        </div>
                        <p><span class="required">*</span> Campos obligatorios</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php
require "../secsions/footerindex.php";
$conn = null;
?>