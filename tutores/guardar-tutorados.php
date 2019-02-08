<?php  

	require_once '../helpers/conexion.php';
	$db=new ConexionBD();
	$conexion=$db->getConnection();
	if (isset($_POST['desercion'])){
	$nc = $_POST['desertor'];
	$bandera = $_POST['bandera'];
	$rfc = $_SESSION['usuario']['rfc'];
	$bandera_2 = $_POST['bandera'];

		foreach ($nc as $check) {
	    	foreach ($bandera as $alumnos) {
	    		if($check == $alumnos){
	    			$busqueda = mysqli_query($conexion,"SELECT nc, desertor FROM Alumno_Tutoria WHERE nc = '".$check."' AND acreditado = 0");
	    			if(mysqli_num_rows($busqueda) > 0){
	    				$desertor = mysqli_fetch_assoc($busqueda);
	    				if($desertor['desertor'] == 0){
	    					$ejecutar = mysqli_query($conexion,"UPDATE Alumno_Tutoria SET desertor = 1 WHERE nc ='$check'");
	    				}
	    			}else{
	    				$ejecutar = mysqli_query($conexion,"INSERT INTO Alumno_Tutoria VALUES (null,'$check',1,0,null,'$rfc')");
	    			}
	    			$bandera = array_diff($bandera, array("$check"));
	    		}
	    	}
	}
	foreach ($bandera as $seleccion) {
		$busqueda = mysqli_query($conexion,"SELECT nc, desertor FROM Alumno_Tutoria WHERE nc = '".$seleccion."'");
	    			if(mysqli_num_rows($busqueda) > 0){
	    				$desertor = mysqli_fetch_assoc($busqueda);
	    				if($desertor['desertor'] == 1){
	    					$ejecutar = mysqli_query($conexion,"UPDATE Alumno_Tutoria SET desertor = 0 WHERE nc ='$seleccion'");
	    				}
	    			}
	}
}
	if ($ejecutar){
	    $_SESSION['exito']="Correcto";
	    
	    header("Location:../tutores/listado-tutorados.php");
	}
	else{
	    var_dump(mysqli_error($conexion));
	}
	$db->close();
?>