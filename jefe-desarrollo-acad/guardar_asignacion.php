<?php
include "../helpers/conexion.php";
include "../correo/correo.php";
if (isset($_POST['eliminar'])){
    var_dump($_POST);
    $rfc=$_POST['eliminar'];
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $eliminar=mysqli_query($conexion,"UPDATE usuarios SET puesto_administrativo=NULL WHERE rfc='$rfc';");
    echo mysqli_error($conexion);
    if ($eliminar){
        $_SESSION['exito']="Se ha eliminado correctamente la asignacion";
    }
}
elseif(isset($_POST['guardar'])) {
    $rfc = $_POST['personal'];
    $db = new ConexionBD();
    $conexion = $db->getConnection();
    $puesto = mysqli_query($conexion, "SELECT idpuesto_interno FROM puesto_interno WHERE nombre='Coordinador Institucional de Tutorias'");
    $pues = mysqli_fetch_assoc($puesto);
    $id_puesto = $pues['idpuesto_interno'];
    $id = $pues['idpuesto_interno'];
    $informacion = mysqli_query($conexion, "SELECT * FROM usuarios WHERE rfc='$rfc'");
    $datos_usuario = mysqli_fetch_assoc($informacion);
    if ($datos_usuario['correo_enviado'] == 0) {
        $mail = new Correo();
        $infor = mysqli_query($conexion, "SELECT * FROM Personal WHERE rfc='$rfc'");
        $infor_personal = mysqli_fetch_assoc($infor);
        $nombre = $infor_personal['nombre'];
        $nombre .= " " . $infor_personal['apellido'];
        $correo = $infor_personal['correo'];
        $contrasena = substr(md5(microtime()), 1, 10);
        $puesto = 'Coordinador Institucional';
        $mail->enviar_correo($correo, $nombre, $contrasena, $rfc, $puesto);
        $actualizar = mysqli_query($conexion, "UPDATE usuarios SET contrasena='$contrasena', correo_enviado=1 WHERE rfc='$rfc'");
    }
    $insertar = mysqli_query($conexion, "UPDATE usuarios SET puesto_administrativo=$id_puesto WHERE rfc='$rfc';");
    if ($insertar) {
        $_SESSION['exito'] = "Se ha realizado la asignacion correctamente";

    } else {
        var_dump($insertar);
    }
}
if (isset($_SESSION['exito'])){
    $db->close();
    header("Location: vista_asignar_coordinador.php");
}