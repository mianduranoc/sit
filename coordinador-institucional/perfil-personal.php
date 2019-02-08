<!DOCTYPE html>
<html lang="es">
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="./img/escudo_itt.png">
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
	
	Coordinador Institucional de Tutorias</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>
    <body>
		<div class="container-fluid general">
				<div class="col-md-2">
					<?php require_once  '../includes/menuL-coordinador-inst.php'; ?>
				</div>
				<div class="col-md-10">
					<?php require_once '../includes/perfiles-administrativos.php' ?>
				</div>
				
				
		</div>
		<footer>
			<div class="container pie">
				<p class="col-md-12">AV. TECNOLÓGICO # 2595, COL. LAGOS DEL COUNTRY. TEPIC, NAYARIT. MÉXICO. C.P. 63175. TEL: (311) 211 94 00. DIRECCION@ITTEPIC.EDU.MX</p>
			</div>			
		</footer>
</body>
</html>