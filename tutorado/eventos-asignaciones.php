<?php

    require_once ("../helpers/conexion.php");
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $lista_conf = mysqli_query($db->getConnection(),"SELECT id_conferencia as id FROM Tutorado_Conferencia where nc ='".$_SESSION['usuario']['nc']."'");

    $result = array();
    while($lista=mysqli_fetch_assoc($lista_conf)){
        $opciones=mysqli_query($db->getConnection(),"SELECT DISTINCT  c.id_conferencia as id,c.nombre as title,c.descripcion,
        CONCAT(c.fecha_hora,' ',c.hora) as start,tc.descripcion as tipo,l.nombre AS lugar FROM lugares l,Conferencia c, Tipo_Conferencia tc 
        where l.id_lugar = c.lugar and c.Tipo_Conferencia_id_tipo_conf = tc.id_tipo_conf and c.fecha_hora >= CURDATE() and c.id_conferencia='".$lista['id']."'");                
                while($opcion=mysqli_fetch_assoc($opciones)){
                    if($opcion['tipo'] == 'Taller'){        
                    $tmp = array('id'=>$opcion['id'],'title'=>$opcion['title'],'descripcion'=>$opcion['descripcion'],
                            'start'=>$opcion['start'],'tipo'=>$opcion['tipo'],'lugar'=>$opcion['lugar'],'color'=>'#117A65');            
                    }else{
                        $tmp = array('id'=>$opcion['id'],'title'=>$opcion['title'],'descripcion'=>$opcion['descripcion'],
                            'start'=>$opcion['start'],'tipo'=>$opcion['tipo'],'lugar'=>$opcion['lugar'],'color'=>'#1B396A');
                    }
                    $result[] = $tmp;
                }
    }                         
                echo json_encode($result);                
       