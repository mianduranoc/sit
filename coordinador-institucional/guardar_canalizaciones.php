<?php
include "../helpers/conexion.php";
include "../correo/correo.php";
var_dump($_POST);

if(isset($_POST['guardar'])){
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    for ($i=0;$i<$_POST['guardar'];$i++){
        if (isset($_POST["bandera$i"]) && $_POST["desertor$i"]=="on") {
            $nc = $_POST["bandera$i"];
            $puesto = mysqli_query($conexion, "SELECT id_est FROM Estado WHERE descripcion='Atendida'");
            $pues = mysqli_fetch_assoc($puesto);
            $id = $pues['id_est'];
            $actual = mysqli_query($conexion, "SELECT Estado_id_est FROM Canalizacion WHERE Alumno_nc='$nc'");
            $actual = mysqli_fetch_assoc($actual);
            $actual = $actual['Estado_id_est'];
            $infoalumno=mysqli_query($conexion,"SELECT correo,nombre FROM Alumno WHERE nc='$nc'");
            $infoalumno=mysqli_fetch_assoc($infoalumno);
            $nombrealumno=$infoalumno['nombre'];
            $infoalumno=$infoalumno['correo'];
            $update = mysqli_query($conexion, "UPDATE Canalizacion SET Estado_id_est=$id WHERE Alumno_nc='$nc'");
            if ($update) {
                if ($actual!=$id){
                    $mail=new Correo();
                    $mail->enviar_correo_canalizacion_cambio($infoalumno,$nombrealumno,"Atendida");
                }
                $_SESSION['exito'] = "Se ha actualizado el estado de la Canalizacion";

            } else {
                var_dump($update);
            }
        }
        else{
            $nc = $_POST["bandera$i"];
            $puesto = mysqli_query($conexion, "SELECT id_est FROM Estado WHERE descripcion='Sin atender'");
            $pues = mysqli_fetch_assoc($puesto);
            $id = $pues['id_est'];
            $infoalumno=mysqli_query($conexion,"SELECT correo,nombre FROM Alumno WHERE nc='$nc'");
            $infoalumno=mysqli_fetch_assoc($infoalumno);
            $nombrealumno=$infoalumno['nombre'];
            $infoalumno=$infoalumno['correo'];
            $actual = mysqli_query($conexion, "SELECT Estado_id_est FROM Canalizacion WHERE Alumno_nc='$nc'");
            $actual = mysqli_fetch_assoc($actual);
            $actual = $actual['Estado_id_est'];
            $update = mysqli_query($conexion, "UPDATE Canalizacion SET Estado_id_est=$id WHERE Alumno_nc='$nc'");
            echo mysqli_error($update);
            if ($update) {
                if ($actual!=$id){
                    $mail=new Correo();
                    $mail->enviar_correo_canalizacion_cambio($infoalumno,$nombrealumno,"Sin atender");
                }
                $_SESSION['exito'] = "Se ha actualizado el estado de la Canalizacion";
                header("Location: canalizaciones.php");
            } else {
                var_dump($update);
            }
        }
    }
    if (isset($_SESSION['exito'])) {
        $db->close();
        header("Location: canalizaciones.php");
    }


}