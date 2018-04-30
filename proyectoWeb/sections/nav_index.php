<?php
echo ('<body>
    <!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="index.php">Lust Caps & Sneakers <span>by Jonathan</span></a></div>
                ');
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo ('<a href="#login">'.$_SESSION['usuario'].'</a>');
                }else{
                    echo ('<a href="#login">Iniciar sesión</a>');
                }
                echo('
                <a href="#"><img src="images/config/cart.png"> (0)</a>
                <a href="#menu">Menu</a>
			</header>
        <!-- Nav -->
        <nav id="login">
         ');
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo ('<ul class="links">
                        <li><a href="pages/form_usuario.php?id='.$_SESSION['id'].'">Editar perfil</a></li>
                        <li><a href="actions/cerrar_sesion.php">Cerrar sesión</a></li>');
                if ($_SESSION['rol'] == 2){
                    echo('<li class="desplegar"><a class="formulario" href="#submenu">ADMINISTRACIÓN </a>
                            <ul class="submenu">
                                <li><a href="pages/articulos.php">Articulos</a> </li>
                                <li><a href="#">Pedidos</a> </li>
                                <li><a href="pages/usuarios.php">Usuarios</a> </li>
                            </ul></li>');
                }
                echo ('</ul>');
            }else{
            echo('<form class="dropdown-menu p-4" method = "post" action = "actions/iniciar_sesion.php" onsubmit = "" >
                <div class="form-group" >
                    <label for="email" > E-mail</label >
                    <input type = "email" class="form-control" name = "email" id = "email" placeholder = "email@ejemplo.com" >
                </div >
                <div class="form-group" >
                    <label for="pass" > Contraseña</label >
                    <input type = "password" class="form-control" name = "pass" id = "pass" placeholder = "Contraseña" >
                </div ><br >
                <button type = "submit" class="button special" > Ingresar</button ><p ></p >
                <a href = "pages/form_usuario.php?iniciar=i" ><button type = "button" class="button alt" > Registrarse</button ><a >
            </form >');
        }
        echo('
        </nav>
        <nav id="menu">
            <ul class="links">
                <li class="desplegar"><a class="formulario" href="#submenu">Categoría</a>
                    <ul class="submenu">
                        <li><a href="">Sneakers</a> </li>
                        <li><a href="">Caps</a> </li>
                        <li><a href="">Wear</a> </li>
                    </ul></li>
                <li class="desplegar"><a class="formulario" href="#submenu">Género</a>
                    <ul class="submenu">
                        <li><a href="">Hombre</a> </li>
                        <li><a href="">Mujer</a> </li>
                        <li><a href="">Niño</a> </li>
                        <li><a href="">Niña</a> </li>
                    </ul></li>
            </ul>
        </nav>');