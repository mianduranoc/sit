<?php require_once "encabezado.php"?>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                <h2>Entrevista inicial</h2>
               <br></br>
               <form>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="nombre">Nombre:</label><input type="text" class="form-control">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Estatura:</label><input type="text" class="form-control" >  
                     </div>
                     <div class="col-lg-3">            
                        <label>Peso:</label><input type="text" class="form-control">
                     </div>
                     <div class="form-group col-lg-3 ">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" class="form-control">
                           <option selected>Elija la carrera</option>
                           <option>Arquitectura</option>
                           <option>Ing. Bioquímica</option>
                           <option>Ing. Civil</option>
                           <option>Ing. Eléctrica</option>
                           <option>Ing. Gestión Empresarial</option>
                           <option>Ing. Industrial</option>
                           <option>Ing. Mecatrónica</option>
                           <option>Ing. Química</option>
                           <option>Ing. Sistemas Computacionales</option>
                           <option>Ing. Tecnologias de la Informacion y Comunicaciones</option>
                           <option>Lic. Administracion</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Fecha de Nacimiento</label><input type="date" class="form-control" />   
                     </div>
                     <div class="col-lg-3">
                        <label>Sexo:</label>
                        <select name="sexo1" class="form-control">
                           <option selected>Elija opción</option>
                           <option>Masculino</option>
                           <option>Femenino</option>
                        </select>
                     </div>
                     <div class="col-lg-2">
                        <label for="edad">Edad:</label><input type="number" class="form-control" min="17" max="90" /> 
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <label>Estado Civil:</label>&nbsp
                        <input type="radio" name="e-civil" value="Soltero">Soltero
                        <input type="radio" name="e-civil" value="Casado">Casado
                     </div>
                     <div class="col-lg-3">
                        <label>Otro:</label><input type="text" class="form-control" placeholder="Especifique">
                     </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-4"> 
                        <label>Trabaja:</label>
                        <input type="radio" name="trabajo1" value="Si">Si
                        <input type="radio" name="trabajo1" value="No">No
                     </div>
                     <div class="col-lg-3">
                        <label>Otro:</label><input type="text" class="form-control" placeholder="Especifique">
                     </div>
                     </div>
                  
                  <div class="row">
                     <div class="col-lg-5">
                        <label>Lugar de Nacimiento: </label><input type="text" class="form-control" placeholder="Ciudad, Estado">
                     </div>
                     <div class="col-lg-7">
                        <label>Domicilio actual: </label><input type="text" class="form-control"placeholder="Calle, Colonia, Número">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Telefono: </label><input type="text" class="form-control">
                     </div>
                     <div class="col-lg-4">
                        <label>Codigo Postal: </label><input type="text" class="form-control">
                     </div>
                     <div class="col-lg-4">
                        <label>E-mail: </label><input type="text" class="form-control" placeholder="ejemplo@dominio.com">
                     </div>
                  </div>
                  <hr>
                  <!-- FIN DE PERSONAL-->
                  <!-- INICIA FAMILIA-->

                  <!-- FIN DE FAMLIA-->
                  <!-- INICIO DE ESCOLAR-->

                  <!-- FIN DE ESCOLAR-->
                  <!-- INICIO DE PSICOFISIOLOGICO-->

                  <!-- FIN DE PSICOFISIOLOGICO-->
                  <!-- INICIO AREA DE INTEGRACION-->

                <!--FIN DE AREA INTEGRACION-->
                <!--INICIO DE AREA SOCIAL-->

                  <!--FIN DE AREA SOCIAL-->
                  <!--INICIO DE AREA PSICOPEDAGOGICA-->

                  <!--FIN DE AREA PSICOPEDAGOGICA-->
                  <!--INICIO DE VIDA Y CARRERA-->

                  <!--FIN DE VIDA Y CARRERA-->
               </form>



                </div>
            
            
            <div align="right">
                <button type="button" class="btn btn-danger">Guardar</button>
            </div>
        </div>
<?php require_once "pie.php"?>