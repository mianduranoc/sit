<!DOCTYPE html>
<html lang="es">
<head>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
		#guardar:hover{
			box-shadow: 0px 50px 0px darkorange inset; 
    	/* box-shadow: 130px 0px 0px darkorange inset,-120px 0px 0px darkorange inset; */ 
   	 		cursor:pointer;}
   	 	.asignar{
   	 		width:100%;
			
   	 	}
   	 	#buscar{
			background-color: rgb(27,57,106);
   	 	}
   	 	#guardar{
   	 		position: absolute;
   	 		top: 50%;
   	 		left: 40%; 
   	 		background-color: rgb(27,57,106);
   	 	}
   	 	
   	 	#id{
			position: relative;
   	 	}
	</style>
	<?php  require_once  '../includes/cabecera-actores.php'; require_once '../helpers/conexion.php';
		if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Departamental de Tutorias"){
	        header("Location:../index.php");
	    } 
    ?>
	Coordinador de Tutorías Departamental</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>		
	</div>
	
    <div class="container-fluid general">
    	<div class="main">
    		<div class="col-md-2">
    			<?php require_once  '../includes/menuL-coordinador-dpto.php'; ?>
    		</div>
    		<div class="col-md-10 contenido">
    			<div class=" container-fluid" id="listado-tutorados">
				<form method="POST" action="visualizar-asignar-tutorado.php">
					<div class="row titulo">Listado de Tutorados</div>
					<div class="row">
						
							<select name="id_carrera" class="asignar" onchange = "d1(this)" style="width: 13em;margin-left: 75%;">
								<option value="0">Seleccione Carrera</option>
									<?php

                                        $db=new ConexionBD();
                                        $conexion=$db->getConnection();
                                        $carreras=mysqli_query($conexion,"SELECT * FROM Carrera WHERE depto =". $_SESSION['usuario']['id_depto']);
                                           	
                                            while($carrera=mysqli_fetch_assoc($carreras)):?>
                                            	
                                                <option value="<?=$carrera['id_carrera']?>"><?=$carrera['nombre'];?></option>
                                            <?php endwhile;?>
									</select><input type="submit" name="buscar" class= 'btn btn-primary' id= 'buscar' value='Buscar' style="margin-left: 2%; height: 3.5vh;">
						
					</div>	
                	</form>
                	<?php  
                		if(isset($_POST['buscar'])):
							$aiuda = $_POST['id_carrera'];
                				$db=new ConexionBD();
								$conexion = $db->getConnection();
								$alumnos = mysqli_query($conexion, "SELECT a.nc,a.nombre,a.apellido,a.correo,c.nombre as carrera from Alumno a, Carrera c where a.Carrera_id_carrera = c.id_carrera and a.Carrera_id_carrera='$aiuda' 
									ORDER BY apellido");
								
                	?>
                	<form method ="POST" action="asignar-tutorado-grupo.php">
                		<table class='table table-hover'>
							<thead class='columnas'>
								<tr>
			                        <th scope='col'>No. Control</th>
			                        <th scope='col'>Apellidos</th>
			                        <th scope='col'>Nombre</th>
			                        <th scope='col'>Correo</th>
			                        <th scope='col'>Carrera</th>
			                        <th scope='col'>Grupo</th>
			                    </tr>
	                		</thead>
                    	<tbody class="renglones" id="asis">
							<?php while($alumno = mysqli_fetch_assoc($alumnos)): ?>
								<tr>
									<td><?=$alumno['nc']?></td>
									<td><?=$alumno['apellido']?></td>
									<td><?=$alumno['nombre']?></td>
									<td><?=$alumno['correo']?></td>
									<td><?=$alumno['carrera']?></td>
									<td>
		                        		<select  name='asignar[]'  class='asignar' style='width: 5em'>";
	                                       <?php 
	                                       $opciones = mysqli_query($conexion,"SELECT * FROM grupo WHERE id_carrera = '$aiuda'");
	                                       $comparar = mysqli_query($conexion,"SELECT grupo FROM Tutorado_Grupo WHERE nc ='".$alumno['nc']."'");
	                                            if(mysqli_num_rows($comparar)>0):
                                 					$grup = mysqli_fetch_assoc($comparar);
	                                            
	                                       ?>
			                                       <option  selected value="<?=$grup['grupo']?>-<?=$alumno['nc']?>"><?=$grup['grupo']?></option>
			                                       <?php  
			                                       		while($opcion=mysqli_fetch_assoc($opciones)):
				                                       		if($opcion['id_grupo'] !== $grup['grupo']):
				                                       		?>
			                                					<option value="<?=$opcion['id_grupo']?>-<?=$alumno['nc']?>"><?=$opcion['id_grupo']?></option>
		                            						<?php endif;
		                            					endwhile;
												else:
		                                			while($opcion = mysqli_fetch_assoc($opciones)):                             
		                            			?>                                                                       
		                                         	<option value="<?=$opcion['id_grupo']?>-<?=$alumno['nc']?>"><?=$opcion['id_grupo']?></option>
                                    
                                    				<?php endwhile;
                                    			endif;?>
	                                       </select>
	                        		</td>
                        		</tr>
							<?php endwhile; ?> 
						</tbody></table>
                		<div id="id"><input type="submit" name="asigna" class= 'btn btn-primary' id= 'guardar' value='Asignar'></div>
                		<?php endif;$db->close(); ?>
                	</form>	
					
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