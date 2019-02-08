<?php require_once "cabecera-coor-dep.php"?>
<div class="col-md-10 contenido" id="tutoress">
    <div class="titulo">Tutores</div>
    <div>
    <!-- PARA GUARDAR TUTOR CON EL GRUPO -->
        <?php
            require_once '../helpers/conexion.php';
            $db=new ConexionBD();
            $conexion=$db->getConnection();
            if(isset($_SESSION['mer'])){
                unset($_POST["guardar"],$_POST['actualizar'],$_POST['eliminar'],$_POST['grupos'],$_SESSION['mer']);
            }
            
            if(isset($_POST['guardar'])){
                $_SESSION['mer']='s';
                $rfc = $_POST['guardar'];
                unset($_POST["guardar"]);
                $gpo = $_POST['grupos'];                
                $insertar = mysqli_query($conexion,"INSERT INTO tutor_tutorado(rfc,id_grupo) VALUES('$rfc','$gpo')");
                if($insertar){
                    echo "<script>swal('Correcto', 'Tutor asignado correctamente!', 'success')</script>";
                }else echo "<script>swal('Ups!', 'El grupo ya ha sido asignado!', 'error')</script>";     
                        
            }elseif(isset($_POST['actualizar'])){
                $_SESSION['mer']='s';
                $rfc = $_POST['actualizar'];
                unset($_POST['actualizar']);
                $gpo = $_POST['grupos'];
                $actualizar = mysqli_query($conexion,"UPDATE tutor_tutorado set id_grupo = '$gpo' WHERE rfc ='$rfc' ");
                if($actualizar){
                    echo "<script>swal('Correcto', 'Cambio completado!', 'success')</script>";
                }else echo "<script>swal('Ups!', 'Algo salio mal', 'error')</script>";
               
            }elseif(isset($_POST['eliminar'])){
                $_SESSION['mer']='s';
                $rfc = $_POST['eliminar'];
                unset($_POST['eliminar']);
                $gpo = $_POST['grupos'];
                $eliminar = mysqli_query($conexion,"DELETE FROM tutor_tutorado WHERE id_grupo = '$gpo' and rfc ='$rfc' ");
                if($eliminar){
                    echo "<script>swal('Correcto', 'El tutor a sido desasignado!', 'success')</script>";
                }else echo "<script>swal('Ups!', 'Algo salio mal', 'error')</script>";
                
            }
        ?>
    <!-- FIN GUARDAR -->
   
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">RFC</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Grupo</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>
            <tbody>
            <?php
                  
                 $db=new ConexionBD();
                 $conexion=$db->getConnection();
                 $depto=$_SESSION['usuario']['id_depto'];                 
                 $busca = mysqli_query($conexion,"SELECT p.rfc,p.nombre,p.apellido 
                    FROM Personal p, usuarios u WHERE p.rfc = u.rfc and u.puesto_tutor != 4 and p.Departamento_id_depto ='$depto'");
                while($tutor=mysqli_fetch_assoc($busca)):
            ?>
            <form action="visualizar-tutores.php" method="post">
            <tr>                
                    <th><label name="rfc"><?=$tutor['rfc']?></label></th>
                    <th><label name="nombre"><?=$tutor['nombre']?></label></th>
                    <th><label name="apellido"><?=$tutor['apellido']?></label></th>
                    <th>
                        <select name="grupos">
                            <!-- <option value = 'x'>Selecciona</option> -->
                            <?php 
                                                  
                             $existe = mysqli_query($conexion,"SELECT id_grupo FROM tutor_tutorado WHERE rfc = '".$tutor['rfc']."'");
                            $grupos = mysqli_query($conexion,"SELECT id_grupo FROM grupo WHERE id_carrera in (SELECT id_carrera FROM Carrera WHERE depto ='$depto') and id_grupo NOT IN(SELECT id_grupo FROM tutor_tutorado)");
                             if(mysqli_num_rows($existe)>0):
                                 $grup = mysqli_fetch_assoc($existe);
                            ?>
                                  <option  selected value="<?=$grup['id_grupo']?>">Asignado <?=$grup['id_grupo']?></option>                            

                             <?php 
                                while($grupo = mysqli_fetch_assoc($grupos)):   
                                    if($grupo['id_grupo'] !== $grup['id_grupo']):
                            ?>
                                 <option value="<?=$grupo['id_grupo']?>"><?=$grupo['id_grupo']?></option>
                            <?php endif;endwhile;
                            else:
                           
                                while($grupo = mysqli_fetch_assoc($grupos)):                                                                                                            
                            ?>                                                                       
                                         <option value="<?=$grupo['id_grupo']?>"><?=$grupo['id_grupo']?></option>
                                    <?php endwhile; endif;?>                         
                        </select>
                    </th>
                    <th>
                        <button name="guardar" value="<?=$tutor['rfc']?>"  class="btn guarda">Asignar</button>
                        <button name="actualizar" value="<?=$tutor['rfc']?>"  class="btn actualizar">Cambiar grupo</button>
                        <button name="eliminar" value="<?=$tutor['rfc']?>"  class="btn eliminar">Desasignar</button>
                    </th>
                
            </tr>
            </form>
                <?php endwhile;$db->close();?>
            </tbody>
        </table>
       
    </div>
</div>
<?php require_once "pie.php"?>