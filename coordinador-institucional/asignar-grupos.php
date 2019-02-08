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
	<link rel="stylesheet" href="../coordinador-institucional/estilos.css">
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Institucional de Tutorias"){
            header("Location:../index.php");
        }
    ?>
        Coordinador Institucional de Tutorias - asignar grupos</p>
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
									<h5>Asignar al grupo:</h5>								
                                    <div class="form-group">
                                        <label>Grupo:</label>
                                        <select required="required" name="tipo" id="grupos" class="form-control" onchange="d1(this)">                                                              
                                            <?php
                                            $db=new ConexionBD();
                                            $conexion=$db->getConnection();
                                            $opciones=mysqli_query($db->getConnection(),"SELECT * FROM grupo");
                                            while($opcion=mysqli_fetch_assoc($opciones)):?>
                                                <?php $carreras =mysqli_query($db->getConnection(),"SELECT nombre FROM Carrera WHERE id_carrera='".$opcion['id_carrera']."'");
                                                    $carrera=mysqli_fetch_assoc($carreras);
                                                ?>
                                                <option value="<?=$opcion['id_grupo']?>-<?=$opcion['tamano']?>"><?=$opcion['id_grupo'];?> - <?=$carrera['nombre'];?></option>
                                            <?php endwhile;$db->close();?>                       
                                        </select>
									</div>
									<div class=" form-group">
										<label>Lugares a ocupar: </label> <input type="text" required="required" disabled class="form-control" placeholder="lugares a ocupar" id="txtOcupar" name="txtOcupar">
									</div>
									<div class=" form-group">
										<p>Cupo: </p> <p id="txtCupo"></p>
									</div>
									<div class="form-group">
										<p>Lugares ocupados: </p> <p id="txtLugOc"></p>
									</div>
								</form>
								
							</div>
							<div class="modal-footer">
                                <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
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
								events:'http://localhost/sit/coordinador-institucional/eventos-asignar.php'                    
								,
								eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento									
										$("#tituloModificar").html(calEvent.title);									                       
										$('#txtTitulo').html(calEvent.title);									
										$('#txtDesc').html(calEvent.descripcion);
										$('#txtID').val(calEvent.id);									
										$('#txtTipo').html("Evento tipo \n"+calEvent.tipo);
										// console.log(calEvent.lugar+" el lugaaar");
										$('#txtLugar').html("Lugar: "+calEvent.lugar);
										$('#txtCupo').html(calEvent.cupo);
										$('#txtLugOc').html(calEvent.ocupados);
										let gp = $('#grupos').val().split('-'); 
										var fecha = calEvent.start._i.split(' ');
										$("#txtOcupar").val(gp[1]);
										$('#txtFecha').val(fecha[0]);
										$('#txtHora').html("Hora: "+fecha[1]);																	
										$('#modificar').modal();	
								}
							});		
							function d1(selectTag){
								if(selectTag.value=="x"){
									$("#txtOcupar").val('0');
								}else{
									var g = selectTag.value.split('-');   
									// console.log(selectTag.value+" el lugar 2");        	
									$("#txtOcupar").val(g[1]);//se usa ajax para guardar el grupo									;										
								}
								
							}					
							function getDatos(){
								let today = moment(new Date()).format('YYYY-MM-DD');
								let gp = $('#grupos').val().split('-');
								let ev= { //aqui esta la magia se crea un json de los datos que se enviaran por post con ajax
									id:$('#txtID').val(),																											
									fecha:today,           
									grupo:gp[0],
									tamano:gp[1]
								}; 
								return ev;       
							}
							function setDatos(accion,objEv) {								
								let tam = parseInt($('#txtOcupar').val());
								let cup = parseInt($('#txtCupo').html());
								let ocp = parseInt($('#txtLugOc').html());
								if((tam+ocp)<=cup){
									$.ajax({
										type:'POST', // aqui se envian los datos y la accion que se hara
										url:'../coordinador-institucional/eventos-asignar.php?accion='+accion,
										data:objEv,
										success: function(msg){
											if(msg){
												console.log(msg);
												swal('Correcto', 'Grupo asignado exitosamente!', 'success');
												$('#calendario').fullCalendar('refetchEvents');  
												$('#modificar').modal('toggle'); 
											}
										},
										error:function(xhr, status){
											if(status=='parsererror')
												swal('Ups!', 'El grupo ya fue registrado con anterioridad', 'error');
											else swal('Ups!', 'Algo salio mal. Intentelo mas tarde', 'error');
										}
									});
								}else{
									swal('  Ups!', 'No puede exceder el limite de cupos', 'error');									
								}
							}
							
							$('#btnAgregar').click(function(){        
								setDatos('agregar',getDatos());  
								
							});
						</script>
		<?php require_once '../includes/pie.php';?>