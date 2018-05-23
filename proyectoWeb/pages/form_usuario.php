<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina_anterior = $_SERVER['HTTP_REFERER'];
}
require_once "../actions/conexion.php";
if (isset($_GET['id'])){
    if ($_GET['id']!== null){
        $id = (int)$_GET['id'];
        require "../actions/verificar_inicio_sesion.php";
        if ($_SESSION['id'] == $id){
            $id = (int)$_GET['id'];
            $sqlusuario = 'SELECT * FROM usuario WHERE usuario.id_usuario = '.$id;
            $stmt1 = $conn->query($sqlusuario);
            $usuarios = $stmt1->fetchAll();
            foreach ($usuarios as $usuario){}

        }else{
            require "../actions/verificar_rol_admin.php";
            $sqlusuario = 'SELECT * FROM usuario WHERE usuario.id_usuario = '.$id;
            $stmt1 = $conn->query($sqlusuario);
            $usuarios = $stmt1->fetchAll();
            foreach ($usuarios as $usuario){}
        }
    }
}
if (isset($_GET['inciar'])){
    if ($_GET['iniciar'] == 'i'){
        $iniciar = $_GET['iniciar'];
    }
}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script type="text/javascript">
        function verificar_email() {
            //var email = document.getElementById('email').value;
            $.ajax({
                data:{
                    "email" : $("#email").val()
                },
                type: 'post',
                url: '../actions/email_existe.php',
                success:function (response) {
                    $('#existe_email').html(response);
                }
            });
        }
    </script>
    <script src="../js/valida_usuario.js"></script>
    <script src="../js/validacion_usuario_rol.js"></script>
</head>
<?php require "../sections/nav_pages.php"; ?>
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
                <form class="content" method="post"  id="form_usuario"
                    <?php if (isset($usuario)){echo ('action="../actions/actualizar_usuario.php?id='.$usuario['id_usuario'].'" onsubmit="return validar_usuario();"');
                    }else if($_SESSION['rol']==2){echo 'action="../actions/actualizar_usuario.php?id='.$usuario['id_usuario'].'" onsubmit="return validar_usuario_rol();"';
                    } else if (isset($iniciar)){echo ('action="../actions/agregar_iniciar_usuario.php" onsubmit="return validar_usuario();"');
                    }else{echo ('action="../actions/agregar_usuario.php" onsubmit="return validar_usuario_rol();"');}
                    ?>>
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
                                <h4 for="nombre"><span class="required">*</span>Nombre:</h4>
                                <input name="nombre" id="nombre" type="text" placeholder="Nombre(s)..." size="50" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['nombre']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="apaterno"><span class="required">*</span>Apellido paterno:</h4>
                                <input name="apaterno" id="apaterno" type="text" placeholder="Apellido paterno..." size="15" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['apaterno']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="amaterno"><span class="required">*</span>Apellido materno:</h4>
                                <input name="amaterno" id="amaterno" type="text" placeholder="Apellido materno..." size="15" value="<?php if (isset($usuario)){ echo utf8_encode($usuario['amaterno']);} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="email"><span class="required">*</span>e-Mail:</h4>
                                <input class="form-control" aria-describedby="emailHelp" name="email" id="email" type="email" placeholder="nombre@email.com..." size="60" value="<?php if (isset($usuario)){ echo $usuario['email'];} ?>" onkeyup="verificar_email()">
                                <p><span id="existe_email" class="required"></span></p>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="pass"><span class="required">*</span>Contraseña:</h4>
                                <input name="pass" id="pass1" type="password" placeholder="Contraseña..." size="15"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="telefono">Telefóno: <span class="required">*</span> </h4>
                                <input name="telefono" id="telefono" type="text" placeholder="Telefóno..." size="12" value="<?php if (isset($usuario)){ echo $usuario['telefono'];} ?>"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="Fecha de nacimiento"><span class="required">*</span>Fecha:</h4>
                                <input name="fecha_nac" id="fecha_nac" type="date" data-provide="datepicker" placeholder="Fecha de nacimiento..." value="<?php if (isset($usuario)){ echo $usuario['fecha_nac'];} ?>"><br>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['rol']) && $_SESSION['rol']==2) {
                            echo('<div class="4u 12u$(small)">
                            <h4><span class="required">*</span>Rol:</h4>
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
                                <?php
                                if (isset($iniciar)){
                                    echo ('<li><input type="submit" value="Registrarse e iniciar sesión" class="button special" /></li>');
                                }else{
                                    echo ('<li><input type="submit" value="Guardar" class="button special" /></li>');
                                }
                                ?>
                                <li><input type="reset" value="Borrar datos" class="alt" /></li>
                                <li><a class="button" href="usuarios.php">Regresar</a></li>
                            </ul>
                        </div>
                        <p><span class="required">*</span> Campos obligatorios</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
require "../sections/footer_pages.php";
$conn = null;
?>