<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutorado.css">
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
    <link rel="stylesheet" href="../tutorado/estilos.css"> 
    <style>
        @font-face {
            font-family: Soberana-Condensed-regular;
            src: url(../fuente/soberanasanscondensed_regular.otf);           
		}		
		.titulo{
			font-family: Soberana-Condensed-regular;
            font-size: 2.5em;
            text-align:center;
		}
    </style>  
	<?php require_once  '../includes/cabecera-actores.php';
	require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['Puesto_Interno']!="Tutorado"){
        header("Location:../index.php");
    }?>
	
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
                    require_once "../helpers/conexion.php";
                    ?>
			</div>
			<div class="col-md-8">
                <div class="col-md-1"></div>
                <div class="col-md-10 row">
                    <div class="row titulo">Lista de asistencia a sesiones</div>
                            <table class="table table-hover">
                                <thead class="columnas">
                                    <tr>
                                        <th scope="col">Sesión</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Lugar</th>
                                        <th scope="col">Tutor</th>                                        
                                    </tr>
                                </thead>
                                <tbody class="renglones" >
                                    <?php
                                        $db=new ConexionBD();
                                        $conexion = $db->getConnection();
                                        $alumnos = mysqli_query($conexion, "SELECT DISTINCT s.lugar 
                                        ,s.fecha,s.hora,ts.descripcion as ses, CONCAT(p.nombre,' ',p.apellido) as tutor
                                       FROM Sesion s, Personal p,tipo_sesion ts
                                        where ts.id_tipo_sesion=s.tipo and s.Personal_rfc = p.rfc and 
                                            s.id_sesion in(SELECT Sesion_id_sesion FROM Alumno_Sesion WHERE Alumno_nc = '".$_SESSION['usuario']['nc']."' and asistencia =1)");
                                    ?>
                                    <?php
                                        while($alumno = mysqli_fetch_assoc($alumnos)):
                                            $f1 = explode('-',$alumno['fecha']);
                                            $f2 = $f1[2].'/'.$f1[1].'/'.$f1[0];
                                            $h = substr($alumno['hora'],0,5);
                                    ?>
                                    <tr>
                                        <td><?=$alumno['ses'] ?></td>
                                        <td><?= $f2?></td>
                                        <td><?=$h ?></td>
                                        <td><?=$alumno['lugar'] ?></td>
                                        <td><?=$alumno['tutor'] ?></td>                                       
                                    </tr>
                                    <?php 		                                      
                                        endwhile; $db->close();?>
                                </tbody>
                            </table>                                                    
                    </div>
                    <div class="col-md-1"></div>
				</div> 
            </div>
			<div class="col-md-2">
				<?php require_once  '../includes/menuR-tutorados.php'; ?>
			</div>
			
		

		</div>	

	</div>
	<?php require_once '../includes/pie.php';?>