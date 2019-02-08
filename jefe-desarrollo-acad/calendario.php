<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/escudo_itt.png">
    <script src="../js/moment.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>        
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/bootstrap-datepicker.min.js"></script> <!-- nuevo-->
    <script src="../js/bootstrap-datepicker.es.min.js"></script> <!-- nuevo-->
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css"> <!-- nuevo-->
    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">       
	<?php require_once  '../includes/cabecera-actores.php';
        if (!isset($_SESSION['usuario'])||$_SESSION['usuario']['puesto_administrativo']!="Jefe de Departamento Desarrollo Academico"){
            header("Location:../index.php");
        }
    ?>
    Jefe Departamento Desarrollo Academico</p>
            </div>
        </div> <!-- /CABECERA -->
    </header>

	</div>      
        <?php require_once ("../helpers/conexion.php"); ?>

        <div class="container-fluid general">
    	    <div class="main">
                <div class="col-md-2 mmenu">
                    <?php require_once  '../includes/menuL-jefe-dep-acad.php'; ?>
                </div>
                <div class="row col-md-9">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div id="calendario"></div>
                    </div>                   
                </div>                                            				
			</div>
        </div>
        <script>
            $(document).ready(function() { //se crea el calendario y sus eventos

                $('#calendario').fullCalendar({
                    header:{
                        left:'today,prev,next,miBoton',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    weekends: false,
                    dayClick:function(date,jsEvent,view){     //al presionar un dia
                        limpiar();       
                        let check = moment(date).format('YYYY-MM-DD');
                        let today = moment(new Date()).format('YYYY-MM-DD');                                             
                        if (check >= today) {                 
                            $('#btnEliminar').prop('disabled',true);
                            $('#btnEliminar').hide();
                            $('#btnModificar').prop('disabled',true);
                            $('#btnModificar').hide();
                            $('#btnAgregar').prop('disabled',false);
                            $('#btnAgregar').show();
                            $('#fecha_mod').val(date.format()); 
                            $('#txtTitulo').prop('disabled',false);
                            $('#txtDesc').prop('disabled',false);
                            $('#txtLugar').prop('disabled',false);
                            $('#txtTipo').prop('disabled',false);
                            $('#txtHora').prop('disabled',false);
                            $("#txtHora").val('07:00');  
                            $("#hora").removeClass('col-md-3');        
                            $("#hora").addClass('col-md-4');
                            $("#tit").addClass('col-md-8');
                            $("#tit").removeClass('col-md-5');
                            $('#fecha').hide();
                            $('#modalEventos').modal();
                        }else{
                            swal('Ups!', 'No se pueden crear eventos en el pasado!', 'error');                            
                        }

                    },                        
                    events:'https://sittepic.tech/sit/jefe-desarrollo-acad/eventos.php'
                    ,
                    eventClick:function(calEvent,jsEvent,view){// al hacer clic en un evento
                        $("#tituloEV").html(calEvent.title);
                        let ca = parseInt(calEvent.cant);    
                        var fecha = calEvent.start._i.split(' ');   
                        var fm = fecha[0].split('-');                    
                        if(ca==0){
                            $('#btnEliminar').prop('disabled',false);
                            $('#btnEliminar').show();
                            $('#btnModificar').prop('disabled',false);
                            $('#btnModificar').show();
                            $('#btnAgregar').prop('disabled',true);
                            $('#btnAgregar').hide();
                            $('#txtDesc').val(calEvent.descripcion);
                            $('#txtID').val(calEvent.id);
                            $('#txtTitulo').val(calEvent.title);
                            $('#txtTipo').val(calEvent.tipo);
                            // console.log(calEvent.lugar+" el lugaaar");
                            $('#txtLugar').val(calEvent.lugar);
                            $('#txtCupo').val(calEvent.cupo);
                            $('#txtLugOc').val(calEvent.ocupados);
                            
                            $('#fecha_mod').val(fecha[0]);                                                      
                            $('#txtFecha').val(fm[2]+'/'+fm[1]+'/'+fm[0]);
                            $('#txtHora').val(fecha[1]);
                            $('#txtColor').val(calEvent.color);
                            // $('#txtCant').val(calEvent.cant);
                            $('#txtTitulo').prop('disabled',false);
                            $('#txtDesc').prop('disabled',false);
                            $('#txtLugar').prop('disabled',false);
                            $('#txtTipo').prop('disabled',false);
                            $('#txtHora').prop('disabled',false);
                            let lim = parseInt(calEvent.cupo);
                            let oc = parseInt(calEvent.ocupados)
                            
                            if(lim == oc){
                                $('#txtLugOc').prop('disabled',true);
                            }
                            else $('#txtLugOc').prop('disabled',false);
                        }else{
                            // formulario                            
                            $('#btnEliminar').prop('disabled',true);
                            $('#btnEliminar').hide();
                            $('#btnModificar').prop('disabled',false);
                            $('#btnModificar').show();
                            $('#btnAgregar').prop('disabled',true);
                            $('#btnAgregar').hide();
                            $('#txtDesc').val(calEvent.descripcion);
                            $('#txtID').val(calEvent.id);
                            $('#txtTitulo').val(calEvent.title);
                            $('#txtTitulo').prop('disabled',true);
                            $('#txtDesc').prop('disabled',true);
                            $('#txtTipo').val(calEvent.tipo);
                            // console.log(calEvent.lugar+" el lugaaar");
                            $('#txtLugar').val(calEvent.lugar);                            
                            let lim = parseInt(calEvent.cupo);
                            let oc = parseInt(calEvent.ocupados)
                            
                            if(lim == oc){
                                $('#txtLugOc').prop('disabled',true);
                                $('#btnModificar').hide();
                            }
                            else {
                                $('#txtLugOc').prop('disabled',false); $('#btnModificar').show();}
                                $('#txtCupo').val(calEvent.cupo);
                                $('#txtLugOc').val(calEvent.ocupados);
                                $('#txtTipo').prop('disabled',true);
                                $('#fecha_mod').val(fecha[0]);                                                      
                                $('#txtFecha').val(fm[2]+'/'+fm[1]+'/'+fm[0]);                                
                                $('#txtHora').val(fecha[1]);                                
                                $('#txtColor').val(calEvent.color);
                                $('#txtCant').val(calEvent.cant);
                            } 
                            $('#cupos').val(calEvent.ocupados);     
                            $("#hora").removeClass('col-md-4');
                            $("#hora").addClass('col-md-3');
                            $("#tit").removeClass('col-md-8');
                            $("#tit").addClass('col-md-5');
                            $('#fecha').show();                
                            $('#modalEventos').modal();                        
                    }
                
                });
            });
        </script>
         
<!-- Modal (Agregar,modificar,eliminar)-->
<div class="modal fade" id="modalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="tituloEV"></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="descripcion"></div>
           <!--  action="eventos.php" method="POST" -->
            <form >
            
                <div class="form-inline form-group">
                    <input type="hidden" class="form-control" id="txtID" name="txtID" disabled required="required">
                    <input type="hidden" class="form-control" id="cupos" name="cupos" disabled>
                </div>
                <input type="hidden" name="f" id="fecha_mod">                
                <div class="form-row">
                    <div id="tit" class="form-group col-md-5">
                            <label>Titulo:  </label><input type="text" class="form-control" id="txtTitulo" name="title" required="required">
                    </div>
                    <div class="form-group col-md-4" id="fecha"> 
                        <label>Fecha:</label>
                        <div class="input-group date" id="ver_fecha">                            
                            <input type="text"  required="required" id="txtFecha" class="form-control" name="fecha">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>                            
                        </div>                      
                            
                            
                    </div>  
                    <div id="hora" class="form-group col-md-3">
                        <div class="input-group clockpicker" data-autoclose="true">
                            <label>Hora: </label> <input type="time" required="required" class="form-control" id="txtHora" name="hora">
                            
                        </div>
                    </div>
                    
                </div>
               
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <textarea required rows="3" required="required" class="form-control" placeholder="Escriba aqui la descripcion de la actividad" id="txtDesc" name="descripcion"></textarea>
                    </div>
                    
                
                
                <div class="form-group">
                    <label>Tipo:</label>
                    <select required="required" name="tipo" id="txtTipo" class="form-control">   
                    <option selected="selected" value="x">
											Seleccione
										</option>                    
                        <?php
                        $db=new ConexionBD();
                        $conexion=$db->getConnection();
                        $opciones=mysqli_query($db->getConnection(),"SELECT * FROM Tipo_Conferencia");
                        while($opcion=mysqli_fetch_assoc($opciones)):?>
                            <option value="<?=$opcion['id_tipo_conf']?>"><?=$opcion['descripcion'];?></option>
                        <?php endwhile;$db->close();?>                       
                    </select>
                </div>
                <div class="form-group">
                    <label>Lugar:</label>
                    <select required="required" class="form-control" required name="lugar" id="txtLugar" onchange="d1(this)">
                    <option selected="selected" value="x">
											Seleccione
										</option>
                        <?php
                        $db=new ConexionBD();
                        $conexion=$db->getConnection();
                        $opciones=mysqli_query($db->getConnection(),"SELECT * FROM lugares");
                        while($opcion=mysqli_fetch_assoc($opciones)):?>
                            <option value="<?=$opcion['id_lugar'].",".$opcion['capacidad']?>"><?=$opcion['nombre'];?></option>
                        <?php endwhile;$db->close();?>                        
                    </select>
                </div>                
                <div class=" form-group">
                <label>Cupo: </label> <input type="text" required="required" disabled class="form-control" placeholder="cupo del lugar" id="txtCupo" name="cupo">
                </div>
                <div class="form-group">
                <label>Lugares ocupados: </label> <input type="text" required="required" class="form-control" placeholder="0" value="0" id="txtLugOc" name="ocupados"/>
                </div>
                     
                <div class="form-group">
                <input type="hidden" class="form-control" id="txtCant" name="txtCant">
                </div>            
                <div class="form-group">
                     <input type="hidden" style="width:15%;" value="#1B396A" id="txtColor" name="color"/>
                </div>
                <!-- <input type="submit" value="jj" name="agregar"/> -->
            </form>                        
      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" id="btnModificar" class="btn btn-primary">Modificar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>
<script>    
    $('#btnAgregar').click(function(){        
       setDatos('agregar',getDatos());  
         
    });
    $('#btnEliminar').click(function(){        
       setDatos('eliminar',getDatos());  
         
    });
    $('#btnModificar').click(function(){          
     
            setDatos('modificar',getDatos());  
     
         
    });
    function d1(selectTag){
        if(selectTag.value=="x"){
            $("#txtCupo").val('0');
        }else{
            var g = selectTag.value.split(',');   
            // console.log(selectTag.value+" el lugar 2");        	
            $("#txtCupo").val(g[1]);//se usa ajax para guardar el grupo									;										
        }
        
    }
    function getDatos(){
        
           
        let lugg = $('#txtLugar').val().split(',');
        let def = parseInt($('#cupos').val());
        let ocp = parseInt($('#txtLugOc').val()); 
        if(isNaN(def))
            def =0;
            if(isNaN(ocp)){  
                                            
                ocp=def;
                $('#txtLugOc').val(ocp);
            }
        nuevoEv= { //aqui esta la magia se crea un json de los datos que se enviaran por post con ajax
            id:$('#txtID').val(),
            title:$('#txtTitulo').val(),
            start:$('#txtFecha').val()+" "+$('#txtHora').val(), 
            hora:$('#txtHora').val(),
            fecha:$('#fecha_mod').val(),           
            descripcion:$('#txtDesc').val(),            
            color:$('#txtColor').val(),
            tipo:$('#txtTipo').val(),
            lugar:lugg[0],
            cupo:$('#txtCupo').val(),
            ocupados:ocp,
            textColor:'#ffffff'
        }; 
        return nuevoEv;
           
    }
    function setDatos(accion,objEv) {
        let lug = $('#txtLugar').val();
        let tip = $('#txtTipo').val(); 
        let def = parseInt($('#cupos').val());
        if(lug !== 'x' && tip!=='x'){  
            let cup = parseInt($('#txtCupo').val());
            let ocp = parseInt($('#txtLugOc').val()); 
            if(isNaN(def))
            def =0;
            if(isNaN(ocp)){  
                                               
                ocp=def;
            }
            if(cup >= ocp){    
                console.log('simon'+ocp+" ss "+def);
                if( ocp>=def) {           
                    $.ajax({
                        type:'POST', // aqui se envian los datos y la accion que se hara
                        url:'../jefe-desarrollo-acad/eventos.php?accion='+accion,
                        data:objEv,
                        success: function(msg){
                            if(msg){
                                swal('Correcto', 'Operacion exitosa!', 'success');
                                $('#calendario').fullCalendar('refetchEvents');
                                $('#modalEventos').modal('toggle');
                            }
                        },
                        error:function(){
                            swal('Ups!', 'Ya existe un evento a esa hora y en ese lugar!', 'error');
                        }
                    });               
                }else{ swal(' Ups!', 'No se puede disminuir el cupo! ', 'error');  }
            }else{
                swal('Ups!', 'No puede exceder el limite de cupos!', 'error');                
            }
        }else{
            swal('Ups!', 'Seleccione una opcion valida para el lugar o tipo de conferencia', 'error');
        }
    }
    // para crear el reloj
    $('.clockpicker').clockpicker({
        afterDone: function() {
            let hr = $("#txtHora").val();
            if (hr > '20:00' || hr < '07:00'){
                swal('Ups!', 'La hora seleccionada no es correcta!', 'error'); 
                $("#txtHora").val('07:00');
            }
        }
    });
    // para las fechas
    
        var d =new Date();    
        d = (moment(d).format('DD/MM/YYYY'));
       $('#ver_fecha').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        daysOfWeekDisabled: [0, 6],
        startDate: '0d'    
        }).on("changeDate", function (e) {
            let fselect = $("#txtFecha").val();
            var x = fselect.split('/');                   
            $('#fecha_mod').val(x[2]+'-'+x[1]+'-'+x[0]);
            console.log($('#fecha_mod').val()+' me modifique');                          
        }).on("hide",function(){
            let fs =  $("#txtFecha").val();          
            // console.log(fs+" ssfs "+d);
            if(fs == ''){
                // console.log(fs+" ssfs "+d);
                let fmod = moment($('#fecha_mod').val()).format('DD/MM/YYYY');  
                $("#txtFecha").val(fmod);
            }
                   
        });
        // $('#ver_fecha').datepicker();   
    
    // vaciar el formulario
    function limpiar(){
        $('#txtDesc').val('');
        $('#txtID').val('');
        $('#txtTitulo').val('');
        $('#txtTipo').val('x');
        $('#txtTipo').change();
        $('#txtLugar').val('x');
        $('#txtLugar').change();
        $('#txtCupo').val('');
        $('#txtLugOc').val('0');
        $("#tituloEV").html('Registro de un nuevo evento');
        $("#txtHora").val('');
        $("#txtFecha").val('');
        $("#txtCant").val('');
        $('#ocupados').val('0');
        $('#cupos').val('0');
        $('#fecha_mod').val('');
          
    }
</script>
		<?php require_once '../includes/pie.php';?>