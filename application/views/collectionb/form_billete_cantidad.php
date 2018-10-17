 <?php if(!empty($repeticiones)):?>
          <?php for ($i = 1; $i <= $repeticiones; $i++) { ?>
							<div class="form-group">
									<label for="condicion_billete_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="condicion_billete_add" name="condicion_billete_add" >
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
	                						echo form_error("condicion_billete_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
							</div>	

							<div class="form-group">
									<label for="serie_billete_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Serie</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Numero de Serie" id="serie_billete_add" name="serie_billete_add">
										 	<?php 									 	
	                						echo form_error("serie_billete_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="subserie_billete_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Subserie</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Numero de Subserie" id="subserie_billete_add" name="subserie_billete_add">
										 	<?php 									 	
	                						echo form_error("subserie_billete_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>


								<div class="form-group">
									<label for="numero_billete_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Numero del Billete</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Numero del Billete" id="numero_billete_add" name="numero_billete_add">
										 	<?php 									 	
	                						echo form_error("numero_billete_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="foto_frente" class="col-sm-2 col-xs-12 col-md-2 control-label">Foto de Frente</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="file" class="form-control" id="foto_frente" name="foto_frente">
										 	<?php 									 	
	                						echo form_error("foto_frente","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="foto_detras" class="col-sm-2 col-xs-12 col-md-2 control-label">Foto Por Detras</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="file" class="form-control" id="foto_detras" name="foto_detras">
										 	<?php 									 	
	                						echo form_error("foto_detras","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="tipo_registro_add_<?php echo $i ?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="tipo_registro_add_<?php echo $i ?>" name="tipo_registro_add_<?php echo $i ?>" onchange="preciomoneda_add('<?php echo $i ?>')" >
									 				<option value="">Seleccione una Opcion</option>	
													<option value="Personal">Colecci&oacute;n Personal</option>													
											 		<option value="Intercambio">Intercambio</option>
											 		<option value="Venta">Venta</option>
										 	</select>
										 	<?php 									 	
	                						echo form_error("tipo_registro_add_<?php echo $i ?>","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>


								<!--RESPUESTA AJAX CERTIFICACION-->
								<div id='gif_carga_add_<?php echo $i?>'></div>
								<div id="precio_billete_add_<?php echo $i?>" style='margin-bottom: 50px;'></div>
								<!--RESPUESTA AJAX CERTIFICACION-->
			<?php }?>
<?php endif;?>           	