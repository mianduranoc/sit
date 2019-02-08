<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">       
    <style type="text/css">
        .pase,.listar{
          font-family: Soberana-Condensed-italic;
          text-align:center;
          /* width: 100px;
          height: 40px; */
          color: #fff;
          border-radius: 4px;
          border:solid 1px black;          
        }
        .listar{
            background-color: rgb(27,57,106);
        }
        .pase{
            background-color:#1B6A46;            
        }
        .titulo{
            text-align:center;
            padding:10px;
        }
        .listar:hover, .pase:hover{
            box-shadow: 0px 50px 0px darkorange inset; 
        /* box-shadow: 130px 0px 0px darkorange inset,-120px 0px 0px darkorange inset; */ 
            cursor:pointer;}                
    </style>
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Institucional de Tutorias"){
            header("Location:../index.php");
        }
    ?>
        Coordinador Institucional de Tutorias - conferencias</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>      
        <?php require_once ("../helpers/conexion.php"); ?>

        <div class="container-fluid general">
    	    <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-coordinador-inst.php'; ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8">                    
                    <div class="row titulo">Lista de grupos asignados a conferencias</div>
                        <table class="table table-hover">
                            <thead class="columnas">
                                <tr>
                                    <th scope="col">Evento</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Lugar</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="renglones" >
                                <?php
                                    if(isset($_SESSION['lista'])){
                                        echo "<script>swal('Correcto!', '¡Asistencia registrada!', 'success');</script>";
                                        unset($_SESSION['lista']);
                                    }
                                    $db=new ConexionBD();
                                    $conexion = $db->getConnection();                                    
                                    $vista = mysqli_query($conexion, "CREATE OR REPLACE VIEW grupos_conferencia AS
                                    SELECT DISTINCT c.id_conferencia, t.descripcion as evento,c.nombre as titulo, c.fecha_hora as fecha, c.hora,l.nombre as lugar, cg.id_grupo as grupo
                                    FROM Conferencia c, lugares l, Tutorado_Conferencia tc, Grupo_Conferencia cg, Tipo_Conferencia t
                                    WHERE c.id_conferencia = tc.id_conferencia and l.id_lugar = c.lugar and t.id_tipo_conf=c.Tipo_Conferencia_id_tipo_conf and cg.Conferencia_id_conferencia = c.id_conferencia");
                                    $grupos = mysqli_query($conexion,"SELECT * FROM grupos_conferencia");
                                ?>
                                <?php
                                    while($grupo = mysqli_fetch_assoc($grupos)):    
                                        $f1 = explode('-',$grupo['fecha']);
                                        $f2 = $f1[2].'/'.$f1[1].'/'.$f1[0];
                                        $h = substr($grupo['hora'],0,5);                                                                              
                                ?>
                                            <form action="asistencia-conferencia.php" method="post">                                        
                                                <tr>
                                                    <td><?=$grupo['evento'] ?></td>
                                                    <td><?=$grupo['titulo'] ?></td>
                                                    <td><?=$f2 ?></td>
                                                    <td><?=$h ?></td>
                                                    <td><?=$grupo['lugar'] ?></td>
                                                    <td><?=$grupo['grupo'] ?></td>
                                                    <td><button name="paselista" value="<?=$grupo['id_conferencia']?>-<?=$grupo['grupo']?>"  class="btn listar">Ver lista de asistencia</button></td>
                                                </tr>
                                            </form>                                        
                                <?php	                                      
                                    endwhile;$db->close();?>
                            </tbody>
                        </table>                   
                </div>
                <div class="col-md-1"></div>                                              				
		    </div>
        </div>
       						

<?php require_once '../includes/pie.php';?>