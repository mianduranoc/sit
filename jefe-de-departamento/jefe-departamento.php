<?php require_once "cabecera-jefe-depto.php"?>
    <div class="col-md-10 contenido">
    <div class="cuerpo">
        <div class="contenido" id="notificaciones">
            <div class="titulo text-center">Bienvenido al Sistema Integral de Tutorias</div>
            <div class="text-center">
                <strong><h4><?=$_SESSION['usuario']['nombre'];?> <?=$_SESSION['usuario']['apellido'];?></h4></strong>
            </div>

            <div style="padding-top: 10%; margin-left: 40%"><img src="../img/tigres.png"></div>
        </div>
    </div>
    </div>

			<?php require_once "pie-jefe-depto.php"?>