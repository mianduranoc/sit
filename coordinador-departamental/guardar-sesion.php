<?php
require_once '../helpers/conexion.php';
if (!isset($_SESSION)){
    session_start();
}

$tipo = $_POST['tipo'];
$descripcion = $_POST['descses'];
$fecha = $_POST['fechases'];
$fecha = date('Y-m-d',strtotime($fecha));
$hora = $_POST['horases'];
$hora = date('H:i',strtotime($hora));
$lugar = $_POST['lugarses'];
$duracion = $_POST['duracion'];
$grupo = $_POST['grupo'];
$rfc=$_SESSION['usuario']['rfc'];

$db=new ConexionBD();
$conexion=$db->getConnection();

$h = $hora[0].$hora[1]."";

$disponibilidad = mysqli_query($conexion,"SELECT hora, duracion FROM Sesion WHERE lugar = '$lugar' AND fecha = '$fecha';");
if ($disponibilidad) {
    while($opcion=mysqli_fetch_assoc($disponibilidad)){
        $aux = $opcion['hora'];
        $auxh = $aux[0].$aux[1].""; 
        $auxd = $opcion['duracion'];
        if ($auxd <= 60) {
            if ($h == $auxh) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+1);
                return retorno();
            }
        }
        if ($auxd <= 120 && $auxd > 60) {
            if ($h == ($auxh+1) || $h == $auxh) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+2);
                return retorno();
            }
        }
        if ($auxd <= 180 && $auxd > 120) {
            if ($h== ($auxh+2 || $h == ($auxh+1) || $h == $auxh)) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+3);
                return retorno();
            }
        }
        if ($auxd <= 240 && $auxd > 180) {
            if ($h== ($auxh+3) || $h== ($auxh+2 || $h == ($auxh+1) || $h == $auxh)) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+4);
                return retorno();
            }
        }
        if ($auxd <= 300 && $auxd > 240) {
            if ($h== ($auxh+4) || $h== ($auxh+3) || $h== ($auxh+2 || $h == ($auxh+1) || $h == $auxh)) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+5);
                return retorno();
            }
        }
        if ($auxd <= 360 && $auxd > 300) {
            if ($h== ($auxh+5) || $h== ($auxh+4) || $h== ($auxh+3) || $h== ($auxh+2 || $h == ($auxh+1) || $h == $auxh)) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+6);
                return retorno();
            }
        }
        if ($auxd <= 420 && $auxd > 360) {
            if ($h== ($auxh+6) || $h== ($auxh+5) || $h== ($auxh+4) || $h== ($auxh+3) || $h== ($auxh+2 || $h == ($auxh+1) || $h == $auxh)) {
                $_SESSION["error"] = "YA ESTÁ OCUPADO ESE LUGAR, DESDE LAS ".$auxh." HASTA LAS ".($auxh+7);
                return retorno();
            }
        }
    } 
}

$ejecutar=mysqli_query($conexion,"INSERT INTO Sesion VALUES(NULL,'$fecha','$lugar','$tipo','$descripcion','$rfc', $duracion,'$grupo', 0, '$hora');");
if ($ejecutar){ 
    $_SESSION["guardar"] = "SESIÓN GUARDADA";
    $id_sesion = mysqli_query($conexion,"SELECT MAX(id_sesion) as id FROM Sesion");     
    $id_sesion = mysqli_fetch_assoc($id_sesion);
    $id_sesion = $id_sesion['id'];
    if($tipo == 1){
        $opciones=mysqli_query($conexion,"INSERT INTO Alumno_Sesion(Sesion_id_sesion,Alumno_nc,asistencia,asistencia_tutor) VALUES('$id_sesion','".$grupo."',0,0)");
    } else {
        $alumnos =mysqli_query($conexion,"SELECT nc FROM Tutorado_Grupo WHERE grupo ='$grupo'");
        while ($alumno=mysqli_fetch_assoc($alumnos)) {
            $opciones=mysqli_query($conexion,"INSERT INTO Alumno_Sesion(Sesion_id_sesion,Alumno_nc,asistencia,asistencia_tutor) VALUES('$id_sesion','".$alumno['nc']."',0,0)");
        }
    }
}
else{
    $_SESSION["error"] ="ERROR AL CREAR LA SESIÓN";
}
retorno();

function retorno() {
    header("Location: sesion-grupal.php");
    return;
}