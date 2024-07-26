<?php

    require_once "./app/views/inc/head.php";
    require_once "./config/server.php";

    use app/controllers/mascotacontrollers;
    $mascotacontrallers = new mascotacontrollers();
    $imgMascotas = $mascotacontrallers->traermascotas();

?>
<link rel="stylesheet" href="<?php echo APP_URL;?>/../app/views/css/bulma-no-dark-mode.css">

<div class="about container">
    <div class="row">
        <?php foreach ($imgMascotas as $mascotas): {?>
    
        <div class="card login-container" style="width 18rem;">
            <div class="card-body">
                <h5 class= "card-title"><?php echo $imagen ['nombre']?></h5>
                <p class="card-text">?<?php echo $imagen["descripcion"]?><p>
                <a href="#" class="btn-btn prymary" Go somewhere> </a>
            </div>
            </div>
        </div><?php } endforeach; ?>
    </div>
</div>