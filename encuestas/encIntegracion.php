<?php require_once "encabezado.php"?>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                <h2>Entrevista inicial</h2>
               <br></br>
               <div id="content">
                     <table id="tabla" class="table table-bordered">
                        <thead>
                            <tr>
                                <td align ="center">
                                    <label>ÁREAS DE INTEGRACIÓN</label>
                                </td>
                            </tr>
                           <tr>
                              <td>
                                 <label>Área familiar:</label><br></br>
                                 ¿Cómo es la relación con tu familia?
                                 <input type="text" class="form-control" name="relacion">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Existen dificultades?<br></br>
                                 ¿De qué tipo?                        
                                 <input type="text" class="form-control" name="dificul">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Qué actitud tienes con tu familia?<br></br>
                                 <input type="text" class="form-control" name="actidudF">              
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <label>El Padre</label><br></br>
                                 ¿Cómo te relacionas con tu Padre?
                                 <input type="text" class="form-control" name="relP">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Qué actitud tienes hacia tu Padre?
                                 <input type="text" class="form-control" name="act-P">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <label>La Madre</label><br></br>
                                 ¿Cómo te relacionas con tu Madre?
                                 <input type="text" class="form-control" name="rel-M">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Qué actitud tienes hacia tu Madre?
                                 <input type="text" class="form-control" name="act-M">
                              </td>
                           </tr>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <div id="content">
                     <label>Familiar</label>
                     <button id="btn_add" class="btn btn-default">Agregar</button>
                     <button id="btn_del" class="btn btn-default">Eliminar</button>
                     <table id="tabla2" class="table table-bordered">
                        <thead>
                           <tr>
                              <td></td>
                              <td>Relación</td>
                              <td>Actitud</td>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <div id="content">
                     <hr>
                     <table id="tabla" class="table table-bordered">
                        <thead>
                           
                           <tr>
                              <td>
                                 ¿Con quién te sientes más ligado afectivamente?                
                                 <select name="ligado" class="form-control" style="width:150px">
                                    <option selected>Elija opción</option>
                                    <option>Madre</option>
                                    <option>Padre</option>
                                    <option>Hermano</option>
                                    <option>Otros</option>
                                 </select>
                              </td>
                           </tr>
                           <td>
                              Especifica por que:
                              <input type="text" class="form-control" name="xq">
                           </td>
                           <tr>
                           <tr>
                              <td>
                                 ¿Quién se ocupa más directamente de tu educación?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Quién ha influido más en tu decisión para estudiar esta carrera?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Consideras importante facilitar algún otro dato sobre tu ambiente familiar?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                        </thead>
                     </table>
                  </div>


                </div>

            <div align="right">
                <button type="button" class="btn btn-danger">Guardar</button>
              </div>
            </div>
            </div>

<?php require_once "pie.php"?>




