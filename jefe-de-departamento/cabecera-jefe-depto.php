<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../css/cord-inst.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">

    <?php require_once  '../includes/cabecera-actores.php';
    require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Jefe de Departamento Academico"){
        header("Location:./index.php");
    }?>
    Jefe de Departamento Académico</p>
    </div>
    </div> <!-- /CABECERA -->
    </header>

    </div>

    <div class="container-fluid general">
        <div class="main">
            <div class="col-md-2">
                <?php require_once '../includes/menuL-jefe-dep.php';
                if (isset($_SESSION['exito'])){
                    $exito=$_SESSION['exito'];
                    echo "<script>swal('Atención','$exito','success');</script>";
                    unset($_SESSION['exito']);
                }?>
            </div>