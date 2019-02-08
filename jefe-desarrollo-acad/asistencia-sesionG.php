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
                        if(isset($_POST['btnVer'])){
                            $ses_gpo = explode('-',$_POST['btnVer']);
                        }
                    ?>
                    <div class="row titulo">Lista de asistencia grupo <?=$ses_gpo[1]?></div>
                        <table class="table table-hover">
                            <thead class="columnas">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Número de control</th>                                    
                                </tr>
                            </thead>
                            <tbody class="renglones" >
                                <?php
                                    $db=new ConexionBD();
                                    $conexion = $db->getConnection();
                                    if(isset($_POST['btnVer'])):
                                        $id_sesion = $ses_gpo[0];
                                        $vista = mysqli_query($conexion,"CREATE OR REPLACE VIEW lista_asisgrupo AS 
                                        SELECT CONCAT(a.apellido,' ',a.nombre) as nombre,a.nc 
                                        FROM Alumno a, Alumno_Sesion als WHERE als.asistencia=1 
                                        and als.Alumno_nc=a.nc and als.Sesion_id_sesion='$id_sesion'");
                                        $alumnos = mysqli_query($conexion, "SELECT * FROM lista_asisgrupo ORDER BY nombre");
                                ?>
                                <?php
                                    while($alumno = mysqli_fetch_assoc($alumnos)):                                           
                                ?>
                                <tr>
                                    <td><?=$alumno['nombre'] ?></td>
                                    <td><?=$alumno['nc'] ?></td>                                       
                                </tr>
                                <?php 		                                      
                                    endwhile;endif; $db->close();?>
                            </tbody>
                        </table>                   
                </div>
                <div class="col-md-1"></div>                                              				
		    </div>
        </div>
       						

<?php require_once '../includes/pie.php';?>