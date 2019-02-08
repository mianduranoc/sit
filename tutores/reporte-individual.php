<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="../css/tutore.css">
	<script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
	<script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
	<script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">  
    <link rel="shortcut icon" href="../img/escudo_itt.png">
	<?php require_once  '../includes/cabecera-actores.php';
	require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_tutor']!="Tutor"){
        header("Location:../index.php");
    }
    ?>
	
	Tutor</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>
	</div>
	

		<div class="container-fluid general">
			<div class="main">
				<div class="col-md-2">
					<?php require_once  '../includes/menuL-tutores.php'; 
					// esto es nuevo inicio
						if (isset($_SESSION['ok'])){
							$exito=$_SESSION['ok'];							
							echo "<script>swal('$exito', 'Reporte individual registrado!', 'success');</script>";
							unset($_SESSION['ok']);
						}elseif(isset($_SESSION['error']['sesion'])){
							$err = $_SESSION['error']['sesion'];
							echo "<script>swal('Ups!', 'OLVIDO $err!', 'error');</script>";
							unset($_SESSION['error']['sesion']);
						}elseif(isset($_SESSION['error']['desc'])){
							$err = $_SESSION['error']['desc'];
							echo "<script>swal('Ups!', 'OLVIDO $err!', 'error');</script>";
							unset($_SESSION['error']['desc']);
						}
						// esto es nuevo fin
					?>
				</div>
				<div class="col-md-8">


                    <div id="rindividual">
							<h3>REPORTE DE SESION INDIVIDUAL</h3>
							<form action="../tutores/reporteind.php" method="POST">
								<div class="form-group select">
									<label for="sesion">Seleccione la sesion</label>
									<select class="form-control" required name="sesion" id="idSesionI">										
										<?php
                                            $db=new ConexionBD();
											$conexion=$db->getConnection();
											$sql="SELECT DISTINCT s.id_sesion, s.tipo,s.estado,s.fecha,a.nombre,a.apellido FROM Alumno a,Alumno_Sesion als,Sesion s, Personal p where a.nc=als.Alumno_nc  and s.estado =0 and s.tipo =1 and als.Sesion_id_sesion=s.id_sesion and s.Personal_rfc = p.rfc and p.rfc ="."'".$_SESSION['usuario']['rfc']."'";
											$opciones=mysqli_query($db->getConnection(),$sql);
											$c=0;
                                            while($opcion=mysqli_fetch_assoc($opciones)):$c++;?>	
											<!-- SE AGREGAN LOS VALORES DEL SELECT  -->			   																							
                                               		<option value="<?=$opcion['id_sesion']?>">Sesion con <?=$opcion['nombre'];?> <?=$opcion['apellido'];?> ( <?=$opcion['fecha'];?> )</option>											
											<?php endwhile;$db->close();if($c==0):?>    
												<option selected="selected" value="x">
													No hay sesiones registradas
												</option>
											<?php endif;?>
										
									</select>
						
								</div>
								<div class="form-group">
									<label for="desc">Descripcion de la sesion</label>
									<textarea  class="form-control" placeholder="Escriba aquí su reporte" name="desc" id="descIn" cols="30" rows="10"></textarea>									
								</div>
								<div class="form-group btn-group boton">
								<input type="submit" id="individual" name="individual" class="btn btn-success" value="Aceptar"/>
									<input type="reset" name="resetIndividual" id="resetIndividual" class="btn btn-danger" value="Cancelar"/>								
								</div>							
							</form>
							
			    	</div>
                </div>
				
                <div class="col-md-2">
                    <?php require_once  '../includes/menuR-tutores.php'; ?>
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