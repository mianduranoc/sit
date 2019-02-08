<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
	<meta charset="UTF-8">
	<?php require_once  '../includes/cabecera-actores.php';
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Institucional de Tutorias"){
        header("Location:../index.php");
    }
    ?>
	Coordinador Institucional de Tutorias</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>		
	</div>
	
    <div class="container-fluid general">
    	<div class="main">
    		<div class="col-md-2">
    			<?php require_once  '../includes/menuL-coordinador-inst.php'; ?>
    		</div>
    		<div class="col-md-10 contenido">
                <div class="contenido" id="notificaciones">
                    <div class="titulo text-center">Bienvenido al Sistema Integral de Tutorias</div>
                    <div class="text-center">
                        <strong><h4><?=$_SESSION['usuario']['nombre'];?> <?=$_SESSION['usuario']['apellido'];?></h4></strong>
                    </div>

                    <div style="padding-top: 10%; margin-left: 40%"><img src="../img/tigres.png"></div>
                </div>
    		</div>
    	</div>
    </div>
	<footer>
		<div class="container pie">
			<p class="col-md-12">AV. TECNOLÓGICO # 2595, COL. LAGOS DEL COUNTRY. TEPIC, NAYARIT. MÉXICO. C.P. 63175. TEL: (311) 211 94 00. DIRECCION@ITTEPIC.EDU.MX</p>
		</div>			
	</footer>
</body>
</html>