<?php
header("Content-Type: application/json");
    require_once ("../helpers/conexion.php");
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
    switch ($accion) {
        case 'leer':    
        $opciones=mysqli_query($db->getConnection(),"SELECT DISTINCT  c.id_conferencia as id,c.nombre as title,c.descripcion,c.limite_asistentes as cupo,
        CONCAT(c.fecha_hora,' ',c.hora) as start,tc.descripcion as tipo,l.nombre AS lugar, c.ocupados,c.Tipo_Conferencia_id_tipo_conf as tip FROM lugares l,Conferencia c, Tipo_Conferencia tc where l.id_lugar = c.lugar and c.Tipo_Conferencia_id_tipo_conf = tc.id_tipo_conf and c.fecha_hora >= CURDATE() and c.limite_asistentes>c.ocupados");                
                 $result= array();
                  while($opcion=mysqli_fetch_assoc($opciones)){                                            
                        if($opcion['tip']=='1'){                                                                           
                            $arrind=array('id'=>$opcion['id'],'lugar'=>$opcion['lugar'],'title'=>$opcion['title'],
                                'start'=>$opcion['start'],'descripcion'=>$opcion['descripcion'],'cupo'=>$opcion['cupo'],'tipo'=>$opcion['tipo']
                                ,'ocupados'=>$opcion['ocupados'],'color'=>'#1B6A46','tipo'=>$opcion['tipo']);
                            $result[] = $arrind;
                        }elseif($opcion['tip']=='2'){
                            $arrind=array('id'=>$opcion['id'],'lugar'=>$opcion['lugar'],'title'=>$opcion['title'],
                            'start'=>$opcion['start'],'descripcion'=>$opcion['descripcion'],'cupo'=>$opcion['cupo'],'tipo'=>$opcion['tipo']
                            ,'ocupados'=>$opcion['ocupados'],'color'=>'#1B396A','tipo'=>$opcion['tipo']);
                            $result[] = $arrind;
                        }
                    }                            
                    echo json_encode($result);                
            break;
        default:
            $id = $_POST['id'];
            $fecha = (isset($_POST['fecha'])) ?  mysqli_real_escape_string($conexion,$_POST['fecha']) : '12';
            $tamano = (int)(isset($_POST['tamano'])) ?  mysqli_real_escape_string($conexion,$_POST['tamano']) : '100';
            $grupo = (isset($_POST['grupo'])) ?  mysqli_real_escape_string($conexion,$_POST['grupo']) : 'na';
            // buscar si hay algun grupo ya registrado en la conferencia para no duplicar
            $existe = mysqli_query($db->getConnection(),"SELECT COUNT(id_grupo) as num FROM Grupo_Conferencia WHERE id_grupo='$grupo' and Conferencia_id_conferencia='$id'");
            $registrado = mysqli_fetch_assoc($existe);
            $registrado = (int)$registrado['num'];
           
            if($registrado == 0){
                $alumnos =mysqli_query($db->getConnection(),"SELECT nc FROM Tutorado_Grupo WHERE grupo ='$grupo'");
                $opciones=mysqli_query($db->getConnection(),"INSERT INTO Grupo_Conferencia(fecha_inscripcion,Conferencia_id_conferencia,id_grupo) VALUES('$fecha','$id','$grupo')");
                if($opciones){
                    $opciones=mysqli_query($db->getConnection(),"UPDATE Conferencia SET ocupados = ocupados+$tamano WHERE id_conferencia = '$id'");
                    while ($alumno=mysqli_fetch_assoc($alumnos)) {
                        $opciones=mysqli_query($db->getConnection(),"INSERT INTO Tutorado_Conferencia(id_conferencia,nc,asistencia) VALUES('$id','".$alumno['nc']."',0)");
                    }
                    echo json_encode($opciones);
                }
            }else{
                // para mandar error de grupo ya asignado
                echo json_encode($registrado,1);
                echo json_encode(false);
            }
            break;
        $db->close();  
    }
?>