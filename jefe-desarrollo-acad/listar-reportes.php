<!DOCTYPE html>

<html lang="es">
<head><link rel="shortcut icon" href="../img/escudo_itt.png"></head>
<div>

    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">
    <?php require_once  '../includes/cabecera-actores.php';
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Jefe de Departamento Desarrollo Academico"){
        header("Location:../index.php");
    }
    ?>
    Jefe Departamento Desarrollo Academico</p>
</div>
</html> <!-- /CABECERA -->
</header>

</div>
<?php require_once ("../helpers/conexion.php"); ?>

<div class="container-fluid general">
    <div class="main">
        <div class="col-md-2 mmenu">
            <?php require_once  '../includes/menuL-jefe-dep-acad.php'; ?>
            <?php
            if (isset($_SESSION['exito'])){
                $exito=$_SESSION['exito'];
                echo "<script>swal('Atención','$exito','success');</script>";
                unset($_SESSION['exito']);
            }?>
        </div>
<div class="col-md-10 contenido">
    <div class=" container-fluid" id="listado-tutorados">
        <form method="POST" action="visualizar-asignar-tutorado.php">
            <div class="row titulo">Listado de Tutorados</div>
            <div class="row">

                <select name="id_carrera" class="asignar" onchange = "d1(this)" style="width: 13em;margin-left: 75%;">
                    <option value="0">Seleccione Carrera</option>
                    <?php

                    $db=new ConexionBD();
                    $conexion=$db->getConnection();
                    $carreras=mysqli_query($conexion,"SELECT * FROM Carrera");

                    while($carrera=mysqli_fetch_assoc($carreras)):?>

                        <option value="<?=$carrera['id_carrera']?>"><?=$carrera['nombre'];?></option>
                    <?php endwhile;?>
                </select><input type="submit" name="buscar" class= 'btn btn-primary' id= 'buscar' value='Buscar' style="margin-left: 2%; height: 3.5vh;">

            </div>
        </form>
    </div>
</div>
    </div>
</div>
        </html>
<?php require_once '../includes/pie.php';?>