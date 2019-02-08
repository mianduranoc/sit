<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">       
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Institucional de Tutorias"){
            header("Location:../index.php");
        }
    ?>
        Coordinador Institucional de Tutorias - sesiones</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>      
        <?php require_once ("../helpers/conexion.php"); ?>

        <div class="container-fluid general">
    	    <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-coordinador-inst.php'; ?>
                </div>
                <div class="row col-md-9">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div id="calendario"></div>
                    </div>                   
                </div>                                              				
			</div>
        </div>
        <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title" id="tituloModificar"></h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="asistencia-sesionG.php" method="POST">
						<input type="hidden" name="id" id="id_sesion">
							<h3 id="tut"></h3>
							<h4 id="quien"></h4>
							<h5 id="lugar"></h5>
							<div class="form-group">
								<label>Descripcion del reporte:</label>
								<p id="nDesc" ></p>
							</div>
							<button name="btnVer" id="btnVer" class="btn btn-primary">Ver asistencia</button>							
						</form>												
						
					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>														
					</div>
				</div>  
			</div>
		</div>		
						<script>
							$('#calendario').fullCalendar({
								header:{
									left:'today,prev,next,miBoton',
									center:'title',
									right:'month,agendaWeek,agendaDay'
								},   
								weekends:false,                     
								events:'http://localhost/sit/coordinador-institucional/eventos-reportes.php'                    
								,
								eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento									
									$("#tituloModificar").html(calEvent.title);									
									$('#id_sesion').val(calEvent.id_sesion);
									let gpo = calEvent.quien.split(' ');
									if(gpo[1]=='grupo'){
										$('#btnVer').show();
									}else{
										$('#btnVer').hide();
									}
									$('#btnVer').val(calEvent.id_sesion+'-'+gpo[2]);
                                    $('#tut').html('Tutor '+calEvent.tut);
									$('#quien').html('Sesion con '+calEvent.quien);
									$('#lugar').html('Lugar: '+calEvent.lugar);
									$('#nDesc').html(calEvent.des);
									$('#modificar').modal();	
								}
							});																																									
						</script>
		<?php require_once '../includes/pie.php';?>