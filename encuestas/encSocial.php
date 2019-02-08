<?php require_once "encabezado.php"?>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                <h2>Entrevista inicial</h2>
               <br></br>
                    <style>
                        .alinea{
                            text-align: center;
                        }
                    </style>

                  <div id="content">
                     <table id="tabla" class="table table-bordered">
                        <thead>
                           <tr>
                              <td align ="center">
                                 <label>ÁREA SOCIAL</label>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Cómo es tu relación con los compañeros?               
                                 <select name="rela" class="form-control" style="width:150px">
                                    <option selected>Elija opción</option>
                                    <option>Buena</option>
                                    <option>Regular</option>
                                    <option>Mala</option>
                                 </select>
                              </td>
                           </tr>
                           <td>
                              ¿Por qué?
                              <input type="text" class="form-control" name="xq">
                           </td>
                           <tr>
                           <tr>
                              <td>
                                 ¿Cómo es tu relación con tus amigos?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Tienes Pareja?
                                 <input type="text" class="form-control" name="preo" style="width:150px">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Cómo es tu relación con tu pareja?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Cómo es tu relación con tus maestros?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Cómo es tu relación con las autoridades académicas?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Qué haces en tu tiempo libre?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 ¿Cuál es tu actividad recreativa?
                                 <input type="text" class="form-control" name="preo">
                              </td>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <div id="content">
                     <hr>
                     <table id="tabla" class="table table-bordered">
                        <thead>
                           <tr>
                              <label>CARACTERÍSTICAS PERSONALES (MADUREZ Y EQUILIBRIO)</label>
                           </tr>
                           <tr align ="center">
                              <td><label>Autopercepción</label></td>
                              <td><label>No</label></td>
                              <td><label>Poco</label></td>
                              <td ><label>Frecuente</label></td>
                              <td><label>Mucho</label></td>
                              <td><label>Observaciones</label></td>
                           </tr>
                           <tr>
                              <td>Puntual</td>
                              <td class="alinea" ><input type="radio" name="punt" value="no"></td>
                              <td class="alinea" ><input type="radio" name="punt" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="punt" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="punt" value="mucho"></td>
                              <td><input type="text" class="form-control" name="punt"></td>
                           </tr>
                           <tr>
                              <td>Timido/a</td>
                              <td class="alinea" ><input type="radio" name="timi" value="no"></td>
                              <td class="alinea" ><input type="radio" name="timi" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="timi" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="timi" value="mucho"></td>
                              <td><input type="text" class="form-control" name="timi"></td>
                           </tr>
                           <tr>
                              <td>Alegre</td>
                              <td class="alinea" ><input type="radio" name="alegre" value="no"></td>
                              <td class="alinea" ><input type="radio" name="alegre" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="alegre" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="alegre" value="mucho"></td>
                              <td><input type="text" class="form-control" name="alegre"></td>
                           </tr>
                           <tr>
                              <td>Agresivo/a</td>
                              <td class="alinea" ><input type="radio" name="agresivo" value="no"></td>
                              <td class="alinea" ><input type="radio" name="agresivo" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="agresivo" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="agresivo" value="mucho"></td>
                              <td><input type="text" class="form-control" name="agresivo"></td>
                           </tr>
                           <tr>
                              <td>Abierto/a a las ideas de otros</td>
                              <td class="alinea" ><input type="radio" name="abierto" value="no"></td>
                              <td class="alinea" ><input type="radio" name="abierto" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="abierto" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="abierto" value="mucho"></td>
                              <td><input type="text" class="form-control" name="abierto"></td>
                           </tr>
                           <tr>
                              <td>Reflexivo</td>
                              <td class="alinea" ><input type="radio" name="refle" value="no"></td>
                              <td class="alinea" ><input type="radio" name="refle" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="refle" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="refle" value="mucho"></td>
                              <td><input type="text" class="form-control" name="refle"></td>
                           </tr>
                           <tr>
                              <td>Constante</td>
                              <td class="alinea" ><input type="radio" name="constante" value="no"></td>
                              <td class="alinea" ><input type="radio" name="constante" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="constante" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="constante" value="mucho"></td>
                              <td><input type="text" class="form-control" name="constante"></td>
                           </tr>
                           <tr>
                              <td>Optimista</td>
                              <td class="alinea" ><input type="radio" name="optimi" value="no"></td>
                              <td class="alinea" ><input type="radio" name="optimi" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="optimi" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="optimi" value="mucho"></td>
                              <td><input type="text" class="form-control" name="optimi"></td>
                           </tr>
                           <tr>
                              <td>Impulsivo/a</td>
                              <td class="alinea" ><input type="radio" name="impulsivo" value="no"></td>
                              <td class="alinea" ><input type="radio" name="impulsivo" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="impulsivo" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="impulsivo" value="mucho"></td>
                              <td><input type="text" class="form-control" name="impulsivo"></td>
                           </tr>
                           <tr>
                              <td>Silencioso/a</td>
                              <td class="alinea" ><input type="radio" name="silencioso" value="no"></td>
                              <td class="alinea" ><input type="radio" name="silencioso" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="silencioso" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="silencioso" value="mucho"></td>
                              <td><input type="text" class="form-control" name="silencioso"></td>
                           </tr>
                           <tr>
                              <td>Generoso/a</td>
                              <td class="alinea" ><input type="radio" name="generoso" value="no"></td>
                              <td class="alinea" ><input type="radio" name="generoso" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="generoso" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="generoso" value="mucho"></td>
                              <td><input type="text" class="form-control" name="generoso"></td>
                           </tr>
                           <tr>
                              <td>Inquieto/a</td>
                              <td class="alinea" ><input type="radio" name="inquieto" value="no"></td>
                              <td class="alinea" ><input type="radio" name="inquieto" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="inquieto" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="inquieto" value="mucho"></td>
                              <td><input type="text" class="form-control" name="inquieto"></td>
                           </tr>
                           <tr>
                              <td>Cambios de humor</td>
                              <td class="alinea" ><input type="radio" name="c-hum" value="no"></td>
                              <td class="alinea" ><input type="radio" name="c-hum" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="c-hum" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="c-hum" value="mucho"></td>
                              <td><input type="text" class="form-control" name="c-hum"></td>
                           </tr>
                           <tr>
                              <td>Dominante</td>
                              <td class="alinea" ><input type="radio" name="dominante" value="no"></td>
                              <td class="alinea" ><input type="radio" name="dominante" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="dominante" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="dominante" value="mucho"></td>
                              <td><input type="text" class="form-control" name="dominante"></td>
                           </tr>
                           <tr>
                              <td>Egoista</td>
                              <td class="alinea" ><input type="radio" name="egoista" value="no"></td>
                              <td class="alinea" ><input type="radio" name="egoista" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="egoista" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="egoista" value="mucho"></td>
                              <td><input type="text" class="form-control" name="egoista"></td>
                           </tr>
                           <tr>
                              <td>Sumiso/a</td>
                              <td class="alinea" ><input type="radio" name="sumiso" value="no"></td>
                              <td class="alinea" ><input type="radio" name="sumiso" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="sumiso" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="sumiso" value="mucho"></td>
                              <td><input type="text" class="form-control" name="sumiso"></td>
                           </tr>
                           <tr>
                              <td>Confiado/a en si mismo/a</td>
                              <td class="alinea" ><input type="radio" name="confiado" value="no"></td>
                              <td class="alinea" ><input type="radio" name="confiado" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="confiado" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="confiado" value="mucho"></td>
                              <td><input type="text" class="form-control" name="confiado"></td>
                           </tr>
                           <tr>
                              <td>Imaginativo/a</td>
                              <td class="alinea" ><input type="radio" name="imagina" value="no"></td>
                              <td class="alinea" ><input type="radio" name="imagina" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="imagina" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="imagina" value="mucho"></td>
                              <td><input type="text" class="form-control" name="imagina"></td>
                           </tr>
                           <tr>
                              <td>Con iniciativa propia</td>
                              <td class="alinea" ><input type="radio" name="iniciativa" value="no"></td>
                              <td class="alinea" ><input type="radio" name="iniciativa" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="iniciativa" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="iniciativa" value="mucho"></td>
                              <td><input type="text" class="form-control" name="iniciativa"></td>
                           </tr>
                           <tr>
                              <td>Sociable</td>
                              <td class="alinea" ><input type="radio" name="sociable" value="no"></td>
                              <td class="alinea" ><input type="radio" name="sociable" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="sociable" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="sociable" value="mucho"></td>
                              <td><input type="text" class="form-control" name="sociable"></td>
                           </tr>
                           <tr>
                              <td>Responsable</td>
                              <td class="alinea" ><input type="radio" name="respo" value="no"></td>
                              <td class="alinea" ><input type="radio" name="respo" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="respo" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="respo" value="mucho"></td>
                              <td><input type="text" class="form-control" name="respo"></td>
                           </tr>
                           <tr>
                              <td>Perseverante</td>
                              <td class="alinea" ><input type="radio" name="perse" value="no"></td>
                              <td class="alinea" ><input type="radio" name="perse" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="perse" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="perse" value="mucho"></td>
                              <td><input type="text" class="form-control" name="perse"></td>
                           </tr>
                           <tr>
                              <td>Motivado/a</td>
                              <td class="alinea" ><input type="radio" name="motivado" value="no"></td>
                              <td class="alinea" ><input type="radio" name="motivado" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="motivado" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="motivado" value="mucho"></td>
                              <td><input type="text" class="form-control" name="motivado"></td>
                           </tr>
                           <tr>
                              <td>Independiente</td>
                              <td class="alinea" ><input type="radio" name="indepen" value="no"></td>
                              <td class="alinea" ><input type="radio" name="indepen" value="poco"></td>
                              <td class="alinea" ><input type="radio" name="indepen" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="indepen" value="mucho"></td>
                              <td><input type="text" class="form-control" name="indepen"></td>
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





