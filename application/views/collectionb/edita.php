<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar a Colecci&oacute;n</h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Colleci&oacute;n de Billetes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                 

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error_edit")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $this->session->flashdata("error_edit"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php 
							 $formulario = array('class' => 'form-horizontal');
							 echo form_open_multipart('collectionb/edita_billete',$formulario); 
							 ?>
							 <input type="text" name="id_coleccion_personal_billete" value="<?php echo $billete->id_coleccion_personal_billete ?>">

								<div class="form-group">
									<label for="condicion_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="condicion_billete" name="condicion_billete" >
									 				<option value="">Seleccione una Opcion</option>	
													<option  <?php echo $billete->condicion_billete == 'G' ? 'selected' : '' ?> value="G">G</option>
											 		<option  <?php echo $billete->condicion_billete == 'VG' ? 'selected' : '' ?> value="VG">VG</option>
											 		<option  <?php echo $billete->condicion_billete == 'F' ? 'selected' : '' ?> value="F">F</option>
											 		<option  <?php echo $billete->condicion_billete == 'VF' ? 'selected' : '' ?> value="VF">VF</option>
											 		<option  <?php echo $billete->condicion_billete == 'XF' ? 'selected' : '' ?> value="XF">XF</option>
											 		<option  <?php echo $billete->condicion_billete == 'AU' ? 'selected' : '' ?> value="AU">AU</option>
											 		<option  <?php echo $billete->condicion_billete == 'UNC' ? 'selected' : '' ?> value="UNC">UNC</option>										 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("condicion_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>	

								<div class="form-group">
									<label for="casa_certificadora" class="col-sm-2 col-xs-12 col-md-2 control-label">Certificaci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->casa_certificadora ?>" required type="text" class="form-control" placeholder="Casa Certificadora" id="casa_certificadora" name="casa_certificadora">
										 	<?php 									 	
	                						echo form_error("casa_certificadora","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>

								<div class="form-group">
									<label for="valor_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Valoraci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->valor_certificacion ?>" required type="text" class="form-control" placeholder="Valoración de la Certificadora" id="valor_certificacion" name="valor_certificacion">
										 	<?php 									 	
	                						echo form_error("valor_certificacion","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="registro_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->registro_certificacion ?>" required type="text" class="form-control" placeholder="Registro del Certificado" id="registro_certificacion" name="registro_certificacion">
										 	<?php 									 	
	                						echo form_error("registro_certificacion","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="tipo_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="tipo_registro" name="tipo_registro">
									 				<option value="">Seleccione una Opcion</option>	
													<option <?php echo $billete->tipo_registro == 'Personal' ? 'selected' : '' ?> value="Personal">Colecci&oacute;n Personal</option>
											 		<option <?php echo $billete->tipo_registro == 'Intercambio' ? 'selected' : '' ?> value="Intercambio">Intercambio</option>
											 		<option <?php echo $billete->tipo_registro == 'Venta' ? 'selected' : '' ?> value="Venta">Venta</option>
											 		<option <?php echo $billete->tipo_registro == 'Busco' ? 'selected' : '' ?> value="Busco">Busco</option>									 												 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("tipo_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>

								<div class="form-group">
								    <label for="precio_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Precio</label>                              
								     <div class="col-md-10 col-sm-12 col-xs-12">
								            <input value="<?php echo $billete->precio_billete ?>" type="text" class="form-control" placeholder="Precio del Billete" id="precio_billete" name="precio_billete">
								            <?php                                       
								            echo form_error("precio_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
								            ?>
								    </div>                  
							    </div>

							    <div class="form-group">
									<label for="mercado" class="col-sm-2 col-xs-12 col-md-2 control-label">Mercado</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="mercado" name="mercado">
									 				<option value="">Seleccione una Opcion</option>	
													<option <?php echo $billete->mercado == '1' ? 'selected' : '' ?> value="1">Si</option>
											 		<option <?php echo $billete->mercado == '0' ? 'selected' : '' ?> value="2">No</option>
											 										 												 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("mercado","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>


								<div class="form-group">
									<label for="serie_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Serie</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->serie_billete ?>" required type="text" class="form-control" placeholder="Numero de Serie" id="serie_billete" name="serie_billete">
										 	<?php 									 	
	                						echo form_error("serie_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="subserie" class="col-sm-2 col-xs-12 col-md-2 control-label">Subserie</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->subserie ?>" required type="text" class="form-control" placeholder="Numero de Sub-serie si lo tiene" id="subserie" name="subserie">
										 	<?php 									 	
	                						echo form_error("subserie","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								
								<div class="form-group">
									<label for="numero_billete_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Numero del Billete</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->numero_billete_add ?>" type="text" required class="form-control" placeholder="Numero del Billete" id="numero_billete_add" name="numero_billete_add">
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
									<label for="lugar_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Lugar donde la Adquiri&oacute;</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input value="<?php echo $billete->lugar_billete ?>" required type="text" class="form-control" placeholder="Lugar donde la Adquiri&oacute;" id="lugar_billete" name="lugar_billete">
										 	<?php 									 	
	                						echo form_error("lugar_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>
									

								<div class="form-group" style="margin-bottom: 50px;">
									<label for="descripcion_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Descripci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<textarea required name="descripcion_billete" id="descripcion_billete" cols="30" rows="10" class="form-control"><?php echo $billete->descripcion_billete ?></textarea>
										 	<?php 									 	
	                						echo form_error("descripcion_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12">		
									<center><button class="btn btn-primary" type="submit" id="button">Editar</button></center>
								</div>	


							<?php echo form_close(); ?>					
							
						</div>
                 </div>

                  	
<!--CONTENIDO-->
                </div>
              </div>       
             </div>             
            </div>
          </div>  
</div>
        <!---------