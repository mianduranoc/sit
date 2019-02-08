<?php
require_once ("../helpers/conexion.php");
$db=new ConexionBD();
$conexion=$db->getConnection();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
switch ($accion) {
    case 'leer':    
    $sesiones=mysqli_query($conexion,"SELECT DISTINCT s.id_sesion,s.lugar 
                    ,CONCAT(s.fecha,' ',s.hora) as start,s.tipo,rs.descripcion as des,CONCAT('el grupo ',s.grupo) as quien,
                    CONCAT(p.nombre,' ',p.apellido) as tut FROM Sesion s, Personal p,Reporte_Sesion rs 
                    where rs.id_sesion = s.id_sesion and 
                    s.Personal_rfc = p.rfc and s.estado =1");
            $result =array();
            while($sesion=mysqli_fetch_assoc($sesiones)){
                // $rep = mysqli_query($conexion,"SELECT DISTINCT descripcion FROM Reporte_Sesion 
                // WHERE id_sesion='".$sesion['id_sesion']."'");
                // $descrip = mysqli_fetch_assoc($rep);
                if($sesion['tipo']=='1'){                   
                    $individual=mysqli_query($db->getConnection(),"SELECT CONCAT(a.nombre,' ',a.apellido,' - ',a.nc) as quien 
                                        FROM Alumno a,Alumno_Sesion als 
										 where a.nc=als.Alumno_nc and als.Sesion_id_sesion=".$sesion['id_sesion']."");
                    $opcion=mysqli_fetch_assoc($individual);
                    $arrind=array('id_sesion'=>$sesion['id_sesion'],'lugar'=>$sesion['lugar'],'title'=>('Sesion individual'),
                        'start'=>$sesion['start'],'quien'=>$opcion['quien'],'des'=>$sesion['des'],'tut'=>$sesion['tut']);
                    $result[] = $arrind;
                }elseif($sesion['tipo']=='2'){
                    $arrgr=array('id_sesion'=>$sesion['id_sesion'],'lugar'=>$sesion['lugar'],'title'=>'Sesion grupal',
                        'start'=>$sesion['start'],'quien'=>$sesion['quien'],'des'=>$sesion['des'],'tut'=>$sesion['tut']);
                    $result[] = $arrgr;
                }
               
            }            
            echo json_encode($result);                
        break;
    default:
        break;
    $db->close();  
}
?>