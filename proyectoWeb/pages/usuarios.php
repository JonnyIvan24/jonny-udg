<?php
$pagina_anterior = $_SERVER['HTTP_REFERER'];
session_start();
if(!isset($_SESSION['rol']) && $_SESSION['rol']!==2){
    header("Refresh: 0; URL=$pagina_anterior");
}
require_once "../actions/conexion.php";
$result = "";
$sql = "SELECT U.*, R.rol FROM usuario U INNER JOIN rol R ON U.id_rol=R.id_rol";
$stmt = $conn->query($sql);
$usuarios = $stmt->fetchAll();
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
    <script language="JavaScript">
        function confirm(nombre) {
            return confirm("¿Estas seguro de querer borrar el usuario " + nombre + "?") == true;
        }
    </script>
</head>
<body class="subpage">
<form method="post" action="#" id="validar_usuario" onsubmit="return validar_usuario()">
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
            <h2>Usuarios</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>Gestión de</p>
                    <h2>Usuarios</h2>
                </header>
                <!--tabla-->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Nombre completo</th>
                            <th>e-Mail</th>
                            <th>Telefóno</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($usuarios as $usuario){
                            $id = $usuario['id_usuario'];
                            echo ('<tr>
                            <td>'.utf8_encode($usuario['nombre'])." ".utf8_encode($usuario['apaterno'])." ".utf8_encode($usuario['amaterno']).'</td>
                            <td>'.$usuario['email'].'</td>
                            <td>'.$usuario['telefono'].'</td>
                            <td>'.$usuario['rol'].'</td>
                            <td>
                            <button type="button" class="btn btn-info">Detalles</button>
                            <a href="form_usuario.php?id='.$usuario['id_usuario'].'"><button type="button" class="btn btn-success">Editar</button></a>
                            <a href="../actions/eliminar_usuario.php?id='.$usuario['id_usuario'].'"><button type="button" class="btn btn-danger" 
                            onclick="return confirm('.$usuario['nombre'].')"
                            >Eliminar</button></a>
                            </td>
                        </tr>');
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td><ul class="actions">
                                    <li><a href="form_usuario.php" class="button alt">Agregar</a></li>
                                </ul></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="icons">
            <li><a href="https://twitter.com/JonnyPeU" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/jonathan.ivan.319" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/jonathanivanu/?hl=es" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <div class="copyright">
        &copy; Untitled. All rights reserved.
        <br>
        <!-- <a href="https://templated.co/" target="_blank"><span>TEMPLATED</span></a></div> -->
    </div>
</footer>

<!-- Scripts -->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.scrollex.min.js"></script>
<script src="../js/skel.min.js"></script>
<script src="../js/util.js"></script>
<script src="../js/main.js"></script>
</form>
</body>
<?php
$conn = null;
?>
</html>