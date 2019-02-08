<?php require_once "cabecera-jefe-depto.php"?>
<div class="col-md-10 contenido" id="tutores">
    <div class="titulo">Asignar Coordinador Departamental de Tutorias</div>
    <div>
        <form method="post" action="guardar_asignacion.php">
            <div class="form-group">
                <label for="personal">Personal</label>
                <select class="form-control" required name="personal" id="personal">
                    <?php
                    $db=new ConexionBD();
                    $conexion=$db->getConnection();
                    $depto=$_SESSION['usuario']['Departamento'];
                    $opciones=mysqli_query($conexion,"SELECT * FROM desasignados WHERE nombre_depto='$depto'");
                    $asignados=mysqli_query($conexion,"SELECT * FROM informacion_administrativo WHERE puesto_administrativo='Coordinador Departamental de Tutorias' and Departamento='$depto'");
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
                $opciones=mysqli_query($conexion,"SELECT * FROM informacion_administrativo WHERE puesto_administrativo='Coordinador Departamental de Tutorias' and Departamento='$depto'");
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

<?php require_once "pie-jefe-depto.php"?>