<!DOCTYPE html>
<html lang="es">
<head>
    <!-- <link rel="stylesheet" type="text/css" href="../css/tutorado.css"> -->
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <!-- <script type="text/javascript" src="../scripts/tutorados.js"></script> -->
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

	</div>      
        <?php require_once ("../helpers/conexion.php"); ?>

        <div class="container-fluid general">
            <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-tutorados.php'; ?>
                </div>
                <div class="row col-md-8">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h2>Conferencias donde esta inscrito</h2>
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
                                <form>
                                <div class="ficha">
										<input type="hidden" name="id" id="txtID">							
										<div class="form-row">
											<div class="col-md-5">
												<h4 id="txtTipo"></h4>
											</div>
											<div class="col-md-4">											
												<h4 id="txtLugar"></h4>
											</div>										
											<div class="col-md-3">											
												<h4 id="txtHora" name="hora"></h4>										
											</div>									
										</div>
										<div class="form-group">
											<input type="hidden" required="required" class="form-control" id="txtFecha" name="fecha">
										</div>										
										<div class="form-group">
											<label>Descripcion del evento:</label>
											<p id="txtDesc"></p>
										</div>										
									</div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>														
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuR-tutorados.php'; ?>
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
                weekends:false
                ,                     
                events:'https://www.sittepic.tech/sit/tutorado/eventos-asignaciones.php'
                ,
                eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento									
                        $("#tituloModificar").html(calEvent.title);									                                               									
                        $('#txtDesc').html(calEvent.descripcion);
                        $('#txtID').val(calEvent.id);									
                        $('#txtTipo').html("Evento tipo \n"+calEvent.tipo);
                        // console.log(calEvent.lugar+" el lugaaar");
                        $('#txtLugar').html("Lugar: "+calEvent.lugar);                      
                        var fecha = calEvent.start._i.split(' ');
                        $('#txtFecha').val(fecha[0]);
                        $('#txtHora').html("Hora: "+fecha[1]);																	
                        $('#modificar').modal();	
                }
            });						           
        </script>
		<?php require_once '../includes/pie.php';?>