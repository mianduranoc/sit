<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutore.css">
	<script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
	<script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
	<script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">  
    <link rel="shortcut icon" href="../img/escudo_itt.png">
	<?php require_once  '../includes/cabecera-actores.php';
	require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_tutor']!="Tutor"){
        header("Location:../index.php");
    }
    ?>
	
	Tutor</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>
	</div>
	

		<div class="container-fluid general">
			<div class="main">
				<div class="col-md-2">
					<?php require_once  '../includes/menuL-tutores.php'; 					
					?>
				</div>
				<div class="col-md-8">


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
				
                <div class="col-md-2">
                    <?php require_once  '../includes/menuR-tutores.php'; ?>
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