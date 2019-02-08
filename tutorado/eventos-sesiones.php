<?php
    require_once ("../helpers/conexion.php");
    $db=new ConexionBD();
    $conexion=$db->getConnection();
   
        $sesiones=mysqli_query($conexion,"SELECT DISTINCT s.id_sesion,s.lugar 
                                ,CONCAT(s.fecha,' ',s.hora) as start,s.tipo
                               FROM Sesion s, Personal p, Alumno_Sesion als 
                                where s.Personal_rfc = p.rfc and 
                                als.Sesion_id_sesion = s.id_sesion and als.Alumno_nc = '".$_SESSION['usuario']['nc']."' and s.estado =0");
                                        $result =array();
                // 
                while($sesion=mysqli_fetch_assoc($sesiones)){
                    if($sesion['tipo'] == '1'){
                        $arrgr=array('id_sesion'=>$sesion['id_sesion'],'lugar'=>$sesion['lugar'],'title'=>'Sesion individual',
                            'start'=>$sesion['start'],'color'=>'#212F3C');
                    }else{
                        $arrgr=array('id_sesion'=>$sesion['id_sesion'],'lugar'=>$sesion['lugar'],'title'=>'Sesion grupal',
                            'start'=>$sesion['start'],'color'=>'#1a237e');
                    }
                        $result[] = $arrgr;
                    
                
                }            
                echo json_encode($result);                

        $db->close();  
    
?>