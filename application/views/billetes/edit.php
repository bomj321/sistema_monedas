<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editar Billete<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Billetes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                  	<!--CONSULTA SQL-->

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <center><p><?php echo $this->session->flashdata("error"); ?></p></center>                                
                             </div>
                       		 <?php endif;?> 
							<?php
							$formulario = array('class' => 'form-horizontal');

							 echo form_open_multipart('billetes/update',$formulario); 

							 ?>

<!----------------------------------------------PARTE DE AGREGAR NUEVOS ATRIBUTOS----------------------------->							 
<?php if(!empty($atributos_not)): ?>

	<center><strong><h3>Atributos no Agregados</h3></strong></center>

		<?php foreach($atributos_not as $atributo_not):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not->nombre_atributo,
										 			'placeholder'  =>  $atributo_not->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not->nombre_atributo,
										 			'placeholder'  =>  $atributo_not->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>

		<div class="form-group">
					<?php 
						$label_atributo = array(
		                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
						);


						echo form_label($atributo_not->nombre_atributo,$atributo_not->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not->id_atributo_b;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>		

		<?php endforeach;?>



	<hr>
<?php endif; ?>
<!----------------------------------------------PARTE DE AGREGAR NUEVOS ATRIBUTOS------------------------->



<!-----------------------------------------------------PARTE DE ATRIBUTOS AGREGADOS--------------------------------------->


				<center><strong><h3>Atributos Agregados</h3></strong></center>
							 <?php foreach($atributos as $atributo):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo->nombreatributo,
										 			'placeholder'  =>  $atributo->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo->descripcionatributo,
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
									 				$id_unico        = 'id_unico[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo->nombreatributo,
										 			'placeholder'  =>  $atributo->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo->descripcionatributo,
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>

									<div class="form-group">
										<?php 
											$label_atributo = array(
							                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                						);


	                						echo form_label($atributo->nombreatributo,$atributo->nombreatributo,$label_atributo)
										 ?>
										 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo->id_atributo_b;?>">
								         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
								 </div>

							 	<?php endforeach;?>
<!-----------------------------------------------------PARTE DE ATRIBUTOS AGREGADOS--------------------------------------->


<!-----------------------------------------------------SECCION DE PAGOS-------------------------------------------------->
							<?php if(!empty($catalogos)): ?>	
							 	<div class="form-group">
							 		<?php 
										$label_profesor = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
                						);


                						echo form_label('Catalogos','catalogo',$label_profesor)
									 ?>
							 	

								 	<div class="col-md-10 col-sm-12 col-xs-12">
										 	<select  class="form-control" id="catalogo" onchange="catalogoinput()">
												<?php if(!empty($catalogos)): ?>
											 		<option value="">Seleccione una Opcion</option>
											 		<?php foreach ($catalogos as  $catalogo): ?>
														<option  value="<?php echo $catalogo->id_atributo_b?>" <?php echo set_select('catalogo',$catalogo->id_atributo_b);?>><?php echo $catalogo->nombre_atributo?></option>
											 		<?php endforeach; ?>
											 	<?php else: ?>	
														<option value="">No hay Catalogos</option>
											 <?php endif; ?>
										 	</select>
										 	<?php 									 	
	                						echo form_error("catalogo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
								</div>
							 <?php endif; ?>	

								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
								<div id="gif_carga" class="form-group"></div>
								<div id="input_creado" class="col-md-12 col-sm-12 col-lg-12"></div>	
								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
<!-----------------------------------------------------SECCION DE PAGOS-------------------------------------------------->


<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
							<?php if(!empty($catalogos_edit)): ?>
						<center><strong><h3>Catalogos Agregados</h3></strong></center>
							 <?php endif; ?>							
            <?php foreach($catalogos_edit as $catalogo_edit):?>    
								 <table class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
								 	<input type="hidden" value="<?php echo $catalogo_edit->id_unico_atributo ?>" name="id_unico_catalogo_edit[]">
								 	<input type="hidden" value="<?php echo $catalogo_edit->id_atributo_edit ?>" name="id_atributo_edit[]">
								        <thead>
								        	<tr >
								        	  <th colspan="7">
								        	  	<div class="row">
									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  				  	<center style="margin-top: 10px;"><?php echo $catalogo_edit->nombreatributo;?></center>
									  				</div>

									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  				<center style="margin-top: 10px;"><input class="form-control" type="text" name="numero_referencia_edit[]" placeholder="Numero de Referencia" value="<?php echo $catalogo_edit->descripcionatributo;?>"></center>										  					
									  				</div>

									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  					<center style="margin-top: 10px;"><a href="<?php echo base_url();?>billetes/delete_cat/<?php echo $catalogo_edit->id_unico_atributo ?>/<?php echo $catalogo_edit->id_atributo_edit ?>" class=" btn btn-warning" type="button">Eliminar Catalogo</a></center>
									  				</div>		
								        	  	</div> 
								        	  </th>
								        	</tr>
								            <tr>
								               <th>G</th>
							                   <th>VG</th>
							                   <th>F</th>
							                   <th>VF</th>
							                   <th>XF</th>
							                   <th>AU</th>
							                   <th>UNC</th>                                    
								            </tr>
								        </thead>
								        <tbody>								        	
								        	    <?php foreach($pagos_catalogo as $pago_catalogo):?> 
								        	    <?php if($pago_catalogo->id_catalogo == $catalogo_edit->atributoid): ?> 
								                    <tr>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_G_edit[]" value="<?php echo $pago_catalogo->G?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VG_edit[]" value="<?php echo $pago_catalogo->VG?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_F_edit[]" value="<?php echo $pago_catalogo->VF?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VF_edit[]" value="<?php echo $pago_catalogo->F?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_XF_edit[]" value="<?php echo $pago_catalogo->XF?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_AU_edit[]" value="<?php echo $pago_catalogo->AU?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_UNC_edit[]" value="<?php echo $pago_catalogo->UNC?>"></center></td>
								                    </tr>
								                <?php endif; ?>
								                 <?php endforeach;?>     
								        </tbody>
								</table>   	
		        <?php endforeach;?> 
<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->

		        <div class="col-md-12 col-sm-12 col-xs-12">									
										<center>
												<?php
													$button = array(
														'class'         => 'btn btn-primary',
												        'name'          => 'button',
												        'id'            => 'button',
												        'value'         => 'true',
												        'type'          => 'submit',
												        'content'       => 'Registrar'
													);

												 echo form_button($button)
												 ?>
										</center>
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