<div class="contenido" id="conferencias1">
    <div class="titulo">Conferencias</div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Ocupacion/Total</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Lugar</th>
                <th>Tipo de Actividad</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $db=new ConexionBD();
            $conexion=$db->getConnection();
            $conferencias=mysqli_query($conexion,"SELECT * FROM informacion_conferencias");
            echo "<script>console.log('Si jalo no te preocupes');</script>";
            ?>

            <?php
            while($conferencia=mysqli_fetch_assoc($conferencias)):
                ?>
                <tr>
                    <form action="inscribir_conf.php" method="post">
                        <td><?=$conferencia['nombre']?></td>
                        <td><?=$conferencia['descripcion']?></td>
                        <td><?=$conferencia['ocupados'].'/'.$conferencia['limite_asistentes']?></td>
                        <td><?=$conferencia['fecha_hora']?></td>
                        <td><?=$conferencia['Hora']?></td>
                        <td><?=$conferencia['lugar']?></td>
                        <td><?=$conferencia['tipo_desc']?></td>
                        <td class="form-inline">
                            <?php
                            $nc=$_SESSION['usuario']['nc'];
                            $id=$conferencia['id_conferencia'];
                            $registros=mysqli_query($conexion,"SELECT Conferencia_id_conferencia as id, Alumno_nc as nc FROM Tutorado_Conferencia WHERE Alumno_nc='$nc' AND Conferencia_id_conferencia=$id");
                            $registro=mysqli_fetch_assoc($registros);
                            $ocupados=mysqli_query($conexion,"SELECT ocupados,limite_asistentes FROM Conferencia WHERE id_conferencia=$id");
                            $ocupado=mysqli_fetch_assoc($ocupados);
                            if (mysqli_num_rows($registros)==0 && $ocupado['ocupados']<$ocupado['limite_asistentes']):?>
                                <button name="inscripcion" value="<?=$_SESSION['usuario']['nc'].','.$conferencia['id_conferencia']?>" class="btn btn-primary">Inscribirme</button>
                            <?php elseif(($ocupado['ocupados']==$ocupado['limite_asistentes'])&&$nc!=$registro['nc']):?>
                                <label>Conferencia Llena</label>
                            <?php else:?>
                                <button name="desinscripcion" formaction="desincribir_conf.php" value="<?=$_SESSION['usuario']['nc'].','.$conferencia['id_conferencia']?>" class="btn btn-danger">Desincribirme</button>
                            <?php endif;?>
                        </td>
                    </form>
                </tr>
            <?php endwhile;$db->close();?>


            </tbody>
        </table>
    </div>
</div>
<div class="table-responsive-sm" id="tabla_asistencias">
    <h3>Lista de Asistencia a Conferencias</h3>
    <table id="table-asistencia" class=" table table-bordered table-hover table-condensed ">
        <thead>
        <tr class="">
            <th class="text-center">Nombre de la Conferencia</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Asistio</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $db=new ConexionBD();
        $conexion=$db->getConnection();
        $id=$_SESSION['usuario']['nc'];
        $conferencias=mysqli_query($conexion,"SELECT * FROM asistencia_conferencia WHERE Alumno_nc=$id");
        while ($conferencia=mysqli_fetch_assoc($conferencias)):?>
            <tr>
                <td class="col-md-5 text-center">
                    <label><?=$conferencia['nombre_conf']?></label>
                </td>
                <td class="text-center">
                    <?=$conferencia['fecha_hora'];?>
                </td>
                <td class="text-center col-md-4">
                    <?php $estado=$conferencia['asistio'];
                    $resul;
                    if  ($estado==1){
                        $resul="Asistencia Registrada";
                    }else{
                        $resul="Asistencia No Registrada";
                    }?>
                    <label><?=$resul?></label>
                </td>

            </tr>
        <?php endwhile;$db->close();?>
        </tbody>
    </table>
    <?php unset($_SESSION['id_buscar']);?>
</div>
<?php
$db=new ConexionBD();
$conexion = $db->getConnection();
$tutor= mysqli_query($conexion, "SELECT CONCAT(Personal.nombre,' ',apellido) as nombre, correo, telefono, nombre_depto as departamento, Puesto.nombre as puesto
                                    FROM Personal INNER JOIN Departamento ON Personal.Departamento_id_depto = Departamento.id_depto  
                                    INNER JOIN Puesto ON Personal.Puesto_idPuesto = Puesto.idPuesto
                                    WHERE Personal.rfc = 'ABCD'");
?>
<?php
$datos = mysqli_fetch_assoc($tutor);
?>
<div class="contenido" id="fichaTutor"> <!---------- Inicio fichaTutor -------->
    <div class="row titulo">Datos Generales del Tutor</div>
    <div class="ficha col-md-9">
        <div class="row">
            <div class="col-md-4 ml-0">
                <label>Nombre</label>
                <p><?=$datos['nombre']?></p>
            </div>
            <div class="col-md-4 ml-0">
                <label>Correo Electrónico</label>
                <p><?=$datos['correo']?></p>
            </div>
        </div> <!----------------  Primer renglón --------------->
        <div class="row">
            <div class="col-md-4 ml-0">
                <label>Teléfono</label>
                <p><?=$datos['telefono']?></p>
            </div>
            <div class="col-md-5 ml-0">
                <label>Departamento</label>
                <p><?=$datos['departamento']?></p>
            </div>
        </div> <!---- Segundo renglón ------------------->
        <div class="row">
            <div class="col-md-4 ml-0">
                <label>Puesto</label>
                <p><?=$datos['puesto']?></p>
            </div>
            <div class="col-md-7 ">
                <table class="table">
                    <tr>
                        <th scope="col">Lunes</th>
                        <th scope="col">Martes</th>
                        <th scope="col">Miercoles</th>
                        <th scope="col">Jueves</th>
                        <th scope="col">Viernes</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>7:00 - 8:00</td>
                        <td>7:00 - 8:00</td>
                        <td>7:00 - 8:00</td>
                        <td>7:00 - 8:00</td>
                        <td>7:00 - 8:00</td>
                    </tr>
                    </tbody>
                </table>
                <?php $db->close();?>
            </div>
        </div> <!---- Tercer renglón ------------------->
    </div>
    <div class="col-md-2 imagen-tutor">
        <div class="ml-0">
            <img src="img/tutor.png" alt="Imagen Tutor" id="imagen">
        </div>
    </div>
</div>

<a class="menu-item">Mensajes</a>
<div class="opciones">
    <a class="accordion menu-item">Sesiones</a>
    <ul class="submenu">
        <li><a href="##">Individuales</a></li>
        <li><a href="##">Grupales</a></li>
    </ul>
</div>
<div class="opciones">
    <a class="accordion menu-item">Conferencias</a>
    <ul class="submenu">
        <li id="asistencias"><a href="##">Asistencias</a></li>
        <li id="btnConf"><a href="##">Fechas</a></li>
    </ul>
</div>