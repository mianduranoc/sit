<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" href="./img/escudo_itt.png">
	<?php require_once  'includes/cabecera.php';
    ?>
			
		<div class="container">
			<div class="formulario">				
				<form action="./helpers/redireccion.php" method="post" id="inicio">
					<div class="form-group">
						<label>Bienvenido</label>
						<label class="sr-only" for="nc">Usuario</label>
						<input type="text" name="nc" placeholder="Usuario" class="form-control" required>
					</div>

					<div class="form-group">
						<label class="sr-only" for="pass">Contraseña</label>
						<input type="password" name="pass" placeholder="Contraseña" class="form-control">
					</div>
                    <?php if (isset($_SESSION['error'])):?>
                        <div class="alert alert-danger"><strong><?=$_SESSION['error']?></strong></div>
                        <?php unset($_SESSION['error']);endif;?>
					<div class="form-group">
						<input type="submit" name="acept" value="Administrativo" class="btn btn-secondary boton">
						<input type="submit" name="acept" value="Tutor" class="btn btn-secondary boton">
						<input type="submit" name="acept" value="Tutorado" class="btn btn-secondary boton">
					</div>					
				</form>													
			</div>			
		</div>
<?php require_once 'includes/pie.php';?>