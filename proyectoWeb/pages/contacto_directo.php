<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Contacto directo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../js/valida_contacto_directo.js"></script>
</head>
<?php
require "../sections/nav_pages.php";
?>

<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Store Caps & Sneakers</p>
            <h2>Contacto directo</h2>
        </header>
    </div>
</section>
<form method="post" action="#" id="validar_contacto" onsubmit="return validar_contacto()">
<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>Formulario</p>
                    <h2>¡Contáctanos!</h2>
                </header>
                <!--formulario-->
                <div class="row uniform">
                   <div class="6u 12u$(xsmall)">
                       <h4 for="nombre">Nombre: <span class="required">*</span> </h4>
                       <input name="nombre" id="nombre" type="text" placeholder="Nombre completo..." size="30"><br>
                   </div>
                <!-- radio -->
                   <div class="12u$">
                       <span><h4>Sexo: <span class="required">*</span> </h4></span>
                       <div class="4u 12u$(small)">
                           <input type="radio" id="masculino" name="sexo" checked>
                           <label for="masculino">Masculino</label>
                           <input type="radio" id="femenino" name="sexo">
                           <label for="femenino">Femenino</label>
                       </div>
                   </div>
                <!-- comobox -->
                   <div class="4u 12u$(small)">
                       <h4>Edad: <span class="required">*</span> </h4>
                       <div class="select-wrapper">
                           <select name="edad" id="edad">
                               <option value="">- Edad -</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option>
                               <option value="13">13</option>
                               <option value="14">14</option>
                               <option value="15">15</option>
                               <option value="16">16</option>
                               <option value="17">17</option>
                               <option value="18">18</option>
                               <option value="19">19</option>
                               <option value="20">20</option>
                               <option value="21">21</option>
                               <option value="22">22</option>
                               <option value="23">23</option>
                               <option value="24">24</option>
                               <option value="25">25</option>
                               <option value="26">26</option>
                               <option value="27">27</option>
                               <option value="28">28</option>
                               <option value="29">29</option>
                               <option value="30">30</option>
                           </select>
                       </div>
                   </div>
                <!-- check box -->
                   <div class="12u$">
                       <span><h4>Noticias: <span class="required">*</span> </h4></span>
                       <input type="checkbox" id="deportes" name="noticias" value="deportes" checked>
                       <label for="deportes">Deportes</label>
                       <input type="checkbox" id="entretenimiento" name="noticias" value="entretenimiento">
                       <label for="entretenimiento">Entretenimiento</label>
                       <input type="checkbox" id="videojuegos" name="noticias" value="videojuegos">
                       <label for="videojuegos">Videojuegos</label>
                       <input type="checkbox" id="cine" name="noticias" value="cine">
                       <label for="cine">Cine</label>
                       <input type="checkbox" id="tecnologia" name="noticias" value="tecnologia">
                       <label for="tecnologia">Tecnología</label>
                       <input type="checkbox" id="seriestv" name="noticias" value="seriestv">
                       <label for="seriestv">Series de TV</label>
                   </div>
                    <!-- submit -->
                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Capturar datos" class="button special" /></li>
                            <li><input type="reset" value="Borrar datos" class="alt" /></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</form>
<?php
require "../sections/footer_pages.php";