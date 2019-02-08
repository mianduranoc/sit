<?php
require_once '../helpers/conexion.php';
$db=new ConexionBD();
$conexion=$db->getConnection();
$tipo=0;
var_dump($_POST);
if (isset($_POST['modificar'])){
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descses'];
    $fecha = $_POST['fechases'];
    $hora = $_POST['horases'];
    $lugar = $_POST['lugarses'];
    $duracion = (int)$_POST['duracion'];
    $grupo = $_POST['grupo'];
    $id=$_POST['modificar'];

    $h = $hora[0].$hora[1]."";

    $disponibilidad = mysqli_query($conexion,"SELECT hora, duracion FROM Sesion WHERE id_sesion <> $id AND lugar = '$lugar' AND fecha = '$fecha';");
    if ($disponibilidad) {
        while($opcion=mysqli_fetch_assoc($disponibilidad)){
            var_dump($opcion);
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

    $ejecutar=mysqli_query($conexion,"UPDATE Sesion SET tipo='$tipo',descripcion='$descripcion',fecha='$fecha',hora='$hora',lugar='$lugar',duracion=$duracion, grupo='$grupo' WHERE id_sesion=$id");
    if ($ejecutar){
        $_SESSION['exito']="SESIÓN ACTUALIZADA";
        if($tipo == 1) {
            $ejecutar=mysqli_query($conexion,"UPDATE Alumno_Sesion SET Alumno_nc='$grupo' WHERE Sesion_id_sesion = $id");
        } else {
            $ejecutar=mysqli_query($conexion,"DELETE FROM Alumno_Sesion WHERE Sesion_id_sesion = $id");
            $alumnos =mysqli_query($conexion,"SELECT nc FROM Tutorado_Grupo WHERE grupo ='$grupo'");
            while ($alumno=mysqli_fetch_assoc($alumnos)) {
                $opciones=mysqli_query($conexion,"INSERT INTO Alumno_Sesion(Sesion_id_sesion,Alumno_nc,asistencia,asistencia_tutor) VALUES('$id_sesion','".$alumno['nc']."',0,0)");
            }
        }
    } else {
        $_SESSION["error"] ="ERROR AL ACTUALIZAR LA SESIÓN";
    }
   retorno();
}
if (isset($_POST['eliminar'])){
    $tipo = $_POST['tipo'];
    $id = $_POST['eliminar'];
    $eliminado=mysqli_query($conexion,"DELETE FROM Alumno_Sesion WHERE Sesion_id_sesion = $id");
    $eliminado=mysqli_query($conexion,"DELETE FROM Sesion WHERE id_sesion = $id");
    if ($eliminado){
        $_SESSION['eliminado'] = "SESIÓN ELIMINADA";
    } else {
        $_SESSION["error"] ="ERROR AL ELIMINAR LA SESIÓN";
    }
    retorno();
}
function retorno() {
    if($GLOBALS['tipo'] == 1){
        header("Location: sesion-individual.php");
        return;
    } else {
        header("Location: sesion-grupal.php");
        return;
    }
}