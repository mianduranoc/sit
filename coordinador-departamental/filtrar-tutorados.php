<?php 

	
	require("../helpers/conexion.php");
	$aiuda = $_REQUEST['filtro'];

	$var = "<table class='table table-hover'><thead class='columnas'>
		                    <tr>
		                        <th scope='col'>No. Control</th>
		                        <th scope='col'>Apellidos</th>
		                        <th scope='col'>Nombre</th>
		                        <th scope='col'>Correo</th>
		                        <th scope='col'>Carrera</th>
		                        <th scope='col'>Grupo</th>
		                    </tr>
	                	</thead>
                    	<tbody class='renglones'>";
					        
								$db = new ConexionBD();
								$conexion = $db->getConnection();
								
								

								$alumnos = mysqli_query($conexion, "SELECT a.nc,a.nombre,a.apellido,a.correo,c.nombre as carrera from Alumno a, Carrera c where a.Carrera_id_carrera = c.id_carrera and a.Carrera_id_carrera='$aiuda' 
									ORDER BY apellido");	
	//SELECT a.nc,a.nombre,a.apellido,a.correo,c.nombre as carrera from Alumno a, Carrera c, Tutorado_Grupo tg where a.Carrera_id_carrera = c.id_carrera and a.Carrera_id_carrera='G' and a.nc = tg.nc			

	//SELECT a.nc,a.nombre,a.apellido,a.correo,c.nombre as carrera from Alumno a, Carrera c WHERE a.nc NOT IN(SELECT nc FROM Tutorado_Grupo) and a.Carrera_id_carrera = c.id_carrera and a.Carrera_id_carrera='$aiuda'			
						    
						    $cont = 0;
						    	while($alumno = mysqli_fetch_assoc($alumnos)){
						    		$var .= "<tr>
						    	<form action='asignar-tutorado-grupo.php' method='post'>
								<td>".$alumno['nc']."</td>
								<td>".$alumno['apellido']."</td>
								<td>".$alumno['nombre']."</td>
								<td>".$alumno['correo']."</td>
								<td>".$alumno['carrera']."</td>
	                        	<td>
	                        		<select  name='asignar[]'  class='asignar' style='width: 5em'>";
                                            $db=new ConexionBD();
                                            $conexion=$db->getConnection();
                                            $opciones=mysqli_query($db->getConnection(),"SELECT * FROM grupo WHERE id_carrera = '$aiuda'");
                                           	
                                            while($opcion=mysqli_fetch_assoc($opciones)){
                                            	
                                            	$var .= "<option  value='".$opcion['id_grupo']."-".$alumno['nc']."'>".$opcion['id_grupo']."</option>";
                                             }
								$var .= "</select>
	                        	</td>
								
                                 </form>
                        	</tr>";
                        	}$db->close();
                        	
                    	$var .="</tbody></table>";
                    	$var .= "<input type='submit' name='asigna' class= 'btn btn-primary' id= 'guardar' value='Asignar'>";
						    	
						echo $var;    
                    	


?>