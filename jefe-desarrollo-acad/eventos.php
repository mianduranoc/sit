
<?php
    header("Content-Type: application/json");
    require_once ("../helpers/conexion.php");

    $db=new ConexionBD();
    $conexion=$db->getConnection();
    $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
    switch ($accion) {
        case 'leer':
                $opciones=mysqli_query($db->getConnection(),"SELECT DISTINCT  c.id_conferencia as id,c.nombre as title,c.descripcion,c.limite_asistentes as cupo,
                 CONCAT(c.fecha_hora,' ',c.hora) as start,c.Personal_rfc,tc.id_tipo_conf as tipo, CONCAT(c.lugar,',',l.capacidad) AS lugar, c.ocupados, c.color,c.textColor FROM lugares l,Conferencia c, Tipo_Conferencia tc where l.id_lugar = c.lugar and c.Tipo_Conferencia_id_tipo_conf = tc.id_tipo_conf and c.fecha_hora >= CURDATE()");
                $result =array();
                $otras = mysqli_query($db->getConnection(),"SELECT c.id_conferencia as id, COUNT(tc.Conferencia_id_conferencia) as cant FROM Grupo_Conferencia tc, Conferencia c where c.id_conferencia=tc.Conferencia_id_conferencia GROUP BY tc.Conferencia_id_conferencia
                ");  
                
                $arrOtras = array();
                $arrOtras2= array();
                while($otra=mysqli_fetch_assoc($otras)){
                    $arrOtras[]=$otra['id'];
                    $arrOtras2[]=$otra['cant'];
                    // var_dump( $otra);
                } 
                while($opcion=mysqli_fetch_assoc($opciones)){
                    for($i=0; $i<count($arrOtras);$i++){                                              
                        // echo $opcion['id'].'  dasd  '.$arrOtras2[$i].'<br/>';
                        if($arrOtras[$i]==$opcion['id']){                            
                            $opcion['cant']=$arrOtras2[$i];  
                             break;
                        }
                        if(($i+1)==count($arrOtras)){
                            $opcion['cant']=0;
                        }
                        
                    }
                    $result[] = $opcion;
                }            
                echo json_encode($result);                
            break;
        
        case 'agregar':
        $nombre = (isset($_POST['title'])) ?  mysqli_real_escape_string($conexion,$_POST['title']) : '1';
        $descripcion = (isset($_POST['descripcion'])) ?  mysqli_real_escape_string($conexion,$_POST['descripcion']) : '2';
        $cupo = (isset($_POST['cupo'])) ?  mysqli_real_escape_string($conexion,$_POST['cupo']) : '3';
        $fecha = (isset($_POST['fecha'])) ?  mysqli_real_escape_string($conexion,$_POST['fecha']) : '12';
        $rfc =$_SESSION['usuario']['rfc'] ; // verificar si funciona esto $_SESSION['usuario']['rfc'] 
        $tipo =(int) (isset($_POST['tipo'])) ?  mysqli_real_escape_string($conexion,$_POST['tipo']) : 'Conferencia';               
        $lugar = (isset($_POST['lugar'])) ?  mysqli_real_escape_string($conexion,$_POST['lugar']) : '2';
        $hora = (isset($_POST['hora'])) ?  mysqli_real_escape_string($conexion,$_POST['hora']) : '00';
        $ocupados = (isset($_POST['ocupados'])) ?  mysqli_real_escape_string($conexion,$_POST['ocupados']) : '0';
        if($tipo == 1){
            $color = '#1B6A46';
        }else{
             $color = (isset($_POST['color'])) ?  mysqli_real_escape_string($conexion,$_POST['color']) : '9';
        }
        $textColor = (isset($_POST['textColor'])) ?  mysqli_real_escape_string($conexion,$_POST['textColor']) : '#ffffff';
// empieza validar lugar
        $busca = mysqli_query($conexion,"SELECT Hora as hr, lugar as lu FROM Conferencia WHERE fecha_hora = '$fecha'");
        $hora_hr = explode(':',$hora);
        $ya_hay=false;
        while($cmp = mysqli_fetch_assoc($busca)){
            $tmp_hr =  explode(':',$cmp['hr']);
            if($hora_hr[0] == $tmp_hr[0] && $lugar == $cmp['lu']){
                echo json_encode($hora,1);
                echo json_encode(false);
                $ya_hay = true;
            }
        }
        if(!$ya_hay){
            $sql ="INSERT INTO Conferencia (nombre, descripcion, limite_asistentes, fecha_hora, Personal_rfc, Tipo_Conferencia_id_tipo_conf, lugar, Hora, ocupados, color, textColor) VALUES ('".
            $nombre."','".$descripcion."','".$cupo."','".$fecha."','".$rfc."',".$tipo.",'".$lugar."','".$hora
            ."','".$ocupados."','".$color."','".$textColor."')";
            // echo $sql;
            $insertar=mysqli_query($db->getConnection(),$sql);        
            // echo mysqli_error($conexion);
            echo json_encode($insertar);
        }
            break;
        case 'modificar':

            $id = $_POST['id'];
            $nombre = (isset($_POST['title'])) ?  mysqli_real_escape_string($conexion,$_POST['title']) : '1';
            $descripcion = (isset($_POST['descripcion'])) ?  mysqli_real_escape_string($conexion,$_POST['descripcion']) : '2';
            $cupo = (isset($_POST['cupo'])) ?  mysqli_real_escape_string($conexion,$_POST['cupo']) : '3';
            $fecha = (isset($_POST['fecha'])) ?  mysqli_real_escape_string($conexion,$_POST['fecha']) : '12';
            $rfc =$_SESSION['usuario']['rfc'] ;
            $tipo = (int) (isset($_POST['tipo'])) ?  mysqli_real_escape_string($conexion,$_POST['tipo']) : 'Conferencia';                  
            $lugar = (isset($_POST['lugar'])) ?  mysqli_real_escape_string($conexion,$_POST['lugar']) : '6';
            $hora = (isset($_POST['hora'])) ?  mysqli_real_escape_string($conexion,$_POST['hora']) : '17:00:00';
            $ocupados = (isset($_POST['ocupados'])) ?  mysqli_real_escape_string($conexion,$_POST['ocupados']) : '8';
            $color = (isset($_POST['color'])) ?  mysqli_real_escape_string($conexion,$_POST['color']) : '9';
            $textColor = (isset($_POST['textColor'])) ?  mysqli_real_escape_string($conexion,$_POST['textColor']) : '10';
            // empieza validar lugar
            $busca = mysqli_query($conexion,"SELECT Hora as hr, lugar as lu,id_conferencia as id FROM Conferencia WHERE fecha_hora = '$fecha'");
            $hora_hr = explode(':',$hora);
            $ya_hay=false;
            while($cmp = mysqli_fetch_assoc($busca)){
                $tmp_hr =  explode(':',$cmp['hr']);
                // echo ($hora_hr[0] == $tmp_hr[0] && $id != $cmp['id']).'<br/>';
                if($hora_hr[0] == $tmp_hr[0] && $lugar == $cmp['lu'] && $id != $cmp['id']){
                    echo json_encode($hora,1);
                    echo json_encode(false);
                    $ya_hay = true;
                }
            }
            if(!$ya_hay){
                $sql = "UPDATE Conferencia SET nombre='$nombre',descripcion='$descripcion', limite_asistentes='$cupo', fecha_hora='$fecha', Personal_rfc='$rfc', Tipo_Conferencia_id_tipo_conf=".$tipo.", lugar='$lugar', Hora='$hora', ocupados='$ocupados', color='$color', textColor='$textColor' WHERE id_conferencia = '$id'";
            $actualizar = mysqli_query($db->getConnection(),$sql);
            // echo mysqli_error($conexion);
            // echo $fecha;
            echo json_encode($actualizar);
            }
            
            break;
        default:               
               if(isset($_POST['id'])){                
                   $sql = "DELETE FROM Conferencia WHERE id_conferencia = ".$_POST['id'];
                   $eliminar=mysqli_query($db->getConnection(),$sql);                    
                //    echo mysqli_error($conexion);                
               } 
              if($eliminar)
                echo json_encode($eliminar);
            //    else
            //    echo "<script>alert('Ya se han asignado grupos. No se puede eliminar esta conferencia')</script>";
            break;
    }
    $db->close();   
    // $_SESSION['usuario']['rfc']
   
?>
