<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Quienes somos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/estilos_proyecto.css" type="text/css"/>
</head>
<?php
require "../sections/nav_pages.php";
?>
<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Store Caps & Sneakers</p>
            <h2>Quienes somos</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>DynaDevs</p>
                    <h2>¡Conocenos!</h2>
                </header>
                <div align="center">
                    <img src="../images/config/udg.png" width="200" height="272">
                </div>
                <p>Jonathan Iván Pérez Uribe</p>
                <p >Este es un proyecto para la materia de software especializado</p>
                <p>Soy estudiante de la carrera Lic. en Tecnologías de la Información en el Centro Universitario de los Valles</p>
                <p>Tengo conocimientos en los siguientes lenguajes para el desarrollo de aplicaciones</p>
                <div >
                    <ol>
                        <li>Java</li>
                        <li>Python</li>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>JavaScrip</li>
                        <li>PHP</li>
                        <li>SQL</li>
                    </ol>
                </div>

                <div>
                    <div class="box">
                        <div class="image fit">
                            <a href="https://www.youtube.com/watch?v=DljcBtrYF10" target="_blank">
                                <video controls>
                                    <source src="../multimedia/the_Special_Field_Air_Force_1.mp4" type="video/mp4">
                                </video>
                            </a>
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <p>Que alguien me los compre :'(</p>
                                <h2>NIKE SF AIR FORCE 1</h2>
                            </header>
                            <p align="center"> Más que una simple cobertura para el pie, este calzado diseñado originalmente para el básquetbol en 1982
                                debe su nombre al Air Force One,
                                el avión que transporta al presidente de Estados Unidos.</p>
                            <footer class="align-center">
                                <a href="https://store.nike.com/mx/es_la/pd/bota-sf-air-force-1/pid-11920481/pgid-11819950" target="_blank" class="button alt">Más detalles</a>
                            </footer>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
require "../sections/footer_pages.php";