<?php  

	require_once '../helpers/conexion.php';
	$db=new ConexionBD();
	$conexion=$db->getConnection();
	if (isset($_POST['liberar'])){
	$nc = $_POST['liberado'];
	$bandera = $_POST['bandera'];
	$rfc = $_SESSION['usuario']['rfc'];

		foreach ($nc as $check) {
	    	foreach ($bandera as $alumnos) {
	    		if($check == $alumnos){
	    			$busqueda = mysqli_query($conexion,"SELECT nc, acreditado FROM Alumno_Tutoria WHERE nc = '".$check."' AND desertor = 0");
	    			if(mysqli_num_rows($busqueda) > 0){
	    				$acreditado = mysqli_fetch_assoc($busqueda);
	    				if($acreditado['acreditado'] == 0){
	    					$ejecutar = mysqli_query($conexion,"UPDATE Alumno_Tutoria SET acreditado = 1 WHERE nc ='$check'");
	    				}
	    			}else{
	    				$ejecutar = mysqli_query($conexion,"INSERT INTO Alumno_Tutoria VALUES (null,'$check',0,1,null,'$rfc')");
	    			}
	    			$bandera = array_diff($bandera, array("$check"));
	    		}
	    	}
	}
	foreach ($bandera as $seleccion) {
		$busqueda = mysqli_query($conexion,"SELECT nc, acreditado FROM Alumno_Tutoria WHERE nc = '".$seleccion."' AND desertor = 0");
	    			if(mysqli_num_rows($busqueda) > 0){
	    				$acreditado = mysqli_fetch_assoc($busqueda);
	    				if($acreditado['acreditado'] == 1){
	    					$ejecutar = mysqli_query($conexion,"UPDATE Alumno_Tutoria SET acreditado = 0 WHERE nc ='$seleccion'");
	    				}
	    			}
	}
}
	if ($ejecutar){
	    $_SESSION['exito']="Correcto";
	    
	    header("Location:../tutores/liberar-tutorados.php");
	}
	else{
	    var_dump(mysqli_error($conexion));
	}
	$db->close();
?>