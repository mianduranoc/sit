<!DOCTYPE html>
<html lang="es">
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <style type="text/css">
        @font-face {
            font-family: Soberana-Condensed-regular;
            src: url(../fuente/soberanasanscondensed_regular.otf);           
        }
        /******************* PERFIL  **************************/
        .estatico{
            border-style: none;
        }

        .info{
            padding-top: 2%;
            padding-left: 10%;
        }
        .boton{
            position: absolute;
            left: 40%;
        }
        .titulo-perfil{
            padding-top: 0;
            padding-left: 5%;
            font-family: Soberana-Condensed-regular;
            font-size: 2.6em;
        }
        label{
            font-family: Soberana-Condensed-regular;
            font-size:1.5em;
        }
        
    </style>
    <script type="text/javascript">
    	document.addEventListener("DOMContentLoaded",ini);
	function ini(){
        var btnModificar = document.getElementById("modificar");
        var btnCancelar = document.getElementById("cancelar");
        var btnGuardar = document.getElementById("guardar");
        var check = document.getElementById("publico");

        var correo = document.getElementById("correo");
        var telefono = document.getElementById("telefono");
        var auxcorreo,auxtelefono;

        correo.readOnly = true;
        telefono.readOnly = true;
        btnCancelar.disabled = true;
        btnGuardar.disabled = true;
        check.disabled = true;
    //Modificar Perfil
        btnModificar.addEventListener("click", ()=>{
            auxtelefono = telefono.value;
            auxcorreo = correo.value;
            btnCancelar.disabled = false;
            btnGuardar.disabled = false;
            correo.readOnly = false;
            telefono.readOnly = false;
            correo.className = "form-control";
            telefono.className ="form-control";
            check.disabled = false;
            btnModificar.disabled = true;
        });

    //Cancelar Perfil
        btnCancelar.addEventListener("click", ()=>{
            btnModificar.disabled = false;
            btnGuardar.disabled = true;
            let correo = document.getElementById("correo");
            let telefono = document.getElementById("telefono");
            correo.readOnly = true;
            telefono.readOnly = true;
            correo.className = "estatico";
            telefono.className ="estatico";
            correo.value= auxcorreo;
            telefono.value= auxtelefono;
            btnCancelar.disabled = true;
        });
    }

    </script>

	<?php require_once  '../includes/cabecera-actores.php';
	require_once "../helpers/conexion.php";
    
	?>
	Jefe de Departamento</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>
    <body>
		<div class="container-fluid general">
				<div class="col-md-2">
					<?php require_once  '../includes/menuL-jefe-dep.php'; ?>
				</div>
				<div class="col-md-10">
					<!---------- Inicio Perfil Personal --------------------------------------------------------->
                    <?php
                        $db=new ConexionBD();
                        $conexion = $db->getConnection();
                        $aux = $_SESSION['usuario']['puesto_administrativo'];
                        $puestointerno = mysqli_query($conexion,"SELECT idpuesto_interno 
                            FROM puesto_interno WHERE puesto_interno.nombre = '$aux'");
                        $res = mysqli_fetch_assoc($puestointerno);
                        $rfc = $_SESSION['usuario']['rfc'];

                         $personal = mysqli_query($conexion, "SELECT CONCAT(p.nombre,' ',p.apellido) as nombre, p.correo, p.telefono, d.nombre_depto as departamento, p.tel_publico as tel
                                FROM Personal p, Departamento d
                                WHERE p.Departamento_id_depto = d.id_depto AND p.rfc = '$rfc'");

                    ?>
                    <?php
                       $datos = mysqli_fetch_assoc($personal);
                     ?>
                    <div contenido id="perfil"> 
                        <form method = "POST" action = "actualizar-perfil.php">
                            <div class="row titulo-perfil">Perfil</div>
                                <div class="perfil col-md-6">
                                    <div class="row info">
                                        <div class="col-md-5 ml-0">
                                            <label>Nombre</label>
                                            <br>
                                            <input type="text" name = "nombre" class = "estatico" value=<?=$datos['nombre'] ?> readonly="true">    
                                        </div>
                                        <div class="col-md-7 ml-0">
                                            <label>Correo Electrónico</label>
                                            <br>
                                            <input type="email" name="correo" id="correo" class = "estatico" value =<?=$datos['correo'] ?> size="40em" required>
                                        </div>
                                    </div> <!----------------  Primer renglón --------------->
                                    <div class="row info">
                                        <div class="col-md-5 ml-0">
                                            <label>Teléfono</label>
                                            <br>
                                            <input type="text" name = "telefono" id="telefono" class = "estatico" value=<?=$datos['telefono'] ?> required>
                                        <div class="opcional">
                                            <?php if($datos['tel'] =='S'): ?>
                                                <label><input type = "checkbox" name="publico" id="publico" checked="checked"> Público</label>
                                            <?php endif;?>
                                            <?php if($datos['tel'] != 'S'): ?>
                                                <label><input type = "checkbox" name="publico" id="publico"> Público</label>
                                            <?php endif;?>
                                        </div>
                                        </div>

                                        <div class="col-md-5 ml-0">
                                            <label>Oficina</label>
                                            <br>
                                            <input type="text" id="oficina" class = "estatico" value=<?=$datos['departamento'] ?> readonly="true">
                                        </div>
                                    </div> <!---- Segundo renglón ------------------->
                                <?php $db->close();?>
                                <div class="row boton">
                                    <input type="button" name="modificar" class = "btn btn-warning modificar" id= "modificar" value="Modificar">  
                                    <input type="button" name="cancelar" class = "btn btn-danger" id= "cancelar" value="Cancelar">
                                    <input type="submit" name="guardar" class= "btn btn-primary" id= "guardar" value="Guardar">
                                </div>
                            </div>
                            <div class="col-md-2 imagen-tutor">
                                <div class="row ml-0">
                                    <img src="../img/tutor.png" alt="Imagen Tutor" id="imagen" width=100px>
                                </div>
                                <div class="row">
                                    <button type = "button" class="btn btn-primary cambiarfoto">Foto de Perfil</button>
                                </div>
                            </div>
                        </form>
                    </div> <!------------  Fin Perfil Personal --------------------------------------------------------------->
				</div>
		</div>
		<footer>
			<div class="container pie">
				<p class="col-md-12">AV. TECNOLÓGICO # 2595, COL. LAGOS DEL COUNTRY. TEPIC, NAYARIT. MÉXICO. C.P. 63175. TEL: (311) 211 94 00. DIRECCION@ITTEPIC.EDU.MX</p>
			</div>			
		</footer>
</body>
</html>