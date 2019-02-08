<div class="" id="listado-tutorados">
				
					<div class="row titulo">Listado de Tutorados 333</div>
					<div class="row">
						<form method="POST">
							<select name="id_carrera" class="asignar" onchange = "d1(this)" style="width: 13em;margin-left: 80%;">
								<script type="text/javascript">
									function d1(selectTag){
										$("#asis").load('../coordinador-departamental/filtrar-tutorados.php',{filtro:selectTag.value});
									}
								</script>
								<option value="0">Seleccione Carrera</option>
										<?php
                                            $db=new ConexionBD();
                                            $conexion=$db->getConnection();
                                            $carreras=mysqli_query($db->getConnection(),"SELECT * FROM Carrera");
                                           	echo mysqli_error($conexion);
                                           	die();
                                            while($carrera=mysqli_fetch_assoc($carreras)):?>
                                            	
                                                <option name="asignar[]" value="<?=$carrera['id_carrera']?>"><?=$carrera['nombre'];?></option>
                                            <?php endwhile;?>
									</select>
						</form>
						
					</div>
						<table class="table table-hover" id="asis">
							
                		</table>
                </div>