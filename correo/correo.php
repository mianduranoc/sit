<?php
use  PHPMailer\PHPMailer\PHPMailer ;
use  PHPMailer\PHPMailer\Exception ;
require_once "phpmailer/src/PHPMailer.php";
require_once "phpmailer/src/Exception.php";
require_once "phpmailer/src/SMTP.php";
class Correo{

    public $mail;

    function __construct()
    {

    }
    function enviar_correo($correo,$nombre,$contrasena,$rfc,$puesto){

        try{
            $mail = new PHPMailer(true);
            $mail->CharSet='utf-8';
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sittepic@gmail.com';                 // SMTP username
            $mail->Password = 'Equipo_GPS*26112018';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Subject = 'Bienvenido al Sistema Integral de Tutorias';
            //Recipients
            $mail->setFrom('sittepic@gmail.com', 'Sistema Integral de Tutorias');
            $mail->isHTML(true);
            $mail->addAddress($correo, $nombre);// Add a recipient     // Name is optional
            $html="
            Hola, $nombre<br><br>
            
            Te damos la bienvenida al Sistema Integral de Tutorias.<br>
            Se te ha dado de alta en el Sistema con el rol:$puesto<br><br>
            Tus datos de acceso son los siguientes:<br><br>
            
            Usuario: $rfc<br>
            Contrasena: $contrasena<br><br>
            
            Te recordamos que tendras que modificar esta contraseña en tu primer ingreso al sistema<br><br>
            Saludos cordiales.
            ";
            $mail->Body=html_entity_decode($html,ENT_QUOTES,'UTF-8') ;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        return false;
    }
    function enviar_correo_conferencia($correo,$conferencia){

        try{
            $mail = new PHPMailer(true);
            $mail->CharSet='utf-8';
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sittepic@gmail.com';                 // SMTP username
            $mail->Password = 'Equipo_GPS*26112018';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->Subject = 'Actualizacion de Conferencia';
            //Recipients
            $mail->setFrom('sittepic@gmail.com', 'Sistema Integral de Tutorias');
            $mail->isHTML(true);
            for ($i=0;$i<count($correo);$i++){
                $mail->addAddress($correo[$i]);// Add a recipient     // Name is optional
            }
            $nombreconf=$conferencia['nombre'];
            $desc=$conferencia['descripcion'];
            $fecha=$conferencia['fecha_hora'];
            $hora=$conferencia['Hora'];
            require_once "../helpers/conexion.php";
            $db=new ConexionBD();
            $conexion=$db->getConnection();
            $idlugar=$conferencia['lugar'];
            $lugar=mysqli_fetch_assoc(mysqli_query($conexion,"SELECT nombre FROM lugares WHERE id_lugar=$idlugar"));
            $lugar=$lugar['nombre'];
            $html="
            Hola<br><br>
            
            Este correo tiene como finalidad el informarte,<br>
            sobre un cambio que se realizo a la fecha de una conferencia<br>
            a la que estas inscrito.<br>
            Estos son los nuevos datos de la misma:<br><br>
            
            Nombre de la conferencia:$nombreconf<br>
            Descripcion: $desc<br>
            Fecha: $fecha<br>
            Hora: $hora<br>
            Lugar: $lugar<br><br>
            
            Te recordamos ser puntual en tu asistencia a las conferencias.<br><br>
            Saludos cordiales.
            ";
            $mail->Body=html_entity_decode($html,ENT_QUOTES,'UTF-8') ;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        return false;
    }

    function enviar_correo_canalizacion($correo,$nombre,$area){

        try{
            $mail = new PHPMailer(true);
            $mail->CharSet='utf-8';
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sittepic@gmail.com';                 // SMTP username
            $mail->Password = 'Equipo_GPS*26112018';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Subject = 'Nueva Canalizacion Generada';
            //Recipients
            $mail->setFrom('sittepic@gmail.com', 'Sistema Integral de Tutorias');
            $mail->isHTML(true);
            $mail->addAddress($correo, $nombre);// Add a recipient     // Name is optional
            $html="
            Hola, $nombre<br><br>
            
            Te informamos que de acuerdo a la informacion de tu Tutor,<br>
            Se te ha canalizado al área de <strong>$area</strong>, para que se de seguimiento<br>
            a tu caso.<br><br>
            
          
            
            Sigue atento a las notificaciones de seguimiento de esta canalización<br><br>
            Saludos cordiales.
            ";
            $mail->Body=html_entity_decode($html,ENT_QUOTES,'UTF-8') ;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        return false;
    }

    function enviar_correo_canalizacion_cambio($correo,$nombre,$estado){

        try{
            $mail = new PHPMailer(true);
            $mail->CharSet='utf-8';
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sittepic@gmail.com';                 // SMTP username
            $mail->Password = 'Equipo_GPS*26112018';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Subject = 'Actualizacion de Canalizacion Generada';
            //Recipients
            $mail->setFrom('sittepic@gmail.com', 'Sistema Integral de Tutorias');
            $mail->isHTML(true);
            $mail->addAddress($correo, $nombre);// Add a recipient     // Name is optional
            $html="
            Hola, $nombre<br><br>
            
            Te informamos que de acuerdo a la informacion en el Sistema,<br>
            Se ha actualizado el estado de tu canalizacion a <strong>$estado</strong>, para que se de seguimiento<br>
            a tu caso.<br><br>
            
          
            
            Sigue atento a las notificaciones de seguimiento de esta canalización<br><br>
            Saludos cordiales.
            ";
            $mail->Body=html_entity_decode($html,ENT_QUOTES,'UTF-8') ;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        return false;
    }

}
