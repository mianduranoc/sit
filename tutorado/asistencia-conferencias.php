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
                <div class="row titulo">Lista de asistencia a conferencias</div>
                        <table class="table table-hover">
                            <thead class="columnas">
                                <tr>
                                    <th scope="col">Evento</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">Grupo</th>                                    
                                </tr>
                            </thead>
                            <tbody class="renglones" >
                                <?php
                                    if(isset($_SESSION['lista'])){
                                        echo "<script>swal('Correcto!', '¡Asistencia registrada!', 'success');</script>";
                                        unset($_SESSION['lista']);
                                    }
                                    $db=new ConexionBD();
                                    $conexion = $db->getConnection();                                    
                                    $grupos = mysqli_query($conexion, "SELECT DISTINCT c.id_conferencia, t.descripcion as evento,c.nombre as titulo, c.fecha_hora as fecha, c.hora,l.nombre as lugar, cg.id_grupo as grupo
                                    FROM Conferencia c, lugares l, Tutorado_Conferencia tc, Grupo_Conferencia cg, Tipo_Conferencia t
                                    WHERE c.id_conferencia = tc.id_conferencia and l.id_lugar = c.lugar and t.id_tipo_conf=c.Tipo_Conferencia_id_tipo_conf and cg.Conferencia_id_conferencia = c.id_conferencia and tc.asistencia=1 and tc.nc = '".$_SESSION['usuario']['nc']."'");                                    
                                ?>
                                <?php
                                    while($grupo = mysqli_fetch_assoc($grupos)):     
                                        $f1 = explode('-',$grupo['fecha']);
                                        $f2 = $f1[2].'/'.$f1[1].'/'.$f1[0];
                                        $h = substr($grupo['hora'],0,5);                                                                           
                                ?>                                   
                                        <tr>
                                            <td><?=$grupo['evento'] ?></td>
                                            <td><?=$grupo['titulo'] ?></td>
                                            <td><?=$f2 ?></td>
                                            <td><?=$h ?></td>
                                            <td><?=$grupo['lugar'] ?></td>
                                            <td><?=$grupo['grupo'] ?></td>                                                  
                                        </tr>                                       
                                <?php	                                      
                                    endwhile;$db->close();?>
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