<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Moneda<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar Monedas al Catalogo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                  	<!--CONSULTA SQL-->

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error_add")):?>
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

							 echo form_open_multipart('monedas/create',$formulario); 

							 ?>

<!--------------------------------------------SECCION GENERALES-------------------->
<?php if(!empty($atributos_generales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Generales</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_generales as $atributo_general):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_general->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_general->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_general->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_general->id_atributo_m.')'

										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
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
<?php if ($atributo_general->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_general->descripcion_atributo
					);


					echo form_label($atributo_general->nombre_atributo,$atributo_general->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_general->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_general->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_general->descripcion_atributo
				                						);


				                						echo form_label($atributo_general->nombre_atributo,$atributo_general->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

		    <?php if ($atributo_general->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_general->descripcion_atributo ?>' for="fuente_imagen<?php echo $atributo_general->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_general->id_atributo_m?>" name="fuente_imagen[]">										 
					</div>
					
				</div>
		    	
		    <?php endif ?>
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION GENERALES------------------------------------>


<!--------------------------------------------SECCION DATOS TECNICOS-------------------->
<?php if(!empty($atributos_tecnicos)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Datos T&eacute;cnicos</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_tecnicos as $atributo_tecnico):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_tecnico->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_tecnico->nombre_atributo,
										 			'placeholder'  =>  $atributo_tecnico->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_tecnico->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_tecnico->id_atributo_m.')'

										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_tecnico->nombre_atributo,
										 			'placeholder'  =>  $atributo_tecnico->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_tecnico->nombre_atributo),
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_tecnico->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_tecnico->descripcion_atributo
					);


					echo form_label($atributo_tecnico->nombre_atributo,$atributo_tecnico->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_tecnico->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select required class="form-control" id="<?php echo $atributo_tecnico->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_tecnico->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_tecnico->descripcion_atributo
				                						);


				                						echo form_label($atributo_tecnico->nombre_atributo,$atributo_tecnico->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_tecnico->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

			<?php if ($atributo_tecnico->tipo_atributom=='Fotos'): ?>

			    	<div class="form-group">
						<label title='<?php echo $atributo_tecnico->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_tecnico->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
						 <div class="col-md-10 col-sm-12 col-xs-12">
							 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_tecnico->id_atributo_m?>" name="fuente_imagen[]">										 
						</div>
						
					</div>
		    	
		    <?php endif ?>    
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION DATOS TECNICOS------------------------------------>


<!--------------------------------------------SECCION ANVERSO-------------------->
<?php if(!empty($atributos_anverso)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Anverso</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_anverso as $atributo_anverso):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_anverso->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_anverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_anverso->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_anverso->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_anverso->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_anverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_anverso->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_anverso->nombre_atributo),
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_anverso->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_anverso->descripcion_atributo
					);


					echo form_label($atributo_anverso->nombre_atributo,$atributo_anverso->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_anverso->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select required class="form-control" id="<?php echo $atributo_anverso->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_anverso->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_anverso->descripcion_atributo
				                						);


				                						echo form_label($atributo_anverso->nombre_atributo,$atributo_anverso->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_anverso->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

					<?php if ($atributo_anverso->tipo_atributom=='Fotos'): ?>

			    	<div class="form-group">
						<label title='<?php echo $atributo_anverso->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_anverso->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
						 <div class="col-md-10 col-sm-12 col-xs-12">
							 	<input required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_anverso->id_atributo_m?>" name="fuente_imagen[]">										 
						</div>
						
					</div>
		    	
		    <?php endif ?>       
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ANVERSO------------------------------------>


<!--------------------------------------------SECCION REVERSO-------------------->
<?php if(!empty($atributos_reverso)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Reverso</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_reverso as $atributo_reverso):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_reverso->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_reverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_reverso->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_reverso->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_reverso->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_reverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_reverso->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_reverso->nombre_atributo),
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_reverso->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_reverso->descripcion_atributo
					);


					echo form_label($atributo_reverso->nombre_atributo,$atributo_reverso->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_reverso->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select required class="form-control" id="<?php echo $atributo_reverso->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_reverso->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_reverso->descripcion_atributo
				                						);


				                						echo form_label($atributo_reverso->nombre_atributo,$atributo_reverso->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_reverso->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

					<?php if ($atributo_reverso->tipo_atributom=='Fotos'): ?>

			    	<div class="form-group">
						<label title='<?php echo $atributo_reverso->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_reverso->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
						 <div class="col-md-10 col-sm-12 col-xs-12">
							 	<input required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_reverso->id_atributo_m?>" name="fuente_imagen[]">										 
						</div>
						
					</div>
		    	
		    <?php endif ?>       
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION REVERSO------------------------------------>


<!--------------------------------------------SECCION CANTO-------------------->
<?php if(!empty($atributos_canto)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Canto</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_canto as $atributo_canto):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_canto->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_canto->nombre_atributo,
										 			'placeholder'  =>  $atributo_canto->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_canto->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_canto->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_canto->nombre_atributo,
										 			'placeholder'  =>  $atributo_canto->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_canto->nombre_atributo),
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_canto->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_canto->descripcion_atributo
					);


					echo form_label($atributo_canto->nombre_atributo,$atributo_canto->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_canto->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select required class="form-control" id="<?php echo $atributo_canto->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_canto->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_canto->descripcion_atributo
				                						);


				                						echo form_label($atributo_canto->nombre_atributo,$atributo_canto->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_canto->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

					<?php if ($atributo_canto->tipo_atributom=='Fotos'): ?>

			    	<div class="form-group">
						<label title='<?php echo $atributo_canto->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_canto->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
						 <div class="col-md-10 col-sm-12 col-xs-12">
							 	<input required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_canto->id_atributo_m?>" name="fuente_imagen[]">										 
						</div>
						
					</div>
		    	
		    <?php endif ?>       
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION CANTO------------------------------------>

<!--------------------------------------------SECCION INFORMACION ADICIONAL-------------------->
<?php if(!empty($atributos_adicional)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Informaci&oacute;n Adicional</h3></div>
		           <div class="panel-body" style="background-color: #e6f5ff;">
					     <?php foreach($atributos_adicional as $atributo_adicional):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_adicional->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
										 	    	$input_atributo = array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_adicional->nombre_atributo,
										 			'placeholder'  =>  $atributo_adicional->nombre_atributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  set_value($atributo_adicional->nombre_atributo),
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_adicional->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
										 			$input_atributo =  array(
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_adicional->nombre_atributo,
										 			'placeholder'  =>  $atributo_adicional->nombre_atributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  set_value($atributo_adicional->nombre_atributo),
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_adicional->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
		<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_adicional->descripcion_atributo
					);


					echo form_label($atributo_adicional->nombre_atributo,$atributo_adicional->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_adicional->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select required class="form-control" id="<?php echo $atributo_adicional->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_adicional->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
							<?php
							 			} 
							 ?>
				 	</select>
				 </div>					
		</div>

			
	<?php else: ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
					<div class="form-group">
													<?php 
														$label_atributo = array(
										                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
										                    'title'        => $atributo_adicional->descripcion_atributo
				                						);


				                						echo form_label($atributo_adicional->nombre_atributo,$atributo_adicional->nombre_atributo,$label_atributo)
													 ?>
													<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_adicional->id_atributo_m;?>">
													 <div class="col-md-10 col-sm-12 col-xs-12">
													 	<?php 
													 	
													 		echo form_input($input_atributo);									 		

													 	 ?>
													 </div>					
					    </div>

					<?php if ($atributo_adicional->tipo_atributom=='Fotos'): ?>

			    	<div class="form-group">
						<label title='<?php echo $atributo_adicional->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_adicional->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
						 <div class="col-md-10 col-sm-12 col-xs-12">
							 	<input required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_adicional->id_atributo_m?>" name="fuente_imagen[]">										 
						</div>
						
					</div>
		    	
		    <?php endif ?>       
<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
								

				<?php endforeach;?>
            </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION INFORMACION ADICIONAL------------------------------------>
<!-----------------------------SECCION CATALOGOS-->

<?php if(!empty($catalogos)): ?>
		<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Catalogos</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
		    	                      <div class="form-group">
									 		<?php 
												$label_catalogo = array(
								                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
								                    'title'        => 'Seleccione un Catalogo'
		                						);


		                						echo form_label('Catalogos','catalogo',$label_catalogo)
											 ?>
									 	
									
										 	<div class="col-md-10 col-sm-12 col-xs-12">
												 	<select  class="form-control" id="catalogo" onchange="catalogoinput()">
														<?php if(!empty($catalogos)): ?>
													 		<option value="">Seleccione una Opcion</option>
													 		<?php foreach ($catalogos as  $catalogo): ?>
																<option  value="<?php echo $catalogo->id_atributo_m?>" <?php echo set_select('catalogo',$catalogo->id_atributo_m);?>><?php echo $catalogo->nombre_atributo?></option>
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