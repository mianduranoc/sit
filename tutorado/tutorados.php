<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutorado.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
	<?php require_once  '../includes/cabecera-actores.php';
	require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['Puesto_Interno']!="Tutorado"){
        header("Location:../index.php");
    }?>
	
	Tutorado</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>
	
	<!-- COMIENZA CONTENEDOR PRINCIPAL -->
	<div class="container-fluid general">
		<div class="main">
			<div class="col-md-2">
				<?php require_once  '../includes/menuL-tutorados.php';
                if (isset($_SESSION['exito'])){
                    $exito=$_SESSION['exito'];
                    echo "<script>window.alert('$exito');</script>";
                    unset($_SESSION['exito']);
                    }?>
			</div>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                    <div class="contenido" id="notificaciones">
                        <div class="titulo text-center">Bienvenido al Sistema Integral de Tutorias</div>
                        <div class="text-center">
                            <strong><h4><?=$_SESSION['usuario']['nombre'];?> <?=$_SESSION['usuario']['apellido'];?></h4></strong>
                        </div>

                        <div style="padding-top: 10%; margin-left: 40%"><img src="../img/tigres.png"></div>
                    </div>
                     <!------------  Fin fichaTutor               FIN PARTE BRIAN      ----------->
                </div>

                </div>
			</div>	
			<div class="col-md-2">
				<?php require_once  '../includes/menuR-tutorados.php'; ?>
			</div>
			
		

		</div>	

	</div>
	<?php require_once '../includes/pie.php';?>