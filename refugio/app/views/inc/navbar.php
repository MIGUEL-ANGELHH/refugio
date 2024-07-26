<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar menu">
    <div class="navbar-brand menu">
        <a class="navbar-item " href="<?php  echo APP_URL; ?>dashboard/">
            <img src="<?php  echo APP_URL; ?>/app/views/img/bulma.png" alt="LoRefugio" height="100%">
        </a>
        <div class="navbar-burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu enlace">

        <div class="navbar-start">
            <a class="navbar-item enlace" href="<?php  echo APP_URL; ?>dashboard/">
                Dashboard
            </a>
            
            <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link enlace" href="<?php  echo APP_URL; ?>quienes">
                    ¿Quiénes somos?
                </a>
                <div class="navbar-dropdown is-boxed">

                    <a class="navbar-item" href="#">
                        Historia
                    </a>
                    <a class="navbar-item" href="#">
                        Misión
                    </a>
                    <a class="navbar-item" href="#">
                        Visión
                    </a>

                </div>
            </div>
            <div class="navbar-brand enlace">
                <a class="navbar-item enlace" href="<?php  echo APP_URL; ?>mascotas">
                    Adopta
                </a>
            </div>
            <div class="navbar-brand">
                <a class="navbar-item enlace" href="<?php  echo APP_URL; ?>donacion">
                    Dona
                </a>
            </div>
        </div>
        
        <div class="navbar-end">
           
        <div class="navbar-brand">
                <a class="navbar-item enlace" href="<?php  echo APP_URL; ?>login">
                    Inicia Sesión
                </a>
            </div>
        <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    ** User Name **
                </a>
                <div class="navbar-dropdown is-boxed">

                    <a class="navbar-item" href="#">
                        Mi cuenta
                    </a>
                    <a class="navbar-item" href="#">
                        Mi foto
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="#" id="btn_exit" >
                        Salir
                    </a>

                </div>
            </div>
        </div>

    </div>
</nav>

</body>
</html>