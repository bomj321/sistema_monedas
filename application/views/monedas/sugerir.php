<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editar Moneda<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monedas</h2>
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

							 echo form_open_multipart('monedas/guardar_sugerencia',$formulario); 

							 ?>

<!----------------------------------------------PARTE DE AGREGAR NUEVOS ATRIBUTOS----------------------------->	
<!--------------------------------------------SECCION GENERALES-------------------->
<?php if(!empty($atributos_not_generales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Generales</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_generales as $atributo_not_general):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_general->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_general->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_general->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_general->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_general->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'       => $atributo_not_general->descripcion_atributo

					);


					echo form_label($atributo_not_general->nombre_atributo,$atributo_not_general->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_general->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_general->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_general->id_atributo_m;"); 
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
		                     'title'       => $atributo_not_general->descripcion_atributo
						);


						echo form_label($atributo_not_general->nombre_atributo,$atributo_not_general->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_general->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>
 <?php if ($atributo_not_general->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo  $atributo_not_general->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_not_general->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_general->id_atributo_m?>" name="fuente_imagen_add[]">										 
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
<?php if(!empty($atributos_not_tecnicos)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Datos T&eacute;cnicos</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_tecnicos as $atributo_not_tecnico):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_tecnico->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_tecnico->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_tecnico->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_tecnico->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_tecnico->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_tecnico->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_tecnico->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                     'title'       => $atributo_not_tecnico->descripcion_atributo
					);


					echo form_label($atributo_not_tecnico->nombre_atributo,$atributo_not_tecnico->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_tecnico->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_tecnico->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_tecnico->id_atributo_m;"); 
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
		                    'title'        => $atributo_not_tecnico->descripcion_atributo
						);


						echo form_label($atributo_not_tecnico->nombre_atributo,$atributo_not_tecnico->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_tecnico->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>

<?php if ($atributo_not_tecnico->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_not_tecnico->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_not_tecnico->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_tecnico->id_atributo_m?>" name="fuente_imagen_add[]">										 
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
<?php if(!empty($atributos_not_anverso)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Anverso</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_anverso as $atributo_not_anverso):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_anverso->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_anverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_anverso->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_anverso->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_anverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_anverso->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_anverso->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_not_anverso->descripcion_atributo	                   
					);


					echo form_label($atributo_not_anverso->nombre_atributo,$atributo_not_anverso->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_anverso->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_anverso->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_anverso->id_atributo_m;"); 
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
		                    'title'        => $atributo_not_anverso->descripcion_atributo
						);


						echo form_label($atributo_not_anverso->nombre_atributo,$atributo_not_anverso->nombre_atributo,$label_atributo)
					 ?>

					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_anverso->id_atributo_m;?>">

					 <div class="col-md-9 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>
<?php if ($atributo_not_anverso->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label  title='<?php echo $atributo_not_anverso->descripcion_atributo ?>' for="fuente_imagen<?php echo $atributo_not_anverso->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_anverso->id_atributo_m?>" name="fuente_imagen_add[]">										 
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
<?php if(!empty($atributos_not_reverso)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Reverso</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_reverso as $atributo_not_reverso):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_reverso->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_reverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_reverso->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_reverso->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_reverso->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_reverso->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_reverso->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_not_reverso->descripcion_atributo
					);


					echo form_label($atributo_not_reverso->nombre_atributo,$atributo_not_reverso->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_reverso->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_reverso->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_reverso->id_atributo_m;"); 
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
		                    'title'        => $atributo_not_reverso->descripcion_atributo
						);


						echo form_label($atributo_not_reverso->nombre_atributo,$atributo_not_reverso->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_reverso->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>
<?php if ($atributo_not_reverso->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_not_reverso->descripcion_atributo?>' for="fuente_imagen<?php echo $atributo_not_reverso->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_reverso->id_atributo_m?>" name="fuente_imagen_add[]">										 
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
<?php if(!empty($atributos_not_canto)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Canto</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_canto as $atributo_not_canto):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_canto->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_canto->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_canto->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_canto->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_canto->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_canto->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_canto->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_not_canto->descripcion_atributo
					);


					echo form_label($atributo_not_canto->nombre_atributo,$atributo_not_canto->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_canto->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_canto->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_canto->id_atributo_m;"); 
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
		                    'title'        => $atributo_not_canto->descripcion_atributo
						);


						echo form_label($atributo_not_canto->nombre_atributo,$atributo_not_canto->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_canto->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>

<?php if ($atributo_not_canto->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_not_canto->descripcion_atributo ?>' for="fuente_imagen<?php echo $atributo_not_canto->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_canto->id_atributo_m?>" name="fuente_imagen_add[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>			


<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->


		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION CANTO------------------------------------>



<!--------------------------------------------SECCION VARIEDADES-------------------->
<?php if(!empty($atributos_not_variedades)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Variedades</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_variedades as $atributos_not_variedad):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributos_not_variedad->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_not_variedad->nombre_atributo,
										 			'placeholder'  =>  $atributos_not_variedad->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributos_not_variedad->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_not_variedad->nombre_atributo,
										 			'placeholder'  =>  $atributos_not_variedad->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributos_not_variedad->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributos_not_variedad->descripcion_atributo
					);


					echo form_label($atributos_not_variedad->nombre_atributo,$atributos_not_variedad->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_not_variedad->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributos_not_variedad->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributos_not_variedad->id_atributo_m;"); 
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
		                    'title'        => $atributos_not_variedad->descripcion_atributo
						);


						echo form_label($atributos_not_variedad->nombre_atributo,$atributos_not_variedad->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_not_variedad->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>

<?php if ($atributos_not_variedad->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributos_not_variedad->descripcion_atributo ?>' for="fuente_imagen<?php echo $atributos_not_variedad->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributos_not_variedad->id_atributo_m?>" name="fuente_imagen_add[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>			


<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->


		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION VARIEDADES------------------------------------>





<!--------------------------------------------SECCION ADICIONAL-------------------->
<?php if(!empty($atributos_not_adicional)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Informaci&oacute;n Adicional</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_adicional as $atributo_not_adicional):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_adicional->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_adicional->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_adicional->nombre_atributo,
										 			'name'         =>  'imagen_add[]',
										 			'type'         =>  'file',
										 			'multiple'     =>  true,
										 			'onchange'     => 'requerido('.$atributo_not_adicional->id_atributo_m.')'
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id_add[]';
										 			$input_atributo =  array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_adicional->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_adicional->nombre_atributo,
										 			'name'         =>  'catalogo_add[]',
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>
<?php if ($atributo_not_adicional->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributo_not_adicional->descripcion_atributo
					);


					echo form_label($atributo_not_adicional->nombre_atributo,$atributo_not_adicional->nombre_atributo,$label_atributo)
				 ?>
				<input type="text" name='<?php echo $name_id?>' value="<?php echo $atributo_not_adicional->id_atributo_m;?>">
				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_not_adicional->nombre_atributo ?>" name="catalogo_add[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_not_adicional->id_atributo_m;"); 
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
		                    'title'        => $atributo_not_adicional->descripcion_atributo
						);


						echo form_label($atributo_not_adicional->nombre_atributo,$atributo_not_adicional->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_adicional->id_atributo_m;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>
<?php if ($atributo_not_adicional->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_not_adicional->descripcion_atributo ?>' for="fuente_imagen<?php echo $atributo_not_adicional->id_atributo_m?>" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen<?php echo $atributo_not_adicional->id_atributo_m?>" name="fuente_imagen_add[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>			


<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->


		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ADICIONAL------------------------------------>

<!----------------------------------------------FIN PARTE DE AGREGAR NUEVOS ATRIBUTOS------------------------->
<hr style="height: 1px;">


<!----------------------------PARTE DE EDITAR ATRIBUTOS YA AGREGADOS------------------------------------->
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
									 	    	    $separado_descripcionatributo = explode(",", $atributo_general->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_general->nombreatributo,
										 			'placeholder'  =>  $atributo_general->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_general->nombreatributo,
										 			'placeholder'  =>  $atributo_general->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_general->descripcionatributo,
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


					echo form_label($atributo_general->nombreatributo,$atributo_general->nombreatributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_general->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_general->nombreatributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_general->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_general->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


			echo form_label($atributo_general->nombreatributo,$atributo_general->nombreatributo,$label_atributo)
		 ?>
		 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_m;?>">
         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_general->id_unico_atributo;?>">

		 <div class="col-md-10 col-sm-12 col-xs-12">
		 	<?php echo form_input($input_atributo);?>
		 </div>
		  <?php if(strpos($atributo_general->tipo_atributom, 'Fotos') !== false):?>
		 <div class="col-md-12 col-sm-12 col-xs-12">										
		 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
		 </div>
		  <?php endif; ?>
 </div>

 <?php if ($atributo_general->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_general->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
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
									 	    	    $separado_descripcionatributo = explode(",", $atributo_tecnico->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_tecnico->nombreatributo,
										 			'placeholder'  =>  $atributo_tecnico->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_tecnico->nombreatributo,
										 			'placeholder'  =>  $atributo_tecnico->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_tecnico->descripcionatributo,
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


					echo form_label($atributo_tecnico->nombreatributo,$atributo_tecnico->nombreatributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_tecnico->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_tecnico->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_tecnico->nombreatributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_tecnico->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_tecnico->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


				echo form_label($atributo_tecnico->nombreatributo,$atributo_tecnico->nombreatributo,$label_atributo)
			 ?>
			 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_tecnico->id_atributo_m;?>">
	         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_tecnico->id_unico_atributo;?>">

			 <div class="col-md-10 col-sm-12 col-xs-12">
			 	<?php echo form_input($input_atributo);?>
			 </div>
			  <?php if(strpos($atributo_tecnico->tipo_atributom, 'Fotos') !== false):?>
			 <div class="col-md-12 col-sm-12 col-xs-12">										
			 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
			 </div>
			  <?php endif; ?>
	 </div>

<?php if ($atributo_tecnico->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_tecnico->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
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
									 	    		$separado_descripcionatributo = explode(",", $atributo_anverso->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_anverso->nombreatributo,
										 			'placeholder'  =>  $atributo_anverso->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_anverso->nombreatributo,
										 			'placeholder'  =>  $atributo_anverso->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_anverso->descripcionatributo,
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


					echo form_label($atributo_anverso->nombreatributo,$atributo_anverso->nombreatributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_anverso->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_anverso->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_anverso->nombreatributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_anverso->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_anverso->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


		echo form_label($atributo_anverso->nombreatributo,$atributo_anverso->nombreatributo,$label_atributo)
	 ?>
	 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_anverso->id_atributo_m;?>">
     <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_anverso->id_unico_atributo;?>">

	 <div class="col-md-10 col-sm-12 col-xs-12">
	 	<?php echo form_input($input_atributo);?>
	 </div>
	  <?php if(strpos($atributo_anverso->tipo_atributom, 'Fotos') !== false):?>
	 <div class="col-md-12 col-sm-12 col-xs-12">										
	 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
	 </div>
	  <?php endif; ?>
</div>

<?php if ($atributo_anverso->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_anverso->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
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
									 	    		$separado_descripcionatributo = explode(",", $atributo_reverso->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_reverso->nombreatributo,
										 			'placeholder'  =>  $atributo_reverso->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_reverso->nombreatributo,
										 			'placeholder'  =>  $atributo_reverso->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_reverso->descripcionatributo,
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


					echo form_label($atributo_reverso->nombreatributo,$atributo_reverso->nombreatributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_reverso->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_reverso->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_reverso->nombreatributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_reverso->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_reverso->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


		echo form_label($atributo_reverso->nombreatributo,$atributo_reverso->nombreatributo,$label_atributo)
	 ?>
	 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_reverso->id_atributo_m;?>">
     <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_reverso->id_unico_atributo;?>">

	 <div class="col-md-10 col-sm-12 col-xs-12">
	 	<?php echo form_input($input_atributo);?>
	 </div>
	  <?php if(strpos($atributo_reverso->tipo_atributom, 'Fotos') !== false):?>
	 <div class="col-md-12 col-sm-12 col-xs-12">										
	 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
	 </div>
	  <?php endif; ?>
</div>

<?php if ($atributo_reverso->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_reverso->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
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
									 	    		$separado_descripcionatributo = explode(",", $atributo_canto->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_canto->nombreatributo,
										 			'placeholder'  =>  $atributo_canto->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_canto->nombreatributo,
										 			'placeholder'  =>  $atributo_canto->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_canto->descripcionatributo,
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


					echo form_label($atributo_canto->nombreatributo,$atributo_canto->nombreatributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_canto->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_canto->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_canto->nombreatributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_canto->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_canto->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


			echo form_label($atributo_canto->nombreatributo,$atributo_canto->nombreatributo,$label_atributo)
		 ?>
		 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_canto->id_atributo_m;?>">
         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_canto->id_unico_atributo;?>">

		 <div class="col-md-10 col-sm-12 col-xs-12">
		 	<?php echo form_input($input_atributo);?>
		 </div>
		  <?php if(strpos($atributo_canto->tipo_atributom, 'Fotos') !== false):?>
		 <div class="col-md-12 col-sm-12 col-xs-12">										
		 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
		 </div>
		  <?php endif; ?>
 </div>

 <?php if ($atributo_canto->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_canto->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>

<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->




							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION CANTO------------------------------------>




<!--------------------------------------------SECCION VARIEDADES-------------------->
<?php if(!empty($atributos_variedades)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Variedades</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_variedades as $atributos_variedad):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributos_variedad->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$separado_descripcionatributo = explode(",", $atributos_variedad->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributos_variedad->nombreatributo,
										 			'placeholder'  =>  $atributos_variedad->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributos_variedad->nombreatributo,
										 			'placeholder'  =>  $atributos_variedad->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributos_variedad->descripcionatributo,
										 			'type'         =>  'text',
										 			
										 		);									 			
									 		}
									 	//CODIGO PARA FORMATEAR ATRIBUTOS


							 	?>

<?php if ($atributos_variedad->tipo_atributom=='Especiales'): ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->
<div class="form-group">
				<?php 
					$label_atributo = array(
	                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                    'title'        => $atributos_variedad->descripcion_atributo
					);


					echo form_label($atributos_variedad->nombre_atributo,$atributos_variedad->nombre_atributo,$label_atributo)
				 ?>
				<input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_variedad->id_atributo_m;?>">
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributos_variedad->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributos_variedad->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributos_variedad->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributos_variedad->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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
            'title'        => $atributos_variedad->descripcion_atributo
		);


		echo form_label($atributos_variedad->nombreatributo,$atributos_variedad->nombreatributo,$label_atributo)
	 ?>
	 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributos_variedad->id_atributo_m;?>">
     <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributos_variedad->id_unico_atributo;?>">

	 <div class="col-md-10 col-sm-12 col-xs-12">
	 	<?php echo form_input($input_atributo);?>
	 </div>
	  <?php if(strpos($atributos_variedad->tipo_atributom, 'Fotos') !== false):?>
	 <div class="col-md-12 col-sm-12 col-xs-12">										
	 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
	 </div>
	  <?php endif; ?>
</div>

 <?php if ($atributos_variedad->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributos_variedad->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>

<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->




							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION VARIEDADES------------------------------------>




<!--------------------------------------------SECCION ADICIONAL-------------------->
<?php if(!empty($atributos_adicional)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Informaci&oacute;n Adicional</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_adicional as $atributo_adicional):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_adicional->tipo_atributom, 'Fotos') !== false) 
									 	    {
									 	    		$separado_descripcionatributo = explode(",", $atributo_adicional->descripcionatributo);
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_adicional->nombreatributo,
										 			'placeholder'  =>  $atributo_adicional->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $separado_descripcionatributo[0],
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
										 			'id'           =>  $atributo_adicional->nombreatributo,
										 			'placeholder'  =>  $atributo_adicional->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_adicional->descripcionatributo,
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
	            <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_adicional->id_unico_atributo;?>">

				 <div class="col-md-10 col-sm-12 col-xs-12">
				 <select class="form-control" id="<?php echo $atributo_adicional->nombre_atributo ?>" name="catalogo[]" >
			 			<option value="">Seleccione una Opcion</option>
							<?php
							 $query = $this->db->query("SELECT opciones_especialesm FROM atributos_especiales_m WHERE id_atributom = $atributo_adicional->id_atributo_m;"); 
							 	foreach ($query->result() as $opcion)
									{
							?>
							<option <?php echo $atributo_adicional->descripcionatributo == $opcion->opciones_especialesm ? 'selected' : '' ?> value="<?php echo $opcion->opciones_especialesm ?>"><?php echo $opcion->opciones_especialesm ?></option>											 		
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


		echo form_label($atributo_adicional->nombreatributo,$atributo_adicional->nombreatributo,$label_atributo)
	 ?>
	 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_adicional->id_atributo_m;?>">
     <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_adicional->id_unico_atributo;?>">

	 <div class="col-md-10 col-sm-12 col-xs-12">
	 	<?php echo form_input($input_atributo);?>
	 </div>
	  <?php if(strpos($atributo_adicional->tipo_atributom, 'Fotos') !== false):?>
	 <div class="col-md-12 col-sm-12 col-xs-12">										
	 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_monedas/'.$separado_descripcionatributo[0]?>"></div>										
	 </div>
	  <?php endif; ?>
</div>

 <?php if ($atributo_adicional->tipo_atributom=='Fotos'): ?>

		    	<div class="form-group">
					<label title='<?php echo $atributo_adicional->descripcion_atributo?>' for="fuente_imagen" class="col-sm-2 col-xs-12 col-md-2 control-label">Fuente de la Imagen</label>								
					 <div class="col-md-10 col-sm-12 col-xs-12">
						 	<input value='<?php echo $separado_descripcionatributo[1] ?>' required type="text" class="form-control" placeholder="Fuente de la foto" id="fuente_imagen" name="fuente_imagen[]">										 
					</div>
					
				</div>
		    	
<?php endif ?>

<?php endif ?><!--CONDICIONALES PARA VER SI ES O NO ES ESPECIAL-->




							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ADICIONAL------------------------------------>

<!----------------------------PARTE DE EDITAR ATRIBUTOS YA AGREGADOS------------------------------------->

<!-----------------------------------------------------SECCION DE CATALOGOS-------------------------------------------------->
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


								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
								<div id="gif_carga" class="form-group"></div>
								<div id="input_creado" class="col-md-12 col-sm-12 col-lg-12"></div>	
								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
<!-----------------------------------------------------SECCION DE CATALOGOS-------------------------------------------------->


<!----------------------------------------------------SECCION DE CATALOGOS PRECIOS---------------------------------------------->	
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

									  				<!--<div class="col-md-4 col-sm-12 col-xs-12">
									  					<center style="margin-top: 10px;"><a href="<?php echo base_url();?>monedas/delete_cat/<?php echo $catalogo_edit->id_unico_atributo ?>/<?php echo $catalogo_edit->id_atributo_edit ?>" class=" btn btn-warning" type="button">Eliminar Catalogo</a></center>
									  				</div>		-->
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
											<?php if (!empty($pagos_catalogo)): ?>											
											
										        	   <?php foreach($pagos_catalogo as $pago_catalogo):?> 
															
																	<?php if (!empty($pago_catalogo)): ?>															
														        	    <?php if($pago_catalogo->id_catalogo == $catalogo_edit->atributoid): ?> 
														                    <tr>
															                    <td><center><input style="width: 100%; height: 100%" type="text" name="precio_G_edit[]" value="<?php echo $pago_catalogo->G?>"></center></td>
															                    <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VG_edit[]" value="<?php echo $pago_catalogo->VG?>"></center></td>								                       
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_F_edit[]" value="<?php echo $pago_catalogo->F?>"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VF_edit[]" value="<?php echo $pago_catalogo->VF?>"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_XF_edit[]" value="<?php echo $pago_catalogo->XF?>"></center></td>
														                         <td><center><input style="width: 100%; height: 100%" type="text" name="precio_AU_edit[]" value="<?php echo $pago_catalogo->AU?>"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_UNC_edit[]" value="<?php echo $pago_catalogo->UNC?>"></center></td>
														                    </tr>

																		<?php else: ?>
																			 <tr>
															                    <td><center><input style="width: 100%; height: 100%" type="text" name="precio_G_edit[]"  value="Sin Precio"></center></td>
															                    <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VG_edit[]" value="Sin Precio"></center></td>								                       
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_F_edit[]" value="Sin Precio"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VF_edit[]" value="Sin Precio"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_XF_edit[]" value="Sin Precio"></center></td>
														                         <td><center><input style="width: 100%; height: 100%" type="text" name="precio_AU_edit[]" value="Sin Precio"></center></td>
														                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_UNC_edit[]" value="Sin Precio"></center></td>
														 					 </tr>

																	<?php endif ?>
																		


												                <?php endif; ?>

										                 <?php endforeach;?>  
											<?php endif ?>

								        </tbody>
								</table>   	
		        <?php endforeach;?> 
<!----------------------------------------------------SECCION DE CATALOGOS PRECIOS---------------------------------------------->

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