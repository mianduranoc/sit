<div class=" container-fluid" id="listado-tutorados">
				<div class="col-md-10 row">
					<div class="row titulo">Listado de Tutorados</div>
					<table class="table table-hover">
	                    <thead class="columnas">
		                    <tr>
		                        <th scope="col">No. Control</th>
		                        <th scope="col">Apellidos</th>
		                        <th scope="col">Nombre</th>
		                        <th scope="col">Correo</th>
		                        <th scope="col">Carrera</th>
		                    </tr>
	                	</thead>
                    	<tbody class="renglones">
					        <?php require_once "../helpers/conexion.php";
								$db=new ConexionBD();
								$conexion = $db->getConnection();
								$alumnos = mysqli_query($conexion, "SELECT nc, Alumno.nombre as nombre, apellido, correo, Carrera.nombre as carrera 
									FROM Alumno
									INNER JOIN Carrera ON Alumno.Carrera_id_carrera = Carrera.id_carrera WHERE Carrera_id_carrera='S'");
							?>
						    <?php
						    	while($alumno = mysqli_fetch_assoc($alumnos)):
						 	?>
						    <tr>
								<td><?=$alumno['nc'] ?></td>
								<td><?=$alumno['apellido'] ?></td>
								<td><?=$alumno['nombre'] ?></td>
								<td><?=$alumno['correo'] ?></td>
								<td><?=$alumno['carrera'] ?></td>
	                        	<td>
	                        		<select class="asignar">
									  <option value="0">Seleccione Grupo</option>
									  <option value="1">Grupo 1</option>
									  <option value="2">Grupo 2</option>
									  <option value="3">Grupo 3</option>
									  <option value="4">Grupo 4</option>
									</select>
	                        	</td>
                        	</tr>
                        	<?php endwhile;$db->close();?>
                    	</tbody>
                    </table>
                </div>
</div>
