<?php require_once "encabezado.php"?>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                <h2>Entrevista inicial</h2>
               <br></br>


                  <div class="row">
                     <div class="col-lg-4">
                        <label>Tipo de Vivienda:</label><br></br>
                        <input type="radio" name="vivienda" value="casa">Casa 
                        &nbsp<input type="radio" name="vivienda" value="departamento">Departamento
                     </div>
                     <div class="col-lg-6">
                        <label>La vivienda donde vives es:</label><br></br>
                        <input type="radio" name="t-vivienda" value="casa">Propia
                        &nbsp<input type="radio" name="t-vivienda" value="departamento">Rentada
                        &nbsp<input type="radio" name="t-vivienda" value="departamento">Prestada
                     </div>
                     <div class="col-lg-4">
                        <label>Otro:</label><input type="text" class="form-control" placeholder="Especifique">
                     </div>
                  </div>
                  <div class="row">
                  </div>
                  <div class="row">
                     <div class="col-lg-4"><br>
                        <label>Número de personas con las que vives: </label> <input type="number" class="form-control" name="personas" min="1" style="width:100px"></br>
                     </div>
                     <div class="col-lg-6"><br>
                        <label>Parentesco: (Seleccione varios si es necesario)  </label><br></br>
                        <input type="radio" name="padre" value="padre">Padre
                        <input type="radio" name="madre" value="madre">Madre
                        <input type="radio" name="tutor" value="tutor">Tutor
                        <input type="radio" name="hermanos" value="hermanos">Hermanos(as)
                        <input type="radio" name="abuelos" value="abuelos">Abuelos(as) 
                        &nbsp&nbsp&nbsp&nbsp<input type="radio" name="tios" value="tios">Tios(as)
                        <input type="radio" name="p-otros" value="otros">Otros</br>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-lg-5">
                        <label>Nombre del padre:</label><input type="text" class="form-control" name="n-padre">
                     </div>
                     <div class="col-lg-2">
                        <label for="edad">Edad:</label><input type="number" class="form-control" min="30" max="90" /> 
                     </div>
                     <div class="col-lg-3"><br>
                        <label>Trabaja:  </label>
                        <input type="radio" name="trabaja2" value="si">Si
                        <input type="radio" name="trabaja2" value="no">No
                     </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-3">
                        <label>Profesion: </label>
                        <select name="profesion" class="form-control">
                           <option selected>Elija la profesion</option>
                           <option>Ninguna</option>
                           <option>Comerciante</option>
                           <option>Trabajador</option>
                           <option>Maestro</option>
                           <option>Licenciado</option>
                           <option>Ingeniero</option>
                           <option>Personal de la salud</option>
                           <option>Otra</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Tipo de trabajo: </label> <input type="text" name="t-trabajo" class="form-control">
                     </div>
                     <div class="col-lg-5">
                        <label>Domicilio: </label> <input type="text" name="m-dom" class="form-control" placeholder="Calle, Colonia, Número">
                     </div>
                     <div class="col-lg-2">
                        <label>Telefono: </label> <input type="text" name="t-trabajo" class="form-control">
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-lg-5">
                        <label>Nombre de la madre:</label><input type="text" class="form-control" name="n-padre">
                     </div>
                     <div class="col-lg-2">
                        <label for="edad">Edad:</label><input type="number" class="form-control" min="30" max="90" /> 
                     </div>
                     <div class="col-lg-3"><br>
                        <label>Trabaja:  </label>
                        <input type="radio" name="trabaja" value="si">Si
                        <input type="radio" name="trabaja" value="no">No
                     </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-3">
                        <label>Profesion: </label>
                        <select name="profesion" class="form-control">
                           <option selected>Elija la profesion</option>
                           <option>Ninguna</option>
                           <option>Comerciante</option>
                           <option>Trabajador</option>
                           <option>Maestro</option>
                           <option>Licenciado</option>
                           <option>Ingeniero</option>
                           <option>Personal de la salud</option>
                           <option>Otra</option>
                        </select>
                     </div>
                     </div>
                  
                  <div class="row">
                     <div class="col-lg-3">
                        <label>Tipo de trabajo: </label> <input type="text" name="t-trabajo" class="form-control">
                     </div>
                     <div class="col-lg-5">
                        <label>Domicilio: </label> <input type="text" name="m-dom" class="form-control" placeholder="Calle, Colonia, Número">
                     </div>
                     <div class="col-lg-2">
                        <label>Telefono: </label> <input type="text" name="t-trabajo" class="form-control">
                     </div>
                  </div>
                  <div id="content">
                     <hr>
                     <br>
                     <label>Nombre de tus hermanos por edad (del mayor al menor incluyéndote tú)</label>
                     <button id="bt_add" class="btn btn-default">Agregar</button>
                     <button id="bt_del" class="btn btn-default">Eliminar</button>
                     <table id="tabla" class="table table-bordered" >
                        <thead>
                           <tr>
                              </br><br></br>
                              <td>Número</td>
                              <td>Nombre Completo     </td>
                              <td>Fecha de nacimiento</td>
                              <td>Sexo</td>
                              <td>Estudios</td>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <!-- Editable table -->



                </div>
            <div align="right">
                <button type="button" class="btn btn-danger">Guardar</button>
            </div>
            </div>
<?php require_once "pie.php"?>















