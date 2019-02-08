<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutorado.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <style type="text/css">
        
    </style>
    <style type="text/css">
        #imagen{
            width:100px;
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
                if (isset($_SESSION['exito'])){
                    $exito=$_SESSION['exito'];
                    echo "<script>window.alert('$exito');</script>";
                    unset($_SESSION['exito']);
                    }?>
			</div>
			<div class="col-md-8 contenido">
                <div class="contenido" id="fichaTutor"> <!---------- Inicio fichaTutor -------->
                        
                        <?php  
                            $db=new ConexionBD();
                        $conexion = $db->getConnection();
                        $nc = $_SESSION['usuario']['nc'];
                        $tutor = mysqli_query($conexion,"SELECT CONCAT(p.nombre,' ',p.apellido) as nombre, p.correo, p.telefono, d.nombre_depto as departamento, p.tel_publico as tel FROM Personal p, Departamento d WHERE p.Departamento_id_depto = d.id_depto AND p.rfc IN (SELECT tt.rfc FROM tutor_tutorado tt, Tutorado_Grupo tg WHERE tg.grupo = tt.id_grupo AND tg.nc = '$nc')");
                        $ficha = mysqli_fetch_assoc($tutor);
                        ?>
                        <div class="row titulo">Datos Generales del Tutor</div>
                        <div class="ficha col-md-9">
                            <div class="row">
                                <div class="col-md-4 ml-0">
                                    <label>Nombre</label>
                                    <p><?=$ficha['nombre']?></p>
                                </div>
                                <div class="col-md-4 ml-0">
                                    <label>Correo Electrónico</label>
                                    <p><?=$ficha['correo']?></p>
                                </div>
                            </div> <!----------------  Primer renglón --------------->
                            <div class="row">
                                <div class="col-md-4 ml-0">
                                    <label>Teléfono</label>
                                    <?php  if($ficha['tel'] == 'S'){
                                        echo "<p>".$ficha['telefono']."</p>";
                                    }else{
                                         echo "<p>Consulte a su tutor</p>";
                                    }
                                    ?>
                                </div>
                                <div class="col-md-5 ml-0">
                                    <label>Oficina</label>
                                    <p><?=$ficha['departamento']?></p>
                                </div>
                            </div> <!---- Segundo renglón ------------------->
                            <div class="row">
                                
                                <div class="col-md-7 ">
                                    <table class="table">
                                        <tr style=" font-size:  16px">
                                            <th scope="col">Lunes</th>
                                            <th scope="col">Martes</th>
                                            <th scope="col">Miercoles</th>
                                            <th scope="col">Jueves</th>
                                            <th scope="col">Viernes</th>
                                        </tr>
                                        <tbody>
                                        <tr style=" font-size:  12px">
                                            <td>7:00 - 8:00</td>
                                            <td>7:00 - 8:00</td>
                                            <td>7:00 - 8:00</td>
                                            <td>7:00 - 8:00</td>
                                            <td>7:00 - 8:00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!---- Tercer renglón ------------------->
                        </div>
                        <div class="col-md-2 imagen-tutor">
                            <div class="ml-0">
                                <img src="../img/tutor.png" alt="Imagen Tutor" id="imagen">
                            </div>
                        </div>
                    </div> <!------------  Fin fichaTutor ----------->
			</div>	
			<div class="col-md-2">
				<?php require_once  '../includes/menuR-tutorados.php'; ?>
			</div>
			
		

		</div>	

	</div>
	<?php require_once '../includes/pie.php';?>