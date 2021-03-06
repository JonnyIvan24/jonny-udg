<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Captura de vendedores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css"/>
    <script src="../js/valida_vendedores.js"></script>
</head>
<?php
require "../sections/nav_pages.php";
?>
<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Store Caps & Sneakers</p>
            <h2>Vendedores</h2>
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
                    <h2>Captura de vendedores</h2>
                </header>

                <!--formulario-->
                <form method="post" action="#" id="validar_cliente" onsubmit="return validar_vendedor()">
                    <div class="row uniform">
                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="idvendedor">Usuario(ID): <span class="required">*</span> </h4>
                                <input name="idvendedor" id="idvendedor" type="text" placeholder="Usuario..." size="30"><br>
                            </div>
                        </div>
                        <div class="12u$">
                            <div class="4u 12u$(small)">
                                <h4 for="nombre">Nombre: <span class="required">*</span> </h4>
                                <input name="nombre" id="nombre" type="text" placeholder="Nombre(s)..." size="30"><br>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="6u 12u$(xsmall)">
                                <div class="row uniform">
                                    <div class="4u 12u$(small)">
                                        <h4 for="paterno">Apellido paterno: <span class="required">*</span> </h4>
                                        <input name="paterno" id="paterno" type="text" placeholder="Apellido paterno..." size="30"><br>
                                    </div>
                                    <div class="4u 12u$(small)">
                                        <h4 for="materno">Apellido materno: <span class="required">*</span> </h4>
                                        <input name="materno" id="materno" type="text" placeholder="Apellido materno..." size="30"><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- comobox -->
                        <div class="12u$">
                            <h4>Fecha de contratación: </h4>
                            <div class="6u 12u$(xsmall)">
                                <div class="row uniform">
                                    <div class="4u 12u$(small)">
                                        <h4>Día <span class="required">*</span> </h4>
                                        <div class="select-wrapper">
                                            <select name="dia" id="dia">
                                                <option value="">- Día -</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
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
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="4u 12u$(small)">
                                        <h4>/ Mes <span class="required">*</span> </h4>
                                        <div class="select-wrapper">
                                            <select name="mes" id="mes">
                                                <option value="">- Mes -</option>
                                                <option value="Enero">Enero</option>
                                                <option value="Febrero">Febrero</option>
                                                <option value="Marzo">Marzo</option>
                                                <option value="Abril">Abril</option>
                                                <option value="Mayo">Mayo</option>
                                                <option value="Junio">Junio</option>
                                                <option value="Julio">Julio</option>
                                                <option value="Agosto">Agosto</option>
                                                <option value="Septiembre">Septiembre</option>
                                                <option value="Octubre">Octubre</option>
                                                <option value="Noviembre">Noviembre</option>
                                                <option value="Diciembre">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="4u 12u$(small)">
                                        <h4>/ Año <span class="required">*</span> </h4>
                                        <div class="select-wrapper">
                                            <select name="year" id="year">
                                                <option value="">- Año -</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- submit -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Capturar datos" class="button special" /></li>
                                <li><input type="reset" value="Borrar datos" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";