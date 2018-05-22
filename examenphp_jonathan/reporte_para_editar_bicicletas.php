<?php
require_once "php/conexion.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM bicicletas WHERE bicicletas.id_bicicleta=" . $id;
    $result = $conn->query($sql);
    $bicicletas = $result->fetchAll();
    foreach ($bicicletas as $bicicleta) {}
    }else{
        header("Location: reporte_general_bicicletas.php");
        exit();
    }
    ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Programacion de Formularios 2018a con PHP y MySQL (Examen) Jonathan</title>
        <style type="text/css">
            #contenedor {
                width: 960px;
                margin: 0 auto;
            }

            #menu {
                width: 18%;
                float: left;
                background-color: #8D8D8D;
                height: 370px;;
            }

            #formulario {
                width: 58%;
                float: left;
                background-color: #CCC;
                margin: 5px;
            }

            #lateral {
                width: 18%;
                float: left;
                background-color: #8D8D8D;
                height: 370px;
            }

        </style>
        <script language="javascript">
            <!--
            //Escribir el código necesario de JavaScript para validar todos los objetos de este
            //formulario web ******************************************************************
            function ValidarForm2018a_PHP() {


            }

            //-->
        </script>
        <script src="js/validar_datos.js"></script>
    </head>
    <body style="background-color:#000000;">
    <div id="contenedor">
        <h2 style="color:#FBFBFB;">Formulario de registro de nuevas bicicletas</h2>
        <div id="menu">Aqui va el menu de navegación</div>
        <div id="formulario" align="left">
            <form method="post" action="php/actualizar_bicicleta.php?id=<?php if(isset($bicicletas)) echo $bicicleta['id_bicicleta'];?>" id="formulario_bicis2018a"
                  onsubmit="return validar_bici();">
                <fieldset>
                    <legend></legend>
                    <legend></legend>
                    <legend></legend>
                    <legend>Datos de la bicicleta a registrar en la agencia:</legend>
                    <p><br/>
                        Nombre de la Bicicleta (Modelo):
                        <input type="text" name="txtBici" id="txtBici" size="40"
                               value="<?php if(isset($bicicletas)) echo $bicicleta['nombre_bicicleta']?>">
                        <br/>
                        <br/>

                        Marca:<!-- Caja de Selección o ComboBox -->
                        <select name="combo_marca" id="combo_marca">
                            <option value="00">-- Selecciona una marca --</option>
                            <option value="Norco">Norco</option>
                            <option value="Turbo">Turbo</option>
                            <option value="Specialized">Specialized</option>
                            <option value="TREK">TREK</option>
                            <option value="Bimex">Bimex</option>
                            <option value="Belfort">Belfort</option>
                            <option value="Generica">Generica</option>
                        </select>

                        <br/>
                        <br/>
                        Tipo de Material: (Escribe si es de aluminio, carbono o acero)<br/>
                        <input type="text" name="txtMaterial" id="txtMaterial" size="40"
                               value="<?php if(isset($bicicletas)) echo $bicicleta['material_bicicleta']?>">
                        <br/>
                        <br/>
                        Escribe los accesorios extra que trae esta bici (Separados por coma): <br/>
                        <input type="text" name="txtAccesorios" id="txtAccesorios" size="40"
                               value="<?php if(isset($bicicletas)) echo $bicicleta['accesorios_bicicleta']?>">
                        <br>
                        <br>
                        <input type="submit" value="   Grabar Datos de la Bici   " id="btn_registrar"/>
                    </p>
                    <p><br>
                    </p>

                </fieldset>
            </form>
        </div>
        <div id="lateral">Aqui va el lateral</div>
    </div>
    </body>
    </html>