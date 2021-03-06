<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Sesiones</title>
    <link rel="stylesheet" type="text/css" href="../css/tutore.css">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <script src="../scripts/sesiones.js"></script>
    <?php 
        require_once  '../includes/cabecera-actores.php';
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
                    if(isset($_SESSION["guardar"])){
                        $mensaje = $_SESSION["guardar"];
                        echo"<script>swal('Correcto','$mensaje','success');</script>";
                        unset($_SESSION["guardar"]);
                    }elseif(isset($_SESSION["error"])) {
                        $mensaje = $_SESSION["error"];
                        echo"<script>swal('Error','$mensaje','error');</script>";
                        unset($_SESSION["error"]);
                    }if(isset($_SESSION["exito"])){
                        $mensaje = $_SESSION["exito"];
                        echo"<script>swal('Correcto','$mensaje','success');</script>";
                        unset($_SESSION["exito"]);
                    }elseif (isset($_SESSION["eliminado"])) {
                        $mensaje = $_SESSION["eliminado"];
                        echo"<script>swal('Correcto','$mensaje','success');</script>";
                        unset($_SESSION["eliminado"]);
                    }
                ?>
            </div>
            <div class="col-md-8">
                <div class="contenido" id="sesiones">
                    <div class="titulo">Sesiones Grupales</div>
                    <div>
                        <form method="post" action="guardar-sesion.php" onsubmit="return validar(this)">
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="tipo" id="tipo" value="2">
                                </div>
                            <div class="form-group">
                                <label for="descses">Descripción:</label>
                                <textarea class="form-control" name="descses" required id="descses"></textarea>
                            </div>
                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="fechases">Fecha de la Sesión:</label>
                                    <input type="date" class="form-control"  name="fechases" required id="fechases">
                                </div>
                                <div class="form-group">
                                    <label for="horases">Hora de la Sesión:</label>
                                    <input type="time" class="form-control" required name="horases" id="horases">
                                </div>
                                <div class="form-group">
                                    <label for="lugarses">Lugar de la Sesión:</label>
                                    <input type="text" class="form-control" required name="lugarses" id="lugarses">
                                </div>
                                <div class="form-group">
                                    <label for="duracion">Duración:</label>
                                    <input type="number" class="form-control" required name="duracion" id="duracion" placeholder="minutos">
                                </div>
                                <div class="form-group">
                                    <label for="grupo">Grupo:</label>
                                    <select class="form-control" required name="grupo" id="grupo">
                                        <?php
                                            $db=new ConexionBD();
                                            $conexion=$db->getConnection();
                                            $rfc=$_SESSION['usuario']['rfc']; 
                                            $opciones=mysqli_query($db->getConnection(),"SELECT * FROM tutor_tutorado WHERE rfc = '$rfc'");
                                            while($opcion=mysqli_fetch_assoc($opciones)):?>
                                                <option value="<?=$opcion['id_grupo']?>"><?=$opcion['id_grupo'];?></option>
                                        <?php endwhile;$db->close();?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline">
                                <input name="informacion" type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Lugar</th>
                                    <th>Duración</th>
                                    <th>Grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $db=new ConexionBD();
                                    $conexion=$db->getConnection();
                                    $rfc=$_SESSION['usuario']['rfc'];
                                    $hoy = getdate();
                                    $hoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
                                    $sesiones=mysqli_query($conexion,"SELECT * FROM Sesion WHERE grupo IN (SELECT id_grupo FROM tutor_tutorado WHERE rfc ='$rfc') AND tipo = 2 AND fecha >= DATE('$hoy')");
                                ?>
                                <?php
                                    while($sesion=mysqli_fetch_assoc($sesiones)):
                                ?>
                                <tr>
                                    <form action="modificar-sesion.php" method="post" onsubmit="return validar(this)">
                                        <td><input type="text" name="descses"  required id="descses" value="<?=$sesion['descripcion']?>"></td>
                                        <td><input type="date"  name="fechases" style="width: 133px" required id="fechases" value="<?=$sesion['fecha']?>"></td>
                                        <td><input type="time" required name="horases" id="horases" value="<?=$sesion['hora']?>"></td>
                                        <td><input type="text" required name="lugarses" id="lugarses" style="width: 110px" value="<?=$sesion['lugar']?>"></td>
                                        <td><input type="text" required name="duracion" id="duracion" placeholder="minutos" style="width: 50px" value="<?=$sesion['duracion']?>"></td>
                                        <td><select class="form-control" required name="grupo" id="grupo" style="width: 80px">
                                            <?php 
                                                $rfc=$_SESSION['usuario']['rfc'];
                                                $opciones=mysqli_query($db->getConnection(),"SELECT * FROM tutor_tutorado WHERE rfc = '$rfc'");						
                                                while($opcion=mysqli_fetch_assoc($opciones)):?>
                                                    <option <?php if($sesion['grupo']==$opcion['id_grupo']):?>selected="selected"	<?php endif;?>value="<?=$opcion['id_grupo']?>"><?=$opcion['id_grupo'];?></option>
                                                <?php endwhile;?>
                                            </option>
                                        </select></td>
                                        <input type="hidden" name="tipo" value="2"> 

                                        <td><button data-toggle="tooltip" data-placement="right" title="Actualizar Sesión" name="modificar" value="<?=$sesion['id_sesion']?>" class="btn"><img src="../img/rotate.png"></button></td>
                                        <td><button data-toggle="tooltip" data-placement="right" title="Eliminar Sesión" name="eliminar" value="<?=$sesion['id_sesion']?>"  class="btn"><img src="../img/delete.png"></button></td>
                                    </form>
                                </tr><?php endwhile;$db->close();?>
                            </tbody>
                        </table>
                    </div>
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
