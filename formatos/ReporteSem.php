<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Reportes</title>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<style>
    .contenido{
        padding: 1cm;
    }
    .titulo{
        background-color: lightblue;
        text-align: center;

    }
    .titulo >th{
        text-align: center;
        
    }
    .texto{
        font-size: 10px;
    }
    @page  {
        margin: 0;
    }
    .modlabel label{
        font-weight: inherit !important;
    }
</style>
<body>
    <div id="content" class=" contenido col-lg-8">
        
        <div class="row">
            <div class="col-lg-2">
                <p>INSTITUTO TECNOLÓGICO DE TEPIC <img align="right" src="../img/escudo_itt.png" alt="ittepic" width="100px" height="100px"></p>
                <p>SUBDIRECCIÓN ACADÉMICA</p>
                <p>DEPTO. DE DESARROLLO ACADÉMICO</p>
                <p>COORDINACIÓN INSTITUCIONAL DE TUTORÍAS</p>

            </div>
            <div class="col-lg-">

            </div>
        </div>
        <?php
            if (!isset($_SESSION)){
                session_start();
            }
            $rfc=$_SESSION['usuario']['rfc'];
            $nombre=$_SESSION['usuario']['nombre'];
            $nombre.=" ".$_SESSION['usuario']['apellido'];
            $nombre=strtoupper($nombre);
            $departamento=$_SESSION['usuario']['Departamento'];
            $departamento1=$departamento;
            $departamento=strtoupper($departamento);

        ?>
        <div class="row" style="margin-top: 5%">
            <div align="center" class="col-lg-8"></br></br>
                <label style="margin-left: 5%;">REPORTE SEMESTRAL DEL COORDINADOR DE TUTORÍA DEL DEPARTAMENTO ACADÉMICO</label></br></br>
                <label >SEMESTRE AGOSTO-DICIEMBRE 2018</label></br></br></br></br>
            </div>
        </div>

        <div style="font-size: 12px;margin-top: 5%">
        <label>NOMBRE DEL COORDINADOR DE TUTORÍA DEL DEPARTAMENTO ACADÉMICO:<u><?=$nombre?></u></label></br></br>

        </div>
        <div style="font-size: 12px;">
            <label>SEMESTRE ATENDIDO:<u>AGOSTO-DICIEMBRE 2018</u></label></br></br>
        </div>
    <table id="tabla" class="table table-bordered texto">
        <thead>
            <tr  class="titulo" valign="center">    
                <th rowspan="2" style="vertical-align:middle;"><label>No.</label></th>
                <th rowspan="2" style="vertical-align:middle;" ><label>LISTA DE TUTORES</label></th>
                <th rowspan="2" style="vertical-align:middle;"><label>GRUPO</label></th>
                <th rowspan="2" style="vertical-align:middle;horiz-align: center"><label>CARRERA</label></th>
                <th colspan="3" style="vertical-align:middle;"><label>ESTUDIANTES ATENDIDOS</label></th>
                <th rowspan="2" style="vertical-align:middle;"><label>TOTAL DE ESTUDIANTES ATENDIDOS</label></th>
                <th colspan="2" style="vertical-align:middle;"><label>No. SESIONES EN EL SEMESTRE</label></th>
                <th rowspan="2" style="vertical-align:middle;"><label>TOTAL DE SESIONES</label></th>
                <th rowspan="2" style="vertical-align:middle;"><label>ESTUDIANTES CANALIZADOS</label></th>
                <th rowspan="2" style="vertical-align:middle;"><label>AREA CANALIZADA</label></th>
            </tr>
            <tr class="titulo" >
                <th style="vertical-align:middle;"><label>DESERTARON</label></th>
                <th style="vertical-align:middle;"><label>ACREDITARON</label></th>
                <th style="vertical-align:middle;"><label>NO ACREDITARON</label></th>
                <th style="vertical-align:middle;"><label>TUTORIA INDIVIDUAL</label></th>
                <th style="vertical-align:middle;"><label>TUTORIA GRUPAL</label></th>
            </tr>
            <?php
            require_once "../helpers/conexion.php";
            $db=new ConexionBD();
            $conexion=$db->getConnection();
            $cont=1;
            $totales=mysqli_query($conexion,"SELECT * FROM total");
            while($total=mysqli_fetch_assoc($totales)): ?>
            <tr align="center">
                <td><?=$cont?></td>
                <td><?=strtoupper($total['nombre'])?></td>
                <td><?=$total['id_grupo']?></td>
                <td><?=$total['carrera']?></td>
                <td><?=$total['desertor']?></td>
                <td><?=$total['acreditado']?></td>
                <td><?=$total['total']-$total['acreditado']?></td>
                <td><?=$total['total']?></td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>Ninguno</td>
            </tr>
            <?php $cont++; endwhile;?>
            <tr>
                <th colspan="13"><label>Observaciones:</label></th>
            </tr>
        </thead>
    </table>
    <div class="row" style="margin-bottom: 5%"> </br></br>
        <?php
        $dia=date("d");$mes=date("m");$anio=date("Y");
        $fecha="$dia"."/"."$mes"."/"."$anio";
        $jefe=mysqli_query($conexion,"SELECT idpuesto_interno FROM puesto_interno WHERE nombre='Jefe de Departamento Academico'");
        $jefedep=mysqli_fetch_assoc($jefe);
        $ahorasi=$jefedep['idpuesto_interno'];
        $sql=mysqli_query($conexion,"SELECT rfc FROM informacion_administrativo WHERE Departamento='$departamento1' AND idpuesto_interno=$ahorasi");
        $rf=mysqli_fetch_assoc($sql);
        $rfcccc=$rf['rfc'];
        $rfcjefe=mysqli_query($conexion,"SELECT nombre,apellido FROM Personal WHERE rfc='$rfcccc'");
        $rfcc=mysqli_fetch_assoc($rfcjefe);
        $nombrejefe=$rfcc['nombre']." ".$rfcc['apellido'];
        $nombrejefe=strtoupper($nombrejefe);
        ?>
        <label class="col-lg-3">Fecha de entrega de este reporte:</label>
        <label ><?=$fecha?></label>
    </div>
        <div class="row" align="center"></br></br>
            <label class="col-lg-6">____________________________________________</label>
            <label class="col-lg-6" style="font-size: 12px;margin-left:10%">________________________________________________________________________</label>
        </div>
        <div class="row" align="center"></br></br></br></br>
            <label  style="font-size: 12px;margin-left: 7%"><?=$nombrejefe?></label>
            <label  style="font-size: 12px;margin-left:38%"><?=$nombre?></label>
        </div>
    <div class="row" style="padding-left: 3%"></br></br></br></br>
        <label class="col-lg-6"  style="font-size: 10px;text-align: left;">JEFE DE DEPARTAMENTO DE SISTEMAS Y COMPUTACION</label>
        <label class="col-lg-6"  style="font-size: 10px;text-align: right;margin-left: 17%">COORDINADOR DE TUTORIAS DEL DEPARTAMENTO DE SISTEMAS Y COMPUTACION</label>

    </div>


    </div>
    
</body>
</html>