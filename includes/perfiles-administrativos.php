<!---------- Inicio Perfil Personal --------------------------------------------------------->
                    <?php
                        if(isset($_SESSION['exito'])){
                            echo"<script>swal('Correcto','".$_SESSION['exito']."', 'success');</script>";
                            unset($_SESSION['exito']);
                        }

                        $db=new ConexionBD();
                        $conexion = $db->getConnection();
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