CATALOGOS<div class="right_col" role="main">
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
                    <h2>Edici&oacute;n de Billetes</h2>
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
<!--------------------------------------------SECCION GENERALES-------------------->
<?php if(!empty($atributos_not_generales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Generales</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_generales as $atributo_not_general):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_general->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_general->nombre_atributo,
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
										 			'id'           =>  $atributo_not_general->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_general->nombre_atributo,
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


						echo form_label($atributo_not_general->nombre_atributo,$atributo_not_general->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_general->id_atributo_b;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>		

		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION GENERALES------------------------------------>


<!--------------------------------------------SECCION PRECIOS-------------------->
<?php if(!empty($atributos_not_precios)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Precios</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_precios as $atributo_not_precio):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_precio->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_precio->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_precio->nombre_atributo,
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
										 			'id'           =>  $atributo_not_precio->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_precio->nombre_atributo,
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


						echo form_label($atributo_not_precio->nombre_atributo,$atributo_not_precio->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_precio->id_atributo_b;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>		

		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION PRECIOS------------------------------------>


<!--------------------------------------------SECCION ESPECIALES-------------------->
<?php if(!empty($atributos_not_especiales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Especiales</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_especiales as $atributo_not_especial):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_especial->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_especial->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_especial->nombre_atributo,
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
										 			'id'           =>  $atributo_not_especial->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_especial->nombre_atributo,
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


						echo form_label($atributo_not_especial->nombre_atributo,$atributo_not_especial->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_especial->id_atributo_b;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>		

		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ESPECIALES------------------------------------>


<!--------------------------------------------SECCION OTROS-------------------->
<?php if(!empty($atributos_not_otros)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #ffb3b3;"><h3 style="font-weight: bold;">Otros</h3></div>
		              <div class="panel-body" style="background-color: #ffcccc;">
							 <?php foreach($atributos_not_otros as $atributo_not_otro):?>
			<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_not_otro->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image_add[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_not_otro->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_otro->nombre_atributo,
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
										 			'id'           =>  $atributo_not_otro->nombre_atributo,
										 			'placeholder'  =>  $atributo_not_otro->nombre_atributo,
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


						echo form_label($atributo_not_otro->nombre_atributo,$atributo_not_otro->nombre_atributo,$label_atributo)
					 ?>
					 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_not_otro->id_atributo_b;?>">

					 <div class="col-md-10 col-sm-12 col-xs-12">
					 	<?php echo form_input($input_atributo);?>
					 </div>						  
		</div>		

		<?php endforeach;?>

                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION OTROS------------------------------------>



<!--------------------------------------------------------------FIN PARTE DE AGREGAR NUEVOS ATRIBUTOS------------------------->

<hr style="height: 1px;">





<!--------------------------------------------SECCION GENERALES-------------------->
<?php if(!empty($atributos_generales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Generales</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_generales as $atributo_general):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_general->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_general->nombreatributo,
										 			'placeholder'  =>  $atributo_general->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo_general->descripcionatributo,
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

									<div class="form-group">
										<?php 
											$label_atributo = array(
							                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
	                						);


	                						echo form_label($atributo_general->nombreatributo,$atributo_general->nombreatributo,$label_atributo)
										 ?>
										 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_general->id_atributo_b;?>">
								         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_general->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo_general->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo_general->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
								 </div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION GENERALES------------------------------------>


<!--------------------------------------------SECCION PRECIOS-------------------->
<?php if(!empty($atributos_precios)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Precios</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_precios as $atributo_precio):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_precio->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_precio->nombreatributo,
										 			'placeholder'  =>  $atributo_precio->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo_precio->descripcionatributo,
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
										 			'id'           =>  $atributo_precio->nombreatributo,
										 			'placeholder'  =>  $atributo_precio->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_precio->descripcionatributo,
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


	                						echo form_label($atributo_precio->nombreatributo,$atributo_precio->nombreatributo,$label_atributo)
										 ?>
										 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_precio->id_atributo_b;?>">
								         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_precio->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo_precio->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo_precio->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
								 </div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION PRECIOS------------------------------------>


<!--------------------------------------------SECCION ESPECIALES-------------------->
<?php if(!empty($atributos_especiales)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Especiales</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_especiales as $atributo_especial):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_especial->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_especial->nombreatributo,
										 			'placeholder'  =>  $atributo_especial->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo_especial->descripcionatributo,
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
										 			'id'           =>  $atributo_especial->nombreatributo,
										 			'placeholder'  =>  $atributo_especial->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_especial->descripcionatributo,
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


	                						echo form_label($atributo_especial->nombreatributo,$atributo_especial->nombreatributo,$label_atributo)
										 ?>
										 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_especial->id_atributo_b;?>">
								         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_especial->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo_especial->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo_especial->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
								 </div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION ESPECIALES------------------------------------>


<!--------------------------------------------SECCION OTROS-------------------->
<?php if(!empty($atributos_otros)): ?>
<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Otros</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;">
							<?php foreach($atributos_otros as $atributo_otro):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo_otro->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			//'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo_otro->nombreatributo,
										 			'placeholder'  =>  $atributo_otro->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo_otro->descripcionatributo,
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
										 			'id'           =>  $atributo_otro->nombreatributo,
										 			'placeholder'  =>  $atributo_otro->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo_otro->descripcionatributo,
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


	                						echo form_label($atributo_otro->nombreatributo,$atributo_otro->nombreatributo,$label_atributo)
										 ?>
										 <input type="hidden" name='<?php echo $name_id?>' value="<?php echo $atributo_otro->id_atributo_b;?>">
								         <input type="hidden" name='<?php echo $id_unico?>' value="<?php echo $atributo_otro->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo_otro->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo_otro->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
								 </div>

							 	<?php endforeach;?>
                  </div>
</div>							 	
 <?php endif; ?>							

<!----------------------------SECCION OTROS------------------------------------>



<!-----------------------------------------------------SECCION DE CATALOGOS-------------------------------------------------->

<!-----------------------------SECCION CATALOGOS-->

		<div class="panel panel-default">
		     <div class="panel-heading" style="background-color: #b3e0ff;"><h3 style="font-weight: bold;">Catalogos</h3></div>
		              <div class="panel-body" style="background-color: #e6f5ff;"><!--PANEL BODY-->
		              	<?php if(!empty($catalogos)): ?>
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

								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
								<div id="gif_carga" class="form-group"></div>
								<div id="input_creado" class="col-md-12 col-sm-12 col-lg-12"></div>	
								<!--REPUESTA AJAX PARA AGREGAR NUEVOS CATALOGOS-->
						 <?php endif; ?>
								<!----------------------------------------------------SECCION DE CATALOGOS AGREGADOS---------------------------------------------->	
							<?php if(!empty($catalogos_edit)): ?>
						<center><strong><h3 style="font-weight: bold;">Catalogos Agregados</h3></strong></center>
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
<!----------------------------------------------------SECCION DE CATALOGOS AGREGADOS---------------------------------------------->
		    <!--PANEL BODY--></div>
		</div>

	

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