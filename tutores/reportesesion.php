<?php
require_once ("../helpers/conexion.php");
$grupo = $_REQUEST['grupo'];
$db=new ConexionBD();
$conexion=$db->getConnection();
$vista = mysqli_query($conexion,"CREATE OR REPLACE VIEW lista_alumngpo AS SELECT DISTINCT a.nc, CONCAT(a.apellido,' ',a.nombre) AS nombre FROM Alumno a,Alumno_Sesion als,Sesion s, Personal p, Tutorado_Grupo g 
where g.grupo =s.grupo and g.nc=a.nc and a.nc=als.Alumno_nc and s.estado=0 and als.Sesion_id_sesion=s.id_sesion and s.Personal_rfc = p.rfc 
and p.rfc = "
    ."'".$_SESSION['usuario']['rfc']."' and s.grupo = '".$grupo."';");
$sql="SELECT * FROM lista_alumngpo ORDER BY nombre";
$opciones=mysqli_query($db->getConnection(),$sql);
$i=1;
$var = " <div id='todos' style='width:100%; text-align:right;' class='form-group'><label>Marcar todos </label><input style='width:5%;height:15px;display:inline;'class='checkbox' onclick='m1(this)' type='checkbox' id='select-all'></div><div class='alumnos'>
                 <label><p id='nombre'>Nombre del alumno </p>
                  <p id='nc'> Numero de Control</p> 
                  <p id='asistencia'> Asistío</p></div><hr/><br/>";
while($opcion=mysqli_fetch_assoc($opciones)){
										
            $var.= "<div class='alumnos'>
                 <label><p id='nombre'>
           ".$opcion['nombre'].
           " </p> <p id='nc'> ".$opcion['nc']."</p> <input class='chk-box' type='checkbox' name='alumn[]' value='"
           .$opcion['nc']."'></label></div><hr/>";
}
echo $var;
$db->close();?>
