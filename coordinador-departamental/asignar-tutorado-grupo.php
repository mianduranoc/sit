<?php
	
	require_once '../helpers/conexion.php';
	$db=new ConexionBD();
	$conexion=$db->getConnection();
	if (isset($_POST['asigna'])){
	    
	    $nc=$_POST['asignar'];
	   
	    foreach ($nc as $valor) {
	    	$separado = explode("-", $valor);
	    	$aux = mysqli_query($conexion,"SELECT nc FROM Tutorado_Grupo WHERE nc = '".$separado[1]."'");
	    	if(mysqli_num_rows($aux) > 0){
	    			$ejecutar=mysqli_query($conexion,"UPDATE  Tutorado_Grupo SET grupo ='$separado[0]' WHERE nc ='$separado[1]'");
	    	}else{
	    		$ejecutar=mysqli_query($conexion,"INSERT INTO Tutorado_Grupo VALUES ('$separado[1]','$separado[0]')");
	    	}
	    }
	    //echo mysqli_error($conexion);
	    
if ($ejecutar){
	        $_SESSION['exito']="Se ha Guardado correctamente";
	        header("Location:../coordinador-departamental/visualizar-asignar-tutorado.php");
	        return;
	    }
	    $db->close();

	    
	}

?>