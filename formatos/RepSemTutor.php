<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reportes</title>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<style>
    .contenido{
        padding: 1cm;
       
    }
    .table{
        padding: 0cm;
    }
    .titulo{
        background-color: lightblue;
        text-align: center;

    }
    .titulo >th{
        text-align: center;
        
    }
    .sub >th{
        text-align: center;
        vertical-align: middle;
    }
    .color{
        background-color: lightblue;
    }
    @page{
        margin: 0;
    }
    .letra{
        font-size: 10px;
    }
</style>
<body>
    <div id="content" class=" contenido col-lg-12">
        <div class="row">
            <div class="col-lg-6" align="center">
                <p><img align="left" style="margin:0" src="../img/SEP_logo.png"  alt="SEP" width="250px" height="90px"><label style="margin-left: 44%">TECNOLÓGICO NACIONAL DE MÉXICO</label><img align="right" src="../img/escudo_itt.png" alt="ittepic" width="100px" height="100px"></p>
                <p><label style="margin-left: 45%">INSTITUTO TECNOLÓGICO DE TEPIC</label></p>
                <p>SUBDIRECCIÓN ACADÉMICA</p>
                <p style="margin-left: 15%">DEPTO. DE DESARROLLO ACADÉMICO</p>
                <p style="margin-left: 15%">COORDINACIÓN INSTITUCIONAL DE TUTORÍAS</p>
            </div>
        </div>

        <div class="row">
            <div align="center" class="col-lg-12">
                <label style="margin-left: 47%">REPORTE SEMESTRAL TUTOR</label><br></br>
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
        require_once "../helpers/conexion.php";
        $db=new ConexionBD();
        $conexion=$db->getConnection();
        $sql=mysqli_query($conexion,"SELECT * FROM total WHERE rfc='$rfc'");
        $datos=mysqli_fetch_assoc($sql);
        $carrera=$datos['carrera'];
        $grupo=$datos['id_grupo'];
        ?>
        <div class="row"><br></br>
            <label class="col-lg-9">NOMBRE DEL TUTOR: <u><?=$nombre?></u></label>
            <label class="col-lg-3">GRUPO:<u><?=$grupo?></u> </label>
        </div>
        <div class="row">
            <label class="col-lg-9">PROGRAMA EDUCATIVO:<u><?=strtoupper($carrera)?></u></label>
        </div>
        <div class="row">
            <label class="col-lg-9">SEMESTRE ATENDIDO:AGOSTO-DICIEMBRE 2018 </label>
            <!--<label class="col-lg-3">HORA:7-8AM </label>-->
        </div>
        <br></br>
        <table class="table table-bordered letra"  align="center">
            <thead>
                
                <tr class="sub">
                    <th rowspan="2" style="vertical-align:middle;"><label>No.</label></th>
                
                    <th rowspan="2" style="vertical-align:middle;" class="color"><label>NOMBRE DEL ESTUDIANTE</label></th>
                
                    <th rowspan="2" style="vertical-align:middle;"><label>No. CONTROL</label></th>
                
                    <th colspan="2" class="color"><label>NÚMERO DE SESIONES CON EL TUTOR (HORA/SESIÓN)</label></th>
                
                    <th colspan="3"><label>PARTICIPACIÓN EN ACTIVIDADES DE APOYO (NÚMERO)</label></th>
                
                    <th colspan="4" style="vertical-align:middle;" class="color"><label>FUE CANALIZADO EN EL SEMESTRE</label></th>
                
                    <th colspan="3" style="vertical-align:middle;"><label>CONTINUIDAD EN EL PROGRAMA</label></th>
                

                </tr>
                <tr class="sub">
                    <th style="vertical-align:middle;" class="color">TUTORÍA INDIVIDUAL</th>
                    <th style="vertical-align:middle;" class="color">TUTORÍA GRUPAL</th>
                    <th style="vertical-align:middle;">ACTIVIDAD INTEGRADORA</th>
                    <th style="vertical-align:middle;">CONFERENCIA</th>
                    <th style="vertical-align:middle;">TALLER</th>
                    <th style="vertical-align:middle;"  class="color">SI</th>
                    <th style="vertical-align:middle;"  class="color">NO</th>
                    <th style="vertical-align:middle;"  class="color">NUMERO SESIONES</th>
                    <th style="vertical-align:middle;"  class="color">AREA DE CANALIZACIÓN</th>
                    <th style="vertical-align:middle;">DESERTÓ</th>
                    <th style="vertical-align:middle;">ACREDITÓ</th>
                    <th style="vertical-align:middle;">NO ACREDITÓ</th>

                </tr>
                <!--<tr>
                    <th colspan="15"><label>Observaciones:</label></th> 
                </tr>-->
            </thead>
            <tbody>
            <?php
            $cont=1;
            $totales=mysqli_query($conexion,"SELECT * FROM reporte_tutor WHERE grupo='$grupo'");
            while($total=mysqli_fetch_assoc($totales)): ?>
                <tr align="center">
                    <td><?=$cont?></td>
                    <td><?=strtoupper($total['nombre'])?></td>
                    <td><?=$total['nc']?></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td><?=$total['desertor']?></td>
                    <td><?=$total['acreditado']?></td>
                    <td><?php if ($total['acreditado']==1 || $total['desertor']==1)echo"0"; else echo "1"?></td>
                </tr>
                <?php $cont++; endwhile;?>
            </tbody>
        </table>
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

        $cord=mysqli_query($conexion,"SELECT idpuesto_interno FROM puesto_interno WHERE nombre='Coordinador Departamental de Tutorias'");
        $jefedep=mysqli_fetch_assoc($cord);
        $ahorasi=$jefedep['idpuesto_interno'];
        $sql=mysqli_query($conexion,"SELECT rfc FROM informacion_administrativo WHERE Departamento='$departamento1' AND idpuesto_interno=$ahorasi");
        $rf=mysqli_fetch_assoc($sql);
        $rfcccc=$rf['rfc'];
        $rfcjefe=mysqli_query($conexion,"SELECT nombre,apellido FROM Personal WHERE rfc='$rfcccc'");
        $rfcc=mysqli_fetch_assoc($rfcjefe);
        $nombrecord=$rfcc['nombre']." ".$rfcc['apellido'];
        $nombrecord=strtoupper($nombrecord);
        ?>
        <div class="row">
            <label  class="col-lg-2">Fecha de entrega:<?=$fecha?></label>

        </div>
        <div class="row" align="center"><br></br>
            <label class="col-lg-6">_______________________________________________________</label>
            <label class="col-lg-6" style="margin-left: 6%">_____________________________________________________</label>
        </div>
        <div class="row" align="center">
            <label class="col-lg-6" style="font-size: 12px;padding-left: 12%"><?=$nombrecord?></label>
            <label class="col-lg-6" style="font-size: 12px;margin-left: 33%"><?=$nombrejefe?></label>
        </div>
        <div class="row" style="font-size: 10px" align="center">
            <label class="col-lg-6">NOMBRE Y FIRMA DEL COORDINADOR DE TUTORÍA DEL DEPARTAMENTO ACADÉMICO</label>
            <label class="col-lg-6" style="margin-left: 13%">NOMBRE Y FIRMA DEL JEFE DE DEPARTAMENTO ACADÉMICO</label>
        </div>
        <div class="row" align="center"><br></br><br>
            <label class="col-lg-12" style="margin-left: 25%">_______________________________________________________</label>
        </div>
        <div class="row" align="center">
            <label class="col-lg-12" style="margin-left: 35%;font-size: 12px;"><?=$nombre?></label>
        </div>
        <div class="row" align="center">
            <label class="col-lg-12" style="margin-left: 38%;font-size: 10px;">NOMBRE Y FIRMA DEL TUTOR</label>
        </div>





    </div>



</body>
</html>