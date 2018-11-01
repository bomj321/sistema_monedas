<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Billete<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar Billetes al Catalogo</h2>
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
                                <center><p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p></center>                                
                             </div>
                       		 <?php endif;?>

                       		 <?php if($this->session->flashdata("success")):?>
                            <div class="alert alert-success ">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <center><p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("success"); ?></p></center>                                
                             </div>
                       		 <?php endif;?>

							<?php
							$formulario = array('class' => 'form-horizontal');

							 echo form_open_multipart('billetes/create',$formulario); 

							 ?>
<!--------------------------------------------SECCION GENERALES-------------------->
<?php if(!empty($atributos_generales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading"><h3 style="font-weight: bold;">Generales</h3></div>
		              <div class="panel-body">
							 <?php foreach($atributos_generales as $atributo_general):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_general->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_general->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_general->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_general->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_general->nombre_atributo),
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


	                						echo form_label($atributo_general->nombre_atributo,$atributo_general->nombre_atributo,$label_atributo)
										 ?>
										<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_b;?>">
										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php 
										 	
										 		echo form_input($input_atributo);									 		

										 	 ?>
										 </div>					
								</div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION GENERALES------------------------------------>



<!--------------------------------------------SECCION PRECIOS-------------------->
<?php if(!empty($atributos_precios)): ?>
<div class="panel panel-default">
		     <div class="panel-heading"><h3 style="font-weight: bold;">Precios</h3></div>
		              <div class="panel-body">
							 <?php foreach($atributos_precios as $atributos_precio):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributos_precio->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_precio->nombre_atributo,
										 			'placeholder'  =>  $atributos_precio->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributos_precio->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_precio->nombre_atributo,
										 			'placeholder'  =>  $atributos_precio->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributos_precio->nombre_atributo),
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


	                						echo form_label($atributos_precio->nombre_atributo,$atributos_precio->nombre_atributo,$label_atributo)
										 ?>
										<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_precio->id_atributo_b;?>">
										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php 
										 	
										 		echo form_input($input_atributo);									 		

										 	 ?>
										 </div>					
								</div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION PRECIOS------------------------------------>


<!--------------------------------------------SECCION ESPECIALES-------------------->
<?php if(!empty($atributos_especiales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading"><h3 style="font-weight: bold;">Especiales</h3></div>
		              <div class="panel-body">
							 <?php foreach($atributos_especiales as $atributo_especial):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_especial->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_especial->nombre_atributo,
										 			'placeholder'  =>  $atributo_especial->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_especial->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_especial->nombre_atributo,
										 			'placeholder'  =>  $atributo_especial->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_especial->nombre_atributo),
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


	                						echo form_label($atributo_especial->nombre_atributo,$atributo_especial->nombre_atributo,$label_atributo)
										 ?>
										<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_especial->id_atributo_b;?>">
										 <div class="col-md-10 col-sm-12 col-xs-12">
										 <select required class="form-control" id="<?php echo $atributo_especial->nombre_atributo ?>" name="catalogo[]" >
									 			<option value="">Seleccione una Opcion</option>
													<?php
													 $query = $this->db->query("SELECT opciones_especialesb FROM atributos_especiales_b WHERE id_atributob = $atributo_especial->id_atributo_b;"); 
													 	foreach ($query->result() as $opcion)
															{
													?>
													<option value="<?php echo $opcion->opciones_especialesb ?>"><?php echo $opcion->opciones_especialesb ?></option>											 		
													<?php
													 			} 
													 ?>
										 	</select>
										 </div>					
								</div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ESPECIALES------------------------------------>

<!--------------------------------------------SECCION OTROS-------------------->
<?php if(!empty($atributos_otros)): ?>
<div class="panel panel-default">
		     <div class="panel-heading"><h3 style="font-weight: bold;">Precios</h3></div>
		              <div class="panel-body">
							 <?php foreach($atributos_otros as $atributos_otro):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributos_otro->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_otro->nombre_atributo,
										 			'placeholder'  =>  $atributos_otro->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributos_otro->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_otro->nombre_atributo,
										 			'placeholder'  =>  $atributos_otro->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributos_otro->nombre_atributo),
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


	                						echo form_label($atributos_otro->nombre_atributo,$atributos_otro->nombre_atributo,$label_atributo)
										 ?>
										<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_otro->id_atributo_b;?>">
										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php 
										 	
										 		echo form_input($input_atributo);									 		

										 	 ?>
										 </div>					
								</div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION OTROS------------------------------------>







<!-----------------------------SECCION CATALOGOS-->

<?php if(!empty($catalogos)): ?>
		<div class="panel panel-default">
		     <div class="panel-heading"><h3 style="font-weight: bold;">Catalogos</h3></div>
		              <div class="panel-body">
		    	                      <div class="form-group">
									 		<?php 
												$label_catalogo = array(
								                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
		                						);


		                						echo form_label('Catalogos','catalogo',$label_catalogo)
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
		               </div>
		</div>

 <?php endif; ?>							
							 	
							

<!-----------------------------SECCION CATALOGOS-->		



								<!--REPUESTA AJAX-->
								<div id="gif_carga" class="form-group"></div>
								<div id="input_creado" class="col-md-12 col-sm-12 col-lg-12"></div>	
								<!--REPUESTA AJAX-->


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