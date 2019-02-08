<?php
    require_once '../helpers/conexion.php';
    $db=new ConexionBD();
    $conexion=$db->getConnection();
    
    $id_sesion = isset($_POST['sesion']) ? $_POST['sesion'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    
    if( isset($_POST['grupal'])){
        $ide = explode('-',$id_sesion);
        $id_sesion = $ide[0];
    }
    $id = false;
     $dc=false;
     if(!empty($id_sesion)){
         $id = true; 
     }else{
         $_SESSION['error']['sesion'] = ' SELECCIONAR UNA SESION';
     }
     if(!empty($desc)){
         $dc=true;
     }else{
        $_SESSION['error']['desc'] = ' DESCRIBIR LA SESION';
     }
     
     if($id && $dc){               
        if($id_sesion !=='x'){
            // $sql = "CREATE OR REPLACE VIEW asistencia_sesion as SELECT DISTINCT Alumno_nc,Sesion_id_sesion FROM Alumno_Sesion
            //     INNER JOIN Sesion ON Sesion.estado=0 and Alumno_Sesion.Sesion_id_sesion = Sesion.id_sesion and 
            //     Sesion.id_sesion='$id_sesion'";
            // $vista=mysqli_query($db->getConnection(),$sql);
            if( isset($_POST['grupal'])){
                $alumnos = $_POST['alumn'];
                foreach ($alumnos as $alumno) {
                    $sql = "UPDATE Alumno_Sesion SET asistencia = 1 where Alumno_nc ='".$alumno."' and Sesion_id_sesion=$id_sesion";
                    $asistencia=mysqli_query($conexion,$sql);                   
                    echo $sql.'<br/>';
                }                  
                
            }elseif(isset($_POST['individual'])){
                $sql = "UPDATE Alumno_Sesion SET asistencia = 1 where Sesion_id_sesion='$id_sesion'";
                $update=mysqli_query($conexion,$sql);
            }    
                       
            $sql="UPDATE Sesion SET estado = 1 WHERE id_sesion = $id_sesion";
            $asis=mysqli_query($conexion,$sql);   
            $sql="INSERT INTO Reporte_Sesion(id_sesion,descripcion) VALUES('$id_sesion','$desc')";
            $insert=mysqli_query($conexion,$sql);        
            if($insert){                               
                    $_SESSION['ok']= 'Correcto';                
            }
        }else{
            $_SESSION['error']['sesion'] = ' SELECCIONAR UNA SESION';
        }
    }   
    if(isset($_POST['grupal'])) 
        header('Location:reporte-grupal.php');                                       
    else
        header('Location:reporte-individual.php'); 
?>