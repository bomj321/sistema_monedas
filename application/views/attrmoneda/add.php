<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Crear Atributo<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Añadir Atributo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                  	<!--CONSULTA SQL-->

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error_attr")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $this->session->flashdata("error_attr"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php
							$formulario = array('class' => 'form-horizontal');

							 echo form_open('attrmoneda/create',$formulario); 

							 ?>

<!-----------------------NOMBRE DEL ATRIBUTO-->			
					         <div class="form-group">
									<?php 
										$label_atributo = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
                						);


                						echo form_label('Nombre del Atributo','nombre_atributo',$label_atributo)
									 ?>

									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<?php 
									 		$input_atributo = array(
									 			'required'     => true,
									 			'class'        => 'form-control', 
									 			'id'           => 'nombre_atributo',
									 			'placeholder'  => 'Nombre del Atributo',
									 			'name'         => 'nombre_atributo',
									 			'value'        =>  set_value("nombre_atributo")
									 		);

									 		echo form_input($input_atributo);
									 		echo form_error("nombre_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")

									 	 ?>
									 </div>
					
								</div>

<!-----------------------NOMBRE DEL ATRIBUTO-->

<!-------------------------DESCRIPCION-->
								<div class="form-group">
									<?php 
										$label_descripcion = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
                						);


                						echo form_label('Descripción','descripcion_atributo',$label_descripcion)
									 ?>

									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<?php 
									 		$input_descripcion = array(
									 			'required'     => true,
									 			'class'        => 'form-control', 
									 			'id'           => 'descripcion_atributo',
									 			'placeholder'  => 'Descripción del Atributo',
									 			'name'         => 'descripcion_atributo',
									 			'value'        =>  set_value("descripcion_atributo")
									 		);

									 		echo form_input($input_descripcion);
									 		echo form_error("descripcion_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")

									 	 ?>
									 </div>
					
								</div>

<!-------------------------DESCRIPCION-->

<!---------------------------SECCION DE LAS CATEGORIAS DE ATRIBUTOS-->

								<div class="form-group">
							 		<?php 
										$label_tipo = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',

                						);


                						echo form_label('Categoría de Atributo','categoria_atributo',$label_tipo)
									 ?>
							 	
							
								 	<div class="col-md-10 col-sm-12 col-xs-12">
										 	<select  class="form-control" id="categoria_atributo" name="categoria_atributo" required='true'>
											 		<option value="">Seleccione una Opcion</option>
											 		<option value="Información_general">Información general</option>
											 		<option value="Datos_Técnicos">Datos Técnicos</option>
											 		<option value="Anverso">Anverso</option>
											 		<option value="Reverso">Reverso</option>
											 		<option value="Canto">Canto</option>
											 		<option value="Información_adicional">Información adicional</option>
											 		<option value="Catalogos">Catalogos</option>
										 	</select>
										 	<?php 									 	
	                						echo form_error("categoria_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
								</div>

<!---------------------------SECCION DE LAS CATEGORIAS DE ATRIBUTOS-->			

<!---------------------------SECCION DE LOS TIPOS DE ATRIBUTOS-->

								<div class="form-group">
							 		<?php 
										$label_tipo = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',

                						);


                						echo form_label('Tipo de Atributo','tipo_atributo',$label_tipo)
									 ?>
							 	
							
								 	<div class="col-md-10 col-sm-12 col-xs-12">
										 	<select  class="form-control" id="tipo_atributo" name="tipo_atributo" required='true' onchange="tipoatributom()">
											 		<option value="">Seleccione una Opcion</option>
											 		<option value="Generales">Generales</option>
											 		<option value="Precios">Precios</option>
											 		<option value="Especiales">Especiales</option>
											 		<option value="Catalogos">Catalogos</option>
											 		<option value="Fotos">Fotos</option>
											 		<option value="Medidas">Medidas</option>
											 		<option value="Otros">Otros</option>
										 	</select>
										 	<?php 									 	
	                						echo form_error("tipo_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
								</div>

<!------------------RESPUESTA AJAX----------------->								
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<button id='boton_tipo_atributo' class="btn btn-primary" type="button" onclick="opcionesaddm()"><span class="fa fa-plus">Agregar Opciones</button>
								</div>
								<div id="gif_carga"></div>
								<div style="margin-top: 60px;" id="tipo_atributo_ajax"></div>
<!------------------RESPUESTA AJAX----------------->

<!---------------------------SECCION DE LOS TIPOS DE ATRIBUTOS-->	

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