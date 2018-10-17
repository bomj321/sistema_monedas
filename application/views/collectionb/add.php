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
							<?php if($this->session->flashdata("error_add")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $this->session->flashdata("error_add"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php 
							 $formulario = array('class' => 'form-horizontal');
							 echo form_open('collectionb/create',$formulario); 
							 ?>
							 <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata("id") ?>">
							 <input type="hidden" name="id_billete" value="<?php echo $id_billete ?>">

								<div class="form-group">
									<label for="condicion_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="condicion_billete" name="condicion_billete" >
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
	                						echo form_error("condicion_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>	

								<div class="form-group">
									<label for="casa_certificadora" class="col-sm-2 col-xs-12 col-md-2 control-label">Certificaci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input required type="text" class="form-control" placeholder="Casa Certificadora" id="casa_certificadora" name="casa_certificadora">
										 	<?php 									 	
	                						echo form_error("casa_certificadora","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>

								<div class="form-group">
									<label for="valor_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Valoraci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input required type="text" class="form-control" placeholder="Valoración de la Certificadora" id="valor_certificacion" name="valor_certificacion">
										 	<?php 									 	
	                						echo form_error("valor_certificacion","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="registro_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Registro del Certificado" id="registro_certificacion" name="registro_certificacion">
										 	<?php 									 	
	                						echo form_error("registro_certificacion","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="tipo_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Registro</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select required class="form-control" id="tipo_registro" name="tipo_registro" onchange="preciomoneda()" >
									 				<option value="">Seleccione una Opcion</option>	
													<option value="Personal">Colecci&oacute;n Personal</option>													
											 		<option value="Intercambio">Intercambio</option>
											 		<option value="Venta">Venta</option>
											 		<option value="Busco">Busco</option>									 												 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("tipo_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>
								<!--RESPUESTA AJAX CERTIFICACION-->
								<div id='gif_carga'></div>
								<div id="precio_billete"></div>
								<!--RESPUESTA AJAX CERTIFICACION-->

								<div class="form-group">
									<label for="serie_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Serie</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Numero de Serie" id="serie_billete" name="serie_billete">
										 	<?php 									 	
	                						echo form_error("serie_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="precio_referencia" class="col-sm-2 col-xs-12 col-md-2 control-label">Precio Referencia</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Precio Referencia" id="precio_referencia" name="precio_referencia">
										 	<?php 									 	
	                						echo form_error("precio_referencia","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<div class="form-group">
									<label for="lugar_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Lugar donde la Adquiri&oacute;</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Lugar donde la Adquiri&oacute;" id="lugar_billete" name="lugar_billete">
										 	<?php 									 	
	                						echo form_error("lugar_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<?php if($this->session->userdata("membresia")==1):?>
									<div class="form-group">
										<label for="cantidad_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Cantidad</label>								
										 <div class="col-md-10 col-sm-12 col-xs-12">
											 	<input onkeyup="repeticion()" type="text" class="form-control" placeholder="¿Posee alguna otra?" id="cantidad_billete" name="cantidad_billete">
											 	<?php 									 	
		                						echo form_error("cantidad_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
											    ?>
										</div>					
									</div>
								<?php endif; ?> 	

								<div class="form-group">
									<label for="descripcion_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Descripci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<textarea name="descripcion_billete" id="descripcion_billete" cols="30" rows="10" class="form-control"></textarea>
										 	<?php 									 	
	                						echo form_error("descripcion_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

								<!--Respuesta AJAX-->
								<div id="respuesta_ajax"></div>
								<!--Respuesta AJAX-->
							
								<div class="col-md-12 col-sm-12 col-xs-12">		
									<center><button class="btn btn-primary" type="submit" id="button">Agregar a Colecci&oacute;n</button></center>
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