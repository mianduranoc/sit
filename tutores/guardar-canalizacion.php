<?php
if (!isset($_SESSION)){
    session_start();
}
if (isset($_POST)){
    $alumno=$_POST['alumno'];
    $tipocan=$_POST['tipocan'];
    $descripcion=$_POST['descripcion'];
    //var_dump($_POST);
    //var_dump($_SESSION);
    require_once "../helpers/conexion.php";
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $estado=mysqli_query($conexion,"SELECT * FROM Estado WHERE descripcion='Sin atender'");

    $estado=mysqli_fetch_assoc($estado);
    $estado=$estado['id_est'];
    $rfc=$_SESSION['usuario']['rfc'];
    $infoalumno=mysqli_query($conexion,"SELECT correo,nombre FROM Alumno WHERE nc='$alumno'");
    $infoalumno=mysqli_fetch_assoc($infoalumno);
    $nombrealumno=$infoalumno['nombre'];
    $infoalumno=$infoalumno['correo'];

    $opciones=mysqli_query($db->getConnection(),"SELECT Descripcion FROM Tipo_Can WHERE tipo=$tipocan");
    $opciones=mysqli_fetch_assoc($opciones);
    $opciones=$opciones['Descripcion'];
    $insertar=mysqli_query($conexion,"INSERT INTO Canalizacion VALUES(NULL,'$descripcion',$estado,$tipocan,'$alumno','$rfc')");
    if ($insertar){
        require_once "../correo/correo.php";
        $mail=new Correo();
        $mail->enviar_correo_canalizacion($infoalumno,$nombrealumno,$opciones);
        $_SESSION['exito']="Canalizacion registrada con exito";
        header("Location: ver-canalizaciones.php");
        return;
    }
    else{
        $_SESSION['error']="Ocurrio un error al registrar la canalizacion";
        header("Location: canalizar.php");
        var_dump(mysqli_error($conexion));
        return;
    }

}