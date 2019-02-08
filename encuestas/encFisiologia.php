<?php require_once "encabezado.php"?>
			<div class="col-md-8 contenido">
                <div class="cuerpo">
                <h2>Entrevista inicial</h2>
               <br></br>
               <div id="content">
                   <style>
                       .alinea{
                           text-align: center;
                       }
                   </style>
                     <label>DESAJUSTES PSICOFISIOLOGICOS</label>
                     <table id="tabla" class="table table-hover">
                        <thead>
                           <tr align="center">
                              <td><label>Indicadores</label></td>
                              <td><label>Frecuentemente</label></td>
                              <td><label>Muy frecuentemente</label></td>
                              <td><label>Nunca</label></td>
                              <td><label>Antes</label></td>
                              <td><label>A veces</label></td>
                           </tr>
                           <tr>
                              <td>Manos y/o pies hinchados</td>
                              <td class="alinea" ><input type="radio" name="myp" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="myp" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="myp" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="myp" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="myp" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Dolores en el vientre</td>
                              <td class="alinea" ><input type="radio" name="dol" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="dol" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="dol" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="dol" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="dol" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Dolores de cabeza y/o vómitos</td>
                              <td class="alinea" ><input type="radio" name="vom" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="vom" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="vom" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="vom" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="vom" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Pérdida del equilibrio</td>
                              <td class="alinea" ><input type="radio" name="equ" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="equ" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="equ" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="equ" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="equ" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Fatiga y agotamiento</td>
                              <td class="alinea" ><input type="radio" name="fat" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="fat" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="fat" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="fat" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="fat" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Pérdida de vista u oído</td>
                              <td class="alinea" ><input type="radio" name="per" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="per" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="per" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="per" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="per" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Dificultades para dormir</td>
                              <td class="alinea" ><input type="radio" name="dor" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="dor" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="dor" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="dor" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="dor" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Pesadillas o terrores nocturnos</td>
                              <td class="alinea" ><input type="radio" name="pes" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="pes" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="pes" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="pes" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="pes" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Incontinencia (orina, heces)</td>
                              <td class="alinea" ><input type="radio" name="inc" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="inc" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="inc" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="inc" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="inc" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Tartamudeos al explicarse</td>
                              <td class="alinea" ><input type="radio" name="tar" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="tar" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="tar" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="tar" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="tar" value="avec"></td>
                           </tr>
                           <tr>
                              <td>Miedos intensos ante cosas</td>
                              <td class="alinea" ><input type="radio" name="mie" value="frec"></td>
                              <td class="alinea" ><input type="radio" name="mie" value="mfre"></td>
                              <td class="alinea" ><input type="radio" name="mie" value="nun"></td>
                              <td class="alinea" ><input type="radio" name="mie" value="ant"></td>
                              <td class="alinea" ><input type="radio" name="mie" value="avec"></td>
                           </tr>
                        </thead>
                     </table>
                     <div class="row">
                        <div class="col-lg-7">
                           <label>Observaciones de higiene:</label><input type="text" class="form-control" name="higiene">
                        </div>
                     </div>
                </div>
            
            
            
            
        
            <div align="right">
                <button type="button" class="btn btn-danger">Guardar</button>
              </div></div>
            </div>
<?php require_once "pie.php"?>





