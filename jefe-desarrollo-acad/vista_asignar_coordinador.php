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
            <div class="row col-md-9">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div id="calendario"></div>
                </div>
            </div>
        </div>

<div class="col-md-10 contenido" id="tutores">
    <div class="titulo">Asignar Coordinador Institucional de Tutorias</div>
    <div>
        <form method="post" action="guardar_asignacion.php">
            <div class="form-group">
                <label for="personal">Personal</label>
                <select class="form-control" required name="personal" id="personal">
                    <?php
                    $db=new ConexionBD();
                    $conexion=$db->getConnection();
                    $depto=$_SESSION['usuario']['Departamento'];
                    $opciones=mysqli_query($conexion,"SELECT * FROM desasignados_desarrollo WHERE nombre_depto='$depto'");
                    $asignados=mysqli_query($conexion,"SELECT * FROM informacion_administrativo WHERE puesto_administrativo='Coordinador Institucional de Tutorias' and Departamento='$depto'");
                    while($opcion=mysqli_fetch_assoc($opciones)):?>
                        <option value="<?=$opcion['rfc']?>"><?=$opcion['nombre_completo'];?></option>
                    <?php endwhile;?>
                </select>
            </div>
            <div class="form-inline">
                <input name="guardar" id="asignado"<?php if (mysqli_num_rows($asignados)!=0):?> disabled <?php endif;?> type="submit" class="btn btn-primary" value="Asignar">
            </div>
        </form>
    </div>
    <hr>
    <div>
        <h2>Coordinador Actual</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $depto=$_SESSION['usuario']['Departamento'];
                $opciones=mysqli_query($conexion,"SELECT * FROM informacion_administrativo WHERE puesto_administrativo='Coordinador Institucional de Tutorias' and Departamento='$depto'");
                while($opcion=mysqli_fetch_assoc($opciones)):?>
                    <form action="guardar_asignacion.php" method="post">
                        <td><label><?=$opcion['rfc'];?></label></td>
                        <td><label><?=$opcion['nombre'];?></label></td>
                        <td><label><?=$opcion['apellido'];?></label></td>
                        <td class="form-inline">
                            <button name="eliminar" value="<?=$opcion['rfc'];?>"  class="btn btn-danger form-group">Eliminar</button>
                        </td>
                    </form>
                <?php endwhile;?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</html>
<?php require_once '../includes/pie.php';?>