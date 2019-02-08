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
    <style>
        .titulo{
                text-align:center;
                padding:10px;
            }
    </style>      
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Institucional de Tutorias"){
            header("Location:../index.php");
        }
    ?>
        Coordinador Institucional de Tutorias</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>      
        <?php require_once ("../helpers/conexion.php");
             $db=new ConexionBD();
             $conexion = $db->getConnection(); 
        ?>

        <div class="container-fluid general">
    	    <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-coordinador-inst.php'; ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8">                    
                    
                    <?php
                        // lo de abajo es para ver la tablita                          
                        
                            $vista = mysqli_query($conexion, "CREATE OR REPLACE VIEW alumno_liberado AS SELECT CONCAT(a.apellido,' ',a.nombre) as nombre, a.nc
                            FROM Alumno_Tutoria tg, Alumno a WHERE tg.nc = a.nc and tg.acreditado = 1 and tg.desertor = 0");   
                            $alumnos = mysqli_query($conexion,"SELECT * FROM alumno_liberado ORDER BY nombre");
                    ?>
                    <div class="row titulo">Lista de alumnos </div>                    
                        <table class="table table-hover">
                            <thead class="columnas">
                                <tr>
                                    <th scope="col">Nombre alumno</th>
                                    <th scope="col">Número de control</th>                                                                     
                                </tr>
                            </thead>
                            <tbody class="renglones" >
                                
                                <?php
                                        while($alumno = mysqli_fetch_assoc($alumnos)):                                                                                       
                                ?>                                                                         
                                            <tr>
                                                <td><?=$alumno['nombre'] ?></td>
                                                <td><?=$alumno['nc'] ?></td>                                               						                				                                       
                                            </tr>                                                                                                                             
                                <?php 	                                      
                                        endwhile;
                                   ?>
                            </tbody>
                        </table>                                                 
                        <?php $db->close();?>                         
                </div>
                <div class="col-md-1"></div>                                              				
		    </div>
        </div>
       						

<?php require_once '../includes/pie.php';?>