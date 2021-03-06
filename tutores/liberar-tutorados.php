<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
	<!--------------------  INICIO CSS --------------->
	<style type="text/css">
		@font-face {
            font-family: Soberana-Condensed-regular;
            src: url(../fuente/soberanasanscondensed_regular.otf);           
		}
		/******************* LISTA  **************************/
		.lista{
    		padding: 10px;    
		}
		.listatut{
		    text-align: center;
		}
		.titulo-listado-tutorados{
			font-family: Soberana-Condensed-regular;
			font-size: 2.5em;
		}
		#liberar{
			position: absolute;
   	 		top: 50%;
   	 		left: 40%; 
   	 		background-color: rgb(27,57,106);
		}
		#id{
			position: relative;

   	 	}
   	 	#liberar:hover{
			box-shadow: 0px 50px 0px darkorange inset; 
			cursor:pointer;}
	</style>
	<!------------------ FIN CSS ---------------------->
    <!----------------------   INICIO JS ----------------------->
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded",iniciar);
	function iniciar(){
		
		var d = document.getElementsByClassName("prueba");
		var acr = document.getElementsByClassName("liberados");

		for(var j = 0; j < acr.length; j++){
			acr[j].parentElement.parentElement.classList.add("success");
		}
		for(var i = 0; i < d.length; i++){
			d[i].addEventListener("change",(event)=>{
			if (event.target.checked) {
		    	event.target.parentElement.parentElement.classList.add("success");
		  	} else {
		    	event.target.parentElement.parentElement.classList.remove("success");
		  	}
			});
		}
		
}

	</script>
<!-------------------  FIN JS ---------------------------------------------------->
	<?php require_once '../includes/cabecera-actores.php';
		require_once "../helpers/conexion.php";
	    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_tutor']!="Tutor"){
	        header("Location:../index.php");
	    }
    ?>
	
	Tutor</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>
    <body>
		<div class="container-fluid general">
				<div class="col-md-2">
					<?php require_once '../includes/menuL-tutores.php'; ?>
					<?php  
						if(isset($_SESSION['exito'])){
							$exito=$_SESSION['exito'];
							echo "<script>swal('$exito', '¡Alumnos Liberados!', 'success');</script>";
							unset($_SESSION['exito']);
						}
					?>
				</div>
				<div class="col-md-8">
					<div class=" container-fluid" id="listado-tutorados">
						<div class="col-md-12 row">
							<div class="row titulo-listado-tutorados">Liberar Tutorados</div>
								<form method = "POST" action="acreditar-tutorados.php"> 
								<table class="table table-hover">
						            <thead class="columnas">
							            <tr>
							                <th scope="col">No. Control</th>
							                <th scope="col">Apellidos</th>
							                <th scope="col">Nombre</th>
							                <th scope="col">Correo</th>
							                <th scope="col">Carrera</th>
							                <th scope ="col">Liberado</th>
							            </tr>
						            </thead>
					                <tbody class="renglones" >
					                	<?php
											$db=new ConexionBD();
											$conexion = $db->getConnection();
											$alumnos = mysqli_query($conexion, "select a.nombre,a.apellido, a.nc,a.correo,c.nombre as carrera
                                            FROM Alumno a, Carrera c, Tutorado_Grupo tg 
                                            WHERE tg.nc = a.nc and a.Carrera_id_carrera = c.id_carrera and tg.grupo in (
                                            SELECT id_grupo FROM tutor_tutorado where rfc ='".$_SESSION['usuario']['rfc']."')");
										?>
						                <?php
						    				while($alumno = mysqli_fetch_assoc($alumnos)):
						 				?>
						                <tr class = "prueba">
								            <td><?=$alumno['nc'] ?><input type="hidden" value="<?=$alumno['nc']?>" name ="bandera[]"></td>
											<td><?=$alumno['apellido'] ?></td>
											<td><?=$alumno['nombre'] ?></td>
											<td><?=$alumno['correo'] ?></td>
											<td><?=$alumno['carrera'] ?></td>
											<?php  
												$aux = mysqli_query($conexion,"SELECT acreditado FROM Alumno_Tutoria WHERE nc = '".$alumno['nc']."'");
												if(mysqli_num_rows($aux)>0):
													$acr = mysqli_fetch_assoc($aux);
													if($acr['acreditado'] == 1):
											?>
													<td><input type="checkbox" name="liberado[]" value = <?=$alumno['nc']?> checked ="checked" class = "liberados"></td>
												<?php 
													 else:
												?>
													<td><input type="checkbox" name="liberado[]" value = <?=$alumno['nc']?>></td>
						                		<?php endif;else:?>
						                				<td><input type="checkbox" name="liberado[]" value = <?=$alumno['nc']?>></td>
						                </tr>
					                	<?php 		
					                			endif;
					            			endwhile; $db->close();?>
					                </tbody>
					            </table>
					            <div id="id"><input type="submit" name = "liberar" value = "Guardar" class = "btn btn-primary" id ="liberar"></div>
					        </form>
					    </div>
					</div> 
				</div>
				<div class="col-md-2">
					<?php require_once '../includes/menuR-tutores.php'; ?>
				</div>
				
		</div>
		<footer>
			<div class="container pie">
				<p class="col-md-12">AV. TECNOLÓGICO # 2595, COL. LAGOS DEL COUNTRY. TEPIC, NAYARIT. MÉXICO. C.P. 63175. TEL: (311) 211 94 00. DIRECCION@ITTEPIC.EDU.MX</p>
			</div>			
		</footer>
</body>
</html>