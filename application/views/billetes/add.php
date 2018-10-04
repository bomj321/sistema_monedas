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
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php
							$formulario = array('class' => 'form-horizontal');

							 echo form_open('billetes/create',$formulario); 

							 ?>
							 <?php foreach($atributos as $atributo):?>

									<div class="form-group">										

									<?php 
										$label_atributo = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
                						);


                						echo form_label($atributo->nombre_atributo,$atributo->nombre_atributo,$label_atributo)
									 ?>

									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<?php 
									 	//CODIGO PARA FORMATEAR NAMES
									 	 if (strpos($atributo->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 		    $tipo_input='file';
									 		}else
									 		{
									 			$tipo_input='text';
									 		}

									 	$namewithoutspaces = str_replace(" " , "_", $atributo->nombre_atributo);
									 	//CODIGO PARA FORMATEAR NAMES
									 	


									 		$input_atributo = array(
									 			'class'        => 'form-control', 
									 			'id'           =>  $atributo->nombre_atributo,
									 			'placeholder'  =>  $atributo->nombre_atributo,
									 			'name'         =>  $namewithoutspaces,
									 			'value'        =>  set_value($atributo->nombre_atributo),
									 			'type'         =>  $tipo_input
									 			
									 			
									 		);

									 		echo form_input($input_atributo);
									 		echo form_error($atributo->nombre_atributo,"<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")

									 	 ?>
									 </div>

					
								</div>

							 	<?php endforeach;?>

							 	<div class="form-group">
							 		<?php 
										$label_profesor = array(
						                    'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',
                						);


                						echo form_label('Catalogos','catalogo',$label_profesor)
									 ?>
							 	

								 	<div class="col-md-10 col-sm-12 col-xs-12">
										 	<select name="catalogo[]" required="true" class="form-control" id="catalogo" onchange="catalogoinput()">
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