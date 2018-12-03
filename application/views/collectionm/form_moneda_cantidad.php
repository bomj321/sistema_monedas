 <?php if(!empty($repeticiones)):?>
          <?php for ($i = 0; $i < $repeticiones; $i++) { ?>
          	 <input type="hidden" value="add" name="tipo_registro_moneda_add_type_<?php echo $i ?>">
							<div class="form-group">
									<label for="condicion_moneda_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select class="form-control" id="condicion_moneda_add" name="condicion_moneda_add_<?php echo $i ?>" >
									 				<option value="">Seleccione una Opcion</option>	
													<option value="G">G</option>
											 		<option value="VG">VG</option>
											 		<option value="F">F</option>
											 		<option value="VF">VF</option>
											 		<option value="XF">XF</option>
											 		<option value="AU">AU</option>
											 		<option value="UNC">UNC</option>										 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("condicion_moneda_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
							</div>	

							<div class="form-group">
									<label for="casa_certificadora_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Certificaci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Casa Certificadora" id="casa_certificadora_add_<?php echo $i ?>" name="casa_certificadora_add_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("casa_certificadora_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
							</div>

							<div class="form-group">
									<label for="valor_certificacion_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Valoraci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Valoración de la Certificadora" id="valor_certificacion_add_<?php echo $i ?>" name="valor_certificacion_add_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("valor_certificacion_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="registro_certificacion_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Registro del Certificado" id="registro_certificacion_add_<?php echo $i ?>" name="registro_certificacion_add_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("registro_certificacion_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>



								<div class="form-group">
									<label for="numero_moneda_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Numero del Moneda</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Numero del Moneda" id="numero_moneda_add" name="numero_moneda_add_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("numero_moneda_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="foto_frente_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Foto de Frente</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="file" class="form-control" id="foto_frente_<?php echo $i ?>" name="foto_frente_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("foto_frente_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="foto_detras_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Foto Por Detras</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="file" class="form-control" id="foto_detras_<?php echo $i ?>" name="foto_detras_<?php echo $i ?>">
										 	<?php 									 	
	                						echo form_error("foto_detras_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="tipo_registro_moneda_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select class="form-control" id="tipo_registro_moneda_add_<?php echo $i ?>" name="tipo_registro_moneda_add_<?php echo $i ?>" onchange="preciomoneda_add('<?php echo $i ?>')" >
									 				<option value="">Seleccione una Opcion</option>	
													<option value="Personal">Colecci&oacute;n Personal</option>													
											 		<option value="Intercambio">Intercambio</option>
											 		<option value="Venta">Venta</option>
										 	</select>
										 	<?php 									 	
	                						echo form_error("tipo_registro_moneda_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>


								<!--RESPUESTA AJAX CERTIFICACION-->
								<div id="precio_moneda_add_<?php echo $i?>" style='margin-bottom: 50px;'></div>
								<!--RESPUESTA AJAX CERTIFICACION-->

								<div class="form-group" style="margin-bottom: 20px;">
									<label for="descripcion_moneda_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Nota P&uacute;blica</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<textarea name="descripcion_moneda_add_<?php echo $i ?>" id="descripcion_moneda_add_<?php echo $i ?>" cols="30" rows="10" class="form-control"></textarea>
										 	<?php 									 	
	                						echo form_error("descripcion_moneda_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group" style="margin-bottom: 20px;">
									<label for="descripcion_moneda_privada_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Nota Privada</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<textarea name="descripcion_moneda_privada_add_<?php echo $i ?>" id="descripcion_moneda_privada_add_<?php echo $i ?>" cols="30" rows="10" class="form-control"></textarea>
										 	<?php 									 	
	                						echo form_error("descripcion_moneda_privada_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

			<?php }?>
<?php endif;?>           	