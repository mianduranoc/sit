<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Canalizaciones</title>
    <link rel="stylesheet" type="text/css" href="../css/tutore.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
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
                    <div class="titulo">Canalizar Alumno</div>
                    <div>
                        <form method="post" action="guardar-canalizacion.php" id="canalizar" name="canalizar">
                                <div class="form-inline">
                                    <label for="alumno">Alumno:</label>
                                    <select class="form-control" required name="alumno" id="alumno">
                                        <?php
                                        $db=new ConexionBD();
                                        $conexion=$db->getConnection();
                                        $rfc=$_SESSION['usuario']['rfc'];
                                        $opciones=mysqli_query($db->getConnection(),"SELECT nc,nombre,apellido FROM Alumno WHERE nc IN (SELECT nc FROM Tutorado_Grupo WHERE grupo IN (SELECT id_grupo FROM tutor_tutorado WHERE rfc = '$rfc'))");
                                        while($opcion=mysqli_fetch_assoc($opciones)):?>
                                            <option value="<?=$opcion['nc']?>"><?=$opcion['nombre']." ".$opcion["apellido"];?></option>
                                        <?php endwhile;?>
                                    </select>
                                    <label for="tipocan">Tipo de Canalizacion:</label>
                                    <select class="form-control" required name="tipocan" id="tipocan">
                                        <?php
                                        $opciones=mysqli_query($db->getConnection(),"SELECT * FROM Tipo_Can");
                                        while($opcion=mysqli_fetch_assoc($opciones)):?>
                                            <option value="<?=$opcion['tipo']?>"><?=$opcion['Descripcion'];?></option>
                                        <?php endwhile;$db->close();?>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion de la Canalizacion:</label>
                                <textarea class="form-control"  name="descripcion" id="descripcion"></textarea>
                            </div>
                            </div>
                            <div class="form-control form-inline" style="margin-left: 45%">
                                <button name="informacion" id="informacion" type="submit" class="btn btn-primary" >Guardar</button>
                            </div>
                    <script>
                        var pass=document.getElementById("descripcion");
                        var aceptar=document.getElementById("informacion");
                        aceptar.addEventListener("click", () => {
                            $("#canalizar").submit(function(e){
                                let a=pass.value;
                                if (a=="") {
                                    swal("Ups!","El campo de descripcion no puede ir en blanco","error");
                                    e.preventDefault();
                                }
                                else{
                                    e.submit();
                                }
                            });
                        });
                    </script>
                        </form>
                    </div>
                    <hr>
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