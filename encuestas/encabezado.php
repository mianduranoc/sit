<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../css/tutorado.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <script type="text/javascript" src="../scripts/tutorados.js"></script>
<?php require_once  '../includes/cabecera-actores.php';
require_once "../helpers/conexion.php";
?>
    Encuesta</p>
    </div>
    </div> <!-- /CABECERA -->
    </header>

    </div>

    <!-- COMIENZA CONTENEDOR PRINCIPAL -->
    <div class="container-fluid general">
        <div class="main">
            <div class="col-md-2">
                <?php require_once  '../includes/menuL-encuesta.php';
                if (isset($_SESSION['exito'])){
                    $exito=$_SESSION['exito'];
                    echo "<script>window.alert('$exito');</script>";
                    unset($_SESSION['exito']);
                }?>
            </div>
