<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/config/gears.ico">
    <title>Nuestros servicios</title>
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
            <h2>Servicios</h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>Lust Caps & Sneakers</p>
                    <h2>Nuestros servicios</h2>
                </header>
                <p >Nos dedicamos a la venta de gorras y calzado deportivo, somo distribuidores de marcas como:</p>

                <div >
                    <ul>
                        <li>Nike</li>
                        <li>Adidas</li>
                        <li>New Era</li>
                        <li>Wu-Wear</li>
                    </ul>
                </div>
                <div class="image fit" align="center">
                    <a href="#"><img src="../images/config/header/W3J87zt.jpg" alt="" /></a>
                </div><br>

                <div>
                    <div class="box">
                        <div class="image fit">
                            <a href="https://www.youtube.com/watch?time_continue=29&v=flDvO6hAE08" target="_blank">
                                <video controls>
                                    <source src="../multimedia/Gorras_New_Era_92_aos_de_historia.mp4" type="video/mp4">
                                </video>
                            </a>
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <h2>New Era, 92 años de historia</h2>
                            </header>
                            <p align="center"> Los 90’s: Esta década marcó el éxito y aseguró el futuro de la marca, pues en 1993 New Era se convirtió en
                                proveedor exclusivo de gorras On-Field para la MLB. A esta colección se le denominó
                                The Authentic Collection, como se le conoce hasta hoy.</p>
                            <footer class="align-center">
                                <a href="https://blog.newera.mx/post/gorras-new-era-90-anos-de-historia-y-tradicion"  target="_blank" class="button alt">Más detalles</a>
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