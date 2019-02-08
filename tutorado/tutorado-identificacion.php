<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutorado.css">
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.css" />
    <link rel="shortcut icon" href="./img/escudo_itt.png">
    <!--script type="text/javascript" src="../scripts/tutorados.js"></script-->
	<?php require_once  '../includes/cabecera-actores.php';
        require_once "../helpers/conexion.php";
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['Puesto_Interno']!="Tutorado"){
            header("Location:../index.php");
            }
    ?>
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
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                    <div class="contenido" id="ficha-identificacion">
                        <div class="titulo">FICHA DE IDENTIFICACIÓN</div>
                        <!--**********************************-->
                        <form>
                <!--Primer renglón-->
                    <div class="row ">
                        <div class="form-group col-md-3 ">
                            <label>Carrera a la que pertenece:</label>
                            <select class="form-control">
                                <?php
                                    $db = new ConexionBD();
                                    $conexion = $db->getConnection();
                                    $opciones =mysqli_query($db->getConnection(),"SELECT id_carrera,nombre FROM Carrera");
                                    while ($opcion=mysqli_fetch_assoc($opciones)):?>
                                        <option value="<?$opcion['id_carrera']?>"> <?=$opcion['nombre'];?> </option>
                                <?php endwhile;$db->close();?>
                            </select>
                        </div>
                        <div class=" form-group col-md-3 ">
                                <label>Número de control:</label> <input type="text" class="form-control" placeholder="">    
                        </div> 
                        <div class="form-group col-md-2 ">
                            <label>Semestre:</label>
                            <select class="form-control">
                                <option selected>Elige</option>
                                <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                                <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
                                <option>11</option><option>12</option><option>otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">
                            <label>Fecha de Nacimiento:</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <!--Termina primera renglon-->
<!--#############################################-->
                    <!--DATOS PERSONALES-->
                            <hr>  
                            <h5 class="modal-title">DATOS GENERALES</h5>
                            <hr>
<!--##########################################################################-->                    
                    <div class="row">
                            <div class="form-group col-md-3 ">
                                <label>Apellido Paterno:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-3 ">
                                <label>Apellido Materno:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-3 ">
                                <label>Nombre(s):</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group col-md-2 ">
                                <label>Sexo:</label>
                                <select class="form-control">
                                        <option selected>Elige</option>
                                        <option >H</option>
                                        <option >M</option>
                                </select>
                            </div>
                    </div>
<!--##########################################################################-->                  
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label> Email:</label>
                            <input type="email" class="form-control" name="" id="">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Domicilio:</label>
                            <input type="text" class="form-control" name="" id=""placeholder="Calle,Colonia,Número">   
                        </div>
                        
                        <div class="form-group col-md-2">
                            <label>Cel (1):</label>
                            <input type="tel" class="form-control"name="" id=""> 
                        </div>

                        <div class="form-group col-md-2">
                            <label>Cel (2):</label>
                             <input type="tel" class="form-control"name="" id="" placeholder="">
                        </div>

                    </div>
<!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="" id="">   
                        </div>

                        <div class="form-group col-md-3">
                            <label>Lugar de nacimiento:</label>
                            <input type="text" class="form-control" name="" id=""placeholder="Ciudad,Estado">
                        </div>
                        <!--Mejorar-->
                        <div class="form-group col-md-5">
                            <label class=""> Estado civil:</label>
                            <div class="form-check">
                                <input class="form-check-input position-static" type="radio" name="e-civil" id=""><label>Casado</label>
                                <input class="form-check-input position-static" type="radio" name="e-civil" id=""><label>Soltero</label>
                                <input class="form-check-input position-static" type="radio" name="e-civil" id=""><label>Otro</label>
                                <input class="form-check-input position-static" type="radio" name="e-civil" id=""><label>No Hijos</label>
                            </div>
                            <!--input class=""type="radio" class=""name="e-civil" value="casado" id="">
                            <input class=""type="radio" class=""name="e-civil" value="soltero" id="">
                            <input type="radio" class=""name="e-civil" value="otro" id="">
                            <input type="radio" class=""name="e-civil" value="nohijo" id=""-->
                        </div>    
                    </div>
<!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Domicilio actual:</label>
                            <input type="text" class="form-control"placeholder="Calle,Colonia,Numero">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Escolaridad:</label>
                            <select class="form-control">
                                <option selected>Elige</option>
                                <option value="">Preparatoria</option>
                                <option value="">Bachillerato Técnico</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5">
                            <label>Nombre de la institución:</label>
                            <input type="text" class="form-control"name="" id="">
                        </div>

                    </div>
<!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-2">
                            
                            <label class="">Has estado becado:</label>
                            <div class="form-check">
                            <input class="form-check-input position-static"type="radio" name="becado" value="Si"id=""><label>Si</label>
                            <input class="form-check-input position-static"type="radio" name="becado" value="No"id=""><label>No</label>
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Por parte de:</label>
                            <select class="form-control"  name="" id="">
                                <option selected value="">Elige</option>
                                <option  value="">Gobierno Federal</option>
                                <option  value="">Gobierno Estatal</option>
                                <option  value="">Esfuerzos de Bachillerato</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label>Nombre de la Institución:</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>

                        <div class="form-group col-md-5">
                            <label>En el transcurso de tus estudios viviras con:</label>
                            <select class="form-control"  name="" id="">
                                <option selected value="">Selecciona</option>
                                <option  value="">Mi familia</option>
                                <option  value="">Familiares cercanos</option>
                                <option  value="">Otros estudiantes</option>
                                <option  value="">Solo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">

                        </div>

                    </div>
                        
  <!--#######################   form-control en div para encerrar check y radios-->  
  <!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="">Trabajas:</label>
                            <div class="form-check">
                                <input class="form-check-input position-static"type="radio" name="trabaja" value="Si"id=""><label>Si</label>
                                <input class="form-check-input position-static"type="radio" name="trabaja" value="No"id=""><label>No</label>
                            </div>
                        </div>
                        
                              
                              <!-- Default inline 2-->
                        <div class="form-group col-md-4">
                            <label>Nombre de la empresa:</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Horario:</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                    </div>
<!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <br>
                            <label>Máximo grado de estudio de:</label>
                        </div>    
                             
                                  <!-- Default inline 2-->
                            <div class="form-group col-md-3">
                                <label>Padre:</label>
                                <select class="form-control" name="" id="">
                                    <option value=""selected>Selecciona</option>
                                    <option value="">Primaria</option>
                                    <option value="">Secundaria</option>
                                    <option value="">Preparatoria</option>
                                    <option value="">Técnico</option>
                                    <option value="">Licenciatura</option>
                                    <option value="">Posgrado</option>
                                    <option value="">Sin estudios</option>
                                </select>
                                
                            </div>

                            <div class="form-group col-md-3">
                                    <label>Madre:</label>
                                    <select class="form-control" name="" id="">
                                        <option selected>Selecciona</option>
                                        <option value="">Primaria</option>
                                        <option value="">Secundaria</option>
                                        <option value="">Preparatoria</option>
                                        <option value="">Técnico</option>
                                        <option value="">Licenciatura</option>
                                        <option value="">Posgrado</option>
                                        <option value="">Sin estudios</option>
                                    </select>
                                    
                                </div>   
                    </div>
<!--##########################################################################-->
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Actualmente tu:</label>
                            <div class=" form-group form-check">
                                <div class=" form-group col-md-4">
                                    <label>Padre:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="" selected>Selecciona</option>
                                        <option value="">Vive</option>
                                        <option value="">Finado</option>
                                    </select>       
                                </div> 
                                <div class=" form-group col-md-4">
                                    <label>Madre:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="" selected>Selecciona</option>
                                        <option value="">Vive</option>
                                        <option value="">Finado</option>
                                        </select>       
                                </div>
                            </div>
                        </div>   
                           <!--  Empieza segunda columna check-->    
                            <div class="form-group col-md-8">
                            
                                <label>Nombre del lugar de trabajo de:</label>
                                <div class=" form-group form-check ">
                                    <div class="form-group col-md-4">
                                        <label>Padre:</label>
                                            <input class =" form-control"type="text" name="" id="">       
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Madre:</label>
                                        <input class="form-control"type="text" name="" id="">      
                                    </div>
                                </div>
                            </div>        
                    </div>   
                    
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>En caso de accidente avisar a:</label>
                            <div class=" form-check">
                                <div class="form-group col-md-4">
                                    <label>Nombre completo:</label>
                                    <input class =" form-control"type="text" name="" id="">       
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Parentesco:</label>
                                    <select class="form-control"name="" id="">
                                        <option value=""selected>Selecciona</option>
                                        <option value="">Padre</option>
                                        <option value="">Madre</option>
                                        <option value="">Tutor</option>
                                        <option value="">Hermano</option>
                                        <option value="">Hermana</option>
                                        <option value="">Otro</option>
                                    </select>     
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Telefono(s)</label>
                                    <input class="form-control" type="tel" name="" id="">
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class=" btn-group boton col-md-3">
                            <input type="submit" name="grupal" value="Aceptar" class="btn btn-primary"/>
                            <input type="reset" name="reset" value="Cancelar"  class="btn btn-danger"/>
                        </div>
                    </div>
                    
                    <!--TERMINA DATOS PERSONALES-->
                    
            </form>


                        <!--**********************************-->

                    </div>
                    <!--div class="contenido" id="conferencias1">
                        <div class="titulo">Conferencias</div>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Lugares ocupados/disponibles</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Lugar</th>
                                    <th>Tipo de Conferencia</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db=new ConexionBD();
                                $conexion=$db->getConnection();
                                $conferencias=mysqli_query($conexion,"SELECT * FROM informacion_conferencias");
                                echo "<script>console.log('Si jalo no te preocupes');</script>";
                                ?>
                                <?php
                                while($conferencia=mysqli_fetch_assoc($conferencias)):
                                    ?>
                                    <tr>
                                        <form action="inscribir_conf.php" method="post">
                                            <td><?=$conferencia['nombre']?></td>
                                            <td><?=$conferencia['descripcion']?></td>
                                            <td><?=$conferencia['ocupados'].'/'.$conferencia['limite_asistentes']?></td>
                                            <td><?=$conferencia['fecha_hora']?></td>
                                            <td><?=$conferencia['Hora']?></td>
                                            <td><?=$conferencia['lugar']?></td>
                                            <td><?=$conferencia['tipo_desc']?></td>
                                            <td class="form-inline">
                                                <?php
                                                $nc=$_SESSION['usuario']['nc'];
                                                $id=$conferencia['id_conferencia'];
                                                $registros=mysqli_query($conexion,"SELECT Conferencia_id_conferencia as id, Alumno_nc as nc FROM Tutorado_Conferencia WHERE Alumno_nc='$nc' AND Conferencia_id_conferencia=$id");
                                                if (mysqli_num_rows($registros)==0):?>
                                                <button name="inscripcion" value="<?=$_SESSION['usuario']['nc'].','.$conferencia['id_conferencia']?>" class="btn btn-primary">Inscribirme</button>
                                                <?php endif;?>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endwhile;$db->close();?>


                                </tbody>
                            </table>
                        </div>
                    </div-->

                </div>
			</div>	
			<div class="col-md-2">
				<?php require_once  '../includes/menuR-tutorados.php'; ?>
			</div>
			
		

		</div>	

	</div>
	<?php require_once '../includes/pie.php';?>