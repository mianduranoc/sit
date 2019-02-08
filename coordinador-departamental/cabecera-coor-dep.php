<!DOCTYPE html>
<html lang="es">
<head>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        .guardar,.guarda,.actualizar,.eliminar{
          font-family: Soberana-Condensed-italic;
          text-align:center;
          width: 100px;
          height: 40px;
          color: #fff;
          border-radius: 4px;
          border:solid 1px black;          
        }
        .guardar, .actualizar{
            background-color: rgb(27,57,106);
        }
        .guarda{
            background-color:#1B6A46;            
        }
        .eliminar{
            background-color:#B81111;
        }
        .guardar:hover, .guarda:hover, .eliminar:hover, .actualizar:hover{
            box-shadow: 0px 50px 0px darkorange inset; 
        /* box-shadow: 130px 0px 0px darkorange inset,-120px 0px 0px darkorange inset; */ 
            cursor:pointer;}
        .asignar{
            width:100%;
        }        
    </style>
    <?php require_once  '../includes/cabecera-actores.php';
            require_once '../helpers/conexion.php';
    if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Coordinador Departamental de Tutorias"){
        header("Location:../index.php");
    }
    ?>
    Coordinador de departamento</p>
    </div>
    </div> <!-- /CABECERA -->
    </header>
    </div>

    <div class="container-fluid general">
        <div class="main">
            <div class="col-md-2">
                <?php require_once  '../includes/menuL-coordinador-dpto.php'; ?>
            </div>