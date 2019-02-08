<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutorado.css">
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
    <link rel="stylesheet" href="../tutorado/estilos.css">   
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
			<div class="col-md-8">
                <div class="row col-md-11">
                   
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                    <h2>Sesiones donde esta inscrito</h2>
                        <div id="calendario"></div>
                    </div>                   
                </div>
                <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="tituloModificar"></h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                    <input type="hidden" name="id" id="id_sesion">
                                    <div class="ficha"> 
                                        <div class="row">
                                             <div class="col-md-5"><h4 id="lugar"></h4></div>                                                                                                               
                                            <div class="col-md-5"> <h4 id="hora"></h4></div>
                                        </div>                                            
                                        
                                    </div>                                                                
                                
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
                    events:'https://www.sittepic.tech/sit/tutorado/eventos-sesiones.php'
                    ,
                    eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento									
                        $("#tituloModificar").html(calEvent.title);									
                        $('#id_sesion').val(calEvent.id_sesion);
                        var fecha = calEvent.start._i.split(' ');									
						$('#hora').html("Hora: "+fecha[1]);                    
                        $('#lugar').html('Lugar: '+calEvent.lugar);               
                        $('#modificar').modal();	
                    }
                });																																		
            </script>
            </div>
			<div class="col-md-2">
				<?php require_once  '../includes/menuR-tutorados.php'; ?>
			</div>
			
		

		</div>	

	</div>
	<?php require_once '../includes/pie.php';?>