<?php
include "../helpers/conexion.php";
include "../correo/correo.php";
var_dump($_POST);

if(isset($_POST['grupal'])){
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    for ($i=0;$i<$_POST['grupal'];$i++){
        if (isset($_POST["tutor$i"]) && $_POST["tutor$i"]=="on") {
            $rfc = $_POST["rfc$i"];
            $puesto = mysqli_query($conexion, "SELECT idpuesto_interno FROM puesto_interno WHERE nombre='Tutor'");
            $pues = mysqli_fetch_assoc($puesto);
            $id = $pues['idpuesto_interno'];
            $informacion=mysqli_query($conexion,"SELECT * FROM usuarios WHERE rfc='$rfc'");
            $datos_usuario=mysqli_fetch_assoc($informacion);
            if ($datos_usuario['correo_enviado']==0){
                $mail=new Correo();
                $infor=mysqli_query($conexion,"SELECT * FROM Personal WHERE rfc='$rfc'");
                $infor_personal=mysqli_fetch_assoc($infor);
                $nombre=$infor_personal['nombre'];
                $nombre.=" ".$infor_personal['apellido'];
                $correo=$infor_personal['correo'];
                $contrasena=substr(md5(microtime()),1,10);
                $puesto="Tutor";
                $mail->enviar_correo($correo, $nombre, $contrasena, $rfc, $puesto);
                $actualizar=mysqli_query($conexion,"UPDATE usuarios SET contrasena='$contrasena', correo_enviado=1 WHERE rfc='$rfc'");
            }
            $update = mysqli_query($conexion, "UPDATE usuarios SET puesto_tutor=$id WHERE rfc='$rfc'");
            if ($update) {
                $_SESSION['exito'] = "Se ha realizado la asignacion correctamente";

            } else {
                var_dump($update);
            }
        }
        else{
            $rfc = $_POST["rfc$i"];
            $puesto = mysqli_query($conexion, "SELECT idpuesto_interno FROM puesto_interno WHERE nombre='Tutor'");
            $pues = mysqli_fetch_assoc($puesto);
            $id = $pues['idpuesto_interno'];
            $update = mysqli_query($conexion, "UPDATE usuarios SET puesto_tutor=NULL WHERE rfc='$rfc' ");
            echo mysqli_error($update);
            if ($update) {
                header("Location: vista_asignar_tutores.php");
            } else {
                var_dump($update);
            }
        }
    }
    if (isset($_SESSION['exito'])) {
        $db->close();
        header("Location: vista_asignar_tutores.php");
    }


}