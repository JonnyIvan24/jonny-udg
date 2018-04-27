<?php
require_once "../actions/conexion.php";
$result = "";
$sql = 'SELECT * FROM rol';
$stmt = $conn->query($sql);
$rols = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../javascript/valida_usuario.js"></script>
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
                    <h2>Captura de datos</h2>
                </header>
                <!--formulario-->
                <div class="row uniform">
                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="nombre">Nombre: <span class="required">*</span> </h4>
                                <input name="nombre" id="nombre" type="text" placeholder="Nombre(s)..." size="50"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="apaterno">Apellido paterno: <span class="required">*</span> </h4>
                                <input name="apaterno" id="apaterno" type="text" placeholder="Apellido paterno..." size="15"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="giro">Apellido materno: <span class="required">*</span> </h4>
                                <input name="amaterno" id="amaterno" type="text" placeholder="Apellido materno..." size="15"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="rfc">e-Mail: <span class="required">*</span> </h4>
                                <input name="email" id="email" type="email" placeholder="nombre@email.com..." size="50"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="rfc">Contraseña: <span class="required">*</span> </h4>
                                <input name="pass" id="pass" type="password" placeholder="nombre@email.com..." size="15"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="telefono">Telefóno: <span class="required">*</span> </h4>
                                <input name="telefono" id="telefono" type="number" placeholder="Telefóno..." size="12"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="Fecha de nacimiento">e-Mail: <span class="required">*</span> </h4>
                                <input name="fecha_nac" id="fecha_nac" type="date" placeholder="Fecha de nacimiento..."><br>
                            </div>
                        </div>

                        <div class="4u 12u$(small)">
                            <h4>Rol: <span class="required">*</span> </h4>
                            <div class="select-wrapper">
                                <select name="rol" id="rol">
                                    <option value="">Seleccione un rol...</option>
                                    <?php foreach ($rols as $rol){
                                        echo ('<option value="'.$rol['id_rol'].'">'.$rol['rol'].'</option> ');
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Capturar datos" class="button special" /></li>
                                <li><input type="reset" value="Borrar datos" class="alt" /></li>
                            </ul>
                        </div>
                    <p><span class="required">*</span> Campos obligatorios</p>
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
<script src="../javascript/jquery.min.js"></script>
<script src="../javascript/jquery.scrollex.min.js"></script>
<script src="../javascript/skel.min.js"></script>
<script src="../javascript/util.js"></script>
<script src="../javascript/main.js"></script>
</form>
</body>
<?php
$conn = null;
?>
</html>