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


                   <!-- OTRA VEZ YO XD -->										
                   
						<h2>Lista de reportes de sesiones</h2>
						
                        <div class="row cal">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div id="calendario"></div>
                            </div>
                            <div class="col-md-2"></div>
                        </div> 
						
                       		
                   		 
						<!-- Modal para modificar-->
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
									<input type="hidden" name="id" id="id_sesion">
									<h4 id="quien"></h4>
									<h5 id="lugar"></h5>
									<div class="form-group">
										<label>Descripcion del reporte:</label>
										<textarea  class="form-control" placeholder="Escriba aquí su reporte" name="desc" id="nDesc" rows="10"></textarea>
									</div>
								</form>
								
							</div>
							<div class="modal-footer">
								<button type="button" id="btnModificar"class="btn btn-primary">Modificar</button>	
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>														
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
                                weekends:false
                                ,                  
								events:'https://sittepic.tech/sit/tutores/eventostutores.php'
								,
								eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento									
									$("#tituloModificar").html(calEvent.title);									
									$('#id_sesion').val(calEvent.id_sesion);
									$('#quien').html('Sesion con '+calEvent.quien);
									$('#lugar').html('Lugar: '+calEvent.lugar);
									$('#nDesc').val(calEvent.des);
									$('#modificar').modal();	
								}
							});							
							function getDatos(){
								let ev= { //aqui esta la magia se crea un json de los datos que se enviaran por post con ajax
									id_sesion:$('#id_sesion').val(),								        
									des:$('#nDesc').val()           									
								}; 
								return ev;       
							}
							function setDatos(accion,objEv) {
								$.ajax({
									type:'POST', // aqui se envian los datos y la accion que se hara
									url:'../tutores/eventostutores.php?accion='+accion,
									data:objEv,
									success: function(msg){
										if(msg){
											$('#calendario').fullCalendar('refetchEvents');  
											$('#modificar').modal('toggle'); 
										}
									},
									error:function(){
										alert('Ocurrio un error...  ');
									}
								});
							}
							
							$('#btnModificar').click(function(){        
								setDatos('modificar',getDatos());  
									
							});
						</script>
								
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

							
