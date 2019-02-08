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
    <style type="text/css">
        .listar{
          font-family: Soberana-Condensed-italic;
          text-align:center;
          color: #fff;
          border-radius: 4px;
          border:solid 1px black;          
        }
        .listar{
            background-color: rgb(27,57,106);
        }        
        .listar:hover{
            box-shadow: 0px 50px 0px darkorange inset; 
        /* box-shadow: 130px 0px 0px darkorange inset,-120px 0px 0px darkorange inset; */ 
            cursor:pointer;}      
            .boton{
                position:relative;
            }          
            .boton button{
                position:absolute;
                left:40%;
                top:50%;
            }
            .titulo{
                text-align:center;
                padding:10px;
            }
    </style>
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Jefe de Departamento Desarrollo Academico"){
            header("Location:../index.php");
        }
    ?>
    Jefe Departamento Desarrollo Academico</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>      
        <?php require_once ("../helpers/conexion.php"); ?>

        <div class="container-fluid general">
    	    <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-jefe-dep-acad.php'; ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8">                    
                    
                    <?php
                        // esto es para guardar la asistencia
                        $db=new ConexionBD();
                        $conexion = $db->getConnection();       
                        if(isset($_POST['lista'])){
                            $confe = $_POST['lista'];
                            $alumnos = $_POST['asistencia'];
                            $bandera = $_POST['bandera'];
                            foreach ($alumnos as $check) {
                                foreach ($bandera as $alumno) {
                                    if($check == $alumno){
                                        $busqueda = mysqli_query($conexion,"SELECT asistencia FROM Tutorado_Conferencia WHERE nc = '$check' and id_conferencia = '$confe'");
                                        if(mysqli_num_rows($busqueda) > 0){
                                            $acreditado = mysqli_fetch_assoc($busqueda);
                                            if($acreditado['asistencia'] == 0){
                                                $ejecutar = mysqli_query($conexion,"UPDATE Tutorado_Conferencia SET asistencia = 1 WHERE nc='$alumno' and id_conferencia = '$confe'");
                                            }
                                        }
                                        $bandera = array_diff($bandera, array("$check"));
                                    }
                                }
                            }
                            foreach ($bandera as $seleccion) {
                                $busqueda = mysqli_query($conexion,"SELECT asistencia FROM Tutorado_Conferencia WHERE nc = '$check' and id_conferencia = '$confe'");
                                            if(mysqli_num_rows($busqueda) > 0){
                                                $acreditado = mysqli_fetch_assoc($busqueda);
                                                if($acreditado['asistencia'] == 1){
                                                    $ejecutar =mysqli_query($conexion,"UPDATE Tutorado_Conferencia SET asistencia = 0 WHERE nc='$alumno' and id_conferencia = '$confe'");
                                                }
                                            }
                            }                            
                            if($ejecutar){
                                $_SESSION['lista'] = 'Correcto';
                                header("Location: ../coordinador-institucional/grupos-asignados.php");
                            }
                            unset($_POST['lista'],$_POST['asistencia']);
                        }
                        // lo de abajo es para ver la tablita
                          
                        if(isset($_POST['paselista'])):
                            $grupo_conf = explode('-',$_POST['paselista']);
                            $conf = $grupo_conf[0];
                            $grupo = $grupo_conf[1];
                            $vista = mysqli_query($conexion, "CREATE OR REPLACE VIEW alumno_asisconf AS SELECT CONCAT(a.apellido,' ',a.nombre) as nombre, a.nc
                            FROM Tutorado_Grupo tg, Alumno a WHERE tg.nc = a.nc and tg.grupo = '$grupo' ORDER BY nombre");   
                            $alumnos = mysqli_query($conexion,"SELECT * FROM alumno_asisconf ORDER BY nombre");
                    ?>
                    <div class="row titulo">Lista de alumnos grupo <?=$grupo?></div>
                    <form action="asistencia-conferencia.php" method="post">
                        <table class="table table-hover">
                            <thead class="columnas">
                                <tr>
                                    <th scope="col">Nombre alumno</th>
                                    <th scope="col">Número de control</th>                                   
                                    <th scope="col">Seleccionar todos<input type="checkbox" id="select_all" style='margin-left:1%;width:5%;height:15px;display:inline;'class='checkbox' onclick='m1(this)'></th>                                  
                                </tr>
                            </thead>
                            <tbody class="renglones" >
                                
                                <?php
                                        while($alumno = mysqli_fetch_assoc($alumnos)):                                                                                       
                                ?>                                                                         
                                            <tr>
                                                <td><?=$alumno['nombre'] ?></td>
                                                <td><input type="hidden" value="<?=$alumno['nc']?>" name ="bandera[]"><?=$alumno['nc'] ?></td>
                                                <?php  
												$aux = mysqli_query($conexion,"SELECT asistencia FROM Tutorado_Conferencia WHERE nc = '".$alumno['nc']."' and id_conferencia = '$conf'");
												if(mysqli_num_rows($aux)>0):
													$acr = mysqli_fetch_assoc($aux);
													if($acr['asistencia'] == 1):
											?>
													<td><input type="checkbox" name="asistencia[]" value = <?=$alumno['nc']?> checked ="checked" class = "alumnos"></td>
												<?php 
													 else:
												?>
													<td><input type="checkbox" name="asistencia[]" value = <?=$alumno['nc']?> class = "alumnos"></td>
                                            <?php   endif; 
                                                endif;?>
						                				                                       
                                            </tr>                                                                                                                             
                                <?php 	                                      
                                        endwhile;
                                   ?>
                            </tbody>
                        </table>
                        <div class="boton"><button name="lista" value="<?=$conf?>"  class="btn listar">Guardar asistencia</button></div>      
                        </form>      
                        <?php  endif;$db->close();?>   
                        <script>
                            function m1(status){
                                var td=document.getElementsByClassName('alumnos');
                                if(status.checked){
                                    for(var j = 0; j < td.length; j++){
                                        td[j].checked=1 ;
                                    }
                                }
                                else{
                                    for(var j = 0; j < td.length; j++){
                                        td[j].checked=0 ;
                                    }
                                }											
                            }	
                        </script>    
                </div>
                <div class="col-md-1"></div>                                              				
		    </div>
        </div>
       						

<?php require_once '../includes/pie.php';?>