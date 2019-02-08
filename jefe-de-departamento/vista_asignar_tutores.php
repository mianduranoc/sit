<?php require_once "cabecera-jefe-depto.php"?>
<div class="col-md-10 contenido" id="asignarTutores">
    <h3>Lista de Docentes Disponibles</h3>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Tutor</th>
            </tr>
            </thead>
            <tbody>
            <form action="guardar_asignacion_tutores.php" method="post">
                <?php
                $db=new ConexionBD();
                $conexion=$db->getConnection();
                $depto=$_SESSION['usuario']['Departamento'];
                $opciones=mysqli_query($conexion,"SELECT * FROM desasignados WHERE nombre_depto='$depto' OR nombre_depto='Ciencias Basicas'");
                echo "<script>console.log('Si jalo no te preocupes');</script>";
                $cont=0;
                while($opcion=mysqli_fetch_assoc($opciones)):
                    $asignado=false;
                    if(!$opcion["id_interno"]==null){
                        $asignado=true;
                    }?>
                    <tr>
                        <td>
                            <label><?=$opcion['rfc']?></label>
                            <input type="hidden"  name="rfc<?=$cont?>" value="<?=$opcion['rfc'];?>">
                        </td>
                        <td><?=$opcion['nombre_completo']?></td>
                        <td><input type="checkbox" name="tutor<?=$cont?>" <?php if ($asignado):?>checked<?php endif;?> ></td>
                    </tr>
                    <?php $cont++;endwhile;$db->close();?>
            </tbody>
        </table>
        <div class="form-inline">
            <button style="width: 30%;margin-left: 30%;" name="grupal"  class="btn btn-primary" value="<?=$cont?>">Guardar asignaciones</button>
        </div>
        </form>
    </div>
</div>
<?php require_once "pie-jefe-depto.php"?>
