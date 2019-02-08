<?php 
	require_once '../helpers/conexion.php';
	if (!isset($_SESSION)){
	    session_start();
	}
	$aux = $_SESSION['usuario']['puesto_administrativo'];
	$rfc = $_SESSION['usuario']['rfc'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$publico= isset($_POST['publico']) ? $_POST['publico'] : 'off';
	var_dump($_POST);
	echo "$rfc<br>";
	echo "$correo<br>";
	echo "$telefono<br>";
	echo $publico;
	
	$db=new ConexionBD();
	$conexion=$db->getConnection();

	$puestointerno = mysqli_query($conexion,"SELECT idpuesto_interno 
							FROM puesto_interno WHERE puesto_interno.nombre = '$aux'");

	$res = mysqli_fetch_assoc($puestointerno);
	
	if($publico == 'on'){
		$ejecutar=mysqli_query($conexion,"UPDATE Personal SET correo = '$correo',telefono = '$telefono', tel_publico = 'S' 
							WHERE rfc = '$rfc'"); 
							//AND puesto_interno_idpuesto_interno = ".(int)$res['idpuesto_interno']);
	}
	else{
		$ejecutar=mysqli_query($conexion,"UPDATE Personal SET correo = '$correo',telefono = '$telefono', tel_publico = 'N'
						WHERE rfc = '$rfc'");
	}

	if ($ejecutar){
	    $_SESSION['exito']="Datos Actualizados Exitosamente";
	    $db->close();
	    header("Location:../jefe-desarrollo-acad/perfil-personal.php");
	}
	else{
	    var_dump(mysqli_error($conexion));
	}


?>