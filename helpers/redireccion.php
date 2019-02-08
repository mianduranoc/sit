<?php
    require_once ("conexion.php");
    unset($_SESSION['error']);
    if (isset($_POST['nc'])&& isset($_POST['pass'])) {
        $usuario = $_POST['nc'];
        $usuario=strtoupper($usuario);
        $contrasena = $_POST['pass'];
    }
    else{
        $_SESSION['error']="Datos Invalidos";
        header("Location:../index.php");
    }
    $conexion=new ConexionBD();
    if ($_POST['acept']=="Administrativo"){
        $usuarios=mysqli_query($conexion->getConnection(),"SELECT * FROM informacion_administrativo WHERE rfc='$usuario'");
        $query=mysqli_query($conexion->getConnection(),"SELECT primera_vez FROM usuarios WHERE rfc='$usuario'");
        $resul=mysqli_fetch_assoc($query);
        $primera=$resul['primera_vez'];
        if (mysqli_num_rows($usuarios)>0){
            while($seleccionado=mysqli_fetch_assoc($usuarios)){
                if ($seleccionado['rfc']==$usuario && $seleccionado['contrasena']==$contrasena && obtenerPuesto($seleccionado)){
                    switch ($seleccionado['puesto_administrativo']){
                        case "Coordinador Departamental de Tutorias":
                            $_SESSION['usuario']=$seleccionado;
                            if ($primera==1){
                                $conexion->close();
                                header("Location: ../primer_ingreso.php");
                                return;
                                break;
                            }
                            else{
                                $conexion->close();
                                header("Location:../coordinador-departamental/coordinador-depto.php");
                            }
                            return;
                            break;
                        case "Jefe de Departamento Desarrollo Academico":
                            $_SESSION['usuario']=$seleccionado;
                            if ($primera==1){
                                $conexion->close();
                                header("Location: ../primer_ingreso.php");
                                return;
                                break;
                            }
                            else {
                                $conexion->close();
                                header("Location:../jefe-desarrollo-acad/jefe-desarrollo-acad.php");
                            }
                            return;
                            break;
                        case "Coordinador Institucional de Tutorias":
                            $_SESSION['usuario']=$seleccionado;
                            if ($primera==1){
                                $conexion->close();
                                header("Location: ../primer_ingreso.php");
                                return;
                                break;
                            }
                            else {
                                $conexion->close();
                                header("Location:../coordinador-institucional/coordinador-inst.php");
                            }
                            return;
                            break;
                        case "Jefe de Departamento Academico":
                            $_SESSION['usuario']=$seleccionado;
                            if ($primera==1){
                                $conexion->close();
                                header("Location: ../primer_ingreso.php");
                                return;
                                break;
                            }
                            else {
                                $conexion->close();
                                header("Location:../jefe-de-departamento/jefe-departamento.php");
                            }
                            return;
                            break;
                    }

                }
            }
            $conexion->close();
            $_SESSION['error']="Datos Invalidos en el tipo de usuario";
            header("Location:../index.php");
        }
        else{
            $conexion->close();
            $_SESSION['error']="Datos Invalidos";
            header("Location:../index.php");
        }
    }
    elseif ($_POST['acept']=="Tutorado"){
        $usuarios=mysqli_query($conexion->getConnection(),"SELECT * FROM Alumno WHERE nc='$usuario'");
        if (mysqli_num_rows($usuarios)>0){
            $seleccionado=mysqli_fetch_assoc($usuarios);
            if ($seleccionado['nc']==$usuario && $seleccionado['nip']==$contrasena ){
                $_SESSION['usuario']=$seleccionado;
                $conexion->close();
                $_SESSION['usuario']['Puesto_Interno']="Tutorado";
                header("Location: ../tutorado/tutorados.php");
                return;
            }
            $conexion->close();
            $_SESSION['error']="Datos Invalidos";
            header("Location:../index.php");
        }
        else{
            $conexion->close();
            $_SESSION['error']="Datos Invalidos";
            header("Location:../index.php");
        }
    }
    elseif ($_POST['acept']=="Tutor"){
        $usuarios=mysqli_query($conexion->getConnection(),"SELECT * FROM informacion_tutores WHERE rfc='$usuario' AND puesto_tutor='Tutor'");
        if (mysqli_num_rows($usuarios)>0){
            $seleccionado=mysqli_fetch_assoc($usuarios);
            $query=mysqli_query($conexion->getConnection(),"SELECT primera_vez FROM usuarios WHERE rfc='$usuario'");
            $resul=mysqli_fetch_assoc($query);
            $primera=$resul['primera_vez'];
                if ($seleccionado['rfc']==$usuario && $seleccionado['contrasena']==$contrasena ){
                    $_SESSION['usuario']=$seleccionado;
                    if ($primera==1){
                        $conexion->close();
                        header("Location: ../primer_ingreso.php");
                        return;
                    }
                    else {
                        $conexion->close();
                        header("Location: ../tutores/tutores.php");
                    }
                    return;
                }
            $conexion->close();
            $_SESSION['error']="Datos Invalidos";
            header("Location:../index.php");
        }
        else{
            $conexion->close();
            $_SESSION['error']="Datos Invalidos";
            header("Location:../index.php");
        }
    }

    function obtenerPuesto($seleccionado){
        $puestos=array('Coordinador Departamental de Tutorias','Coordinador Institucional de Tutorias','Jefe de Departamento Academico','Jefe de Departamento Desarrollo Academico');
        foreach ($puestos as $puesto){
            $esta=($seleccionado['puesto_administrativo']==$puesto);
            if ($esta){
                return true;
            }
        }
        return false;
    }

?>