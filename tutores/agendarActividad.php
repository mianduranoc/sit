<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../css/tutore.css">
    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <?php require_once  '../includes/cabecera-actores.php';
    require_once "../helpers/conexion.php";
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_tutor']!="Tutor"){
        header("Location:../index.php");
    }
    ?>

    Tutor</p>
    </div>
    </div> <!-- /CABECERA -->
    </header>
    </div>


    <div class="container-fluid general">
        <div class="main">
            <div class="col-md-2">
                <?php require_once  '../includes/menuL-tutores.php';
                ?>
            </div>
            <div class="col-md-8">
                <div class="titulo">Agendar Actividad</div>
                <div class="col-md-12"><br><br>
                    <form method="post" action="agendar.php">
                        <div class="row form-group">
                            <label for="fecha_inicio">Fecha de inicio</label>
                            <?php
                            $dia=date("d");$mes=date("m");$anio=date("Y");
                            $fecha="$anio"."-"."$mes"."-"."$dia"; ?>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" min="<?=$fecha?>" value="<?=$fecha?>">
                        </div><br>
                        <div class="row">
                            <label for="fecha_fin">Fecha de finalización</label>
                            <input type="date" name="fecha_fin" class="form-control" id="fecha_inicio" min="<?=$fecha?>" value="<?=$fecha?>">
                        </div><br>

                        <div class="row">
                            <label for="actividad">Actividad:</label>
                            <select name="actividad" class="form-control" id="actividad">
                                <?php
                                $db=new ConexionBD();
                                $conexion=$db->getConnection();
                                $sql=mysqli_query($conexion,"SELECT * FROM Actividad");
                                while($actividad=mysqli_fetch_assoc($sql)):
                                    ?>
                                    <option value="<?=$actividad['id_act'];?>"><?=$actividad['nombre'];?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group text-center" style="margin-top: 10%">
                            <button type="submit" name="agendar" class="btn btn-primary btn-success" value="1">Agendar</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-2">
                <?php require_once  '../includes/menuR-tutores.php'; ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container pie">
            <p class="col-md-12">AV. TECNOLÓGICO # 2595, COL. LAGOS DEL COUNTRY. TEPIC, NAYARIT. MÉXICO. C.P. 63175. TEL: (311) 211 94 00. DIRECCION@ITTEPIC.EDU.MX</p>
        </div>
    </footer>

    </body>
</html>