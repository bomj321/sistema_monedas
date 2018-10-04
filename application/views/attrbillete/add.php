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
							<?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php
							$formulario = array('class' => 'form-horizontal');

							 echo form_open('attrbillete/create',$formulario); 

							 ?>
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
									 			'placeholder'  => 'Descripción del Atributo (Palabra Clave: EJ: catalogo,tipo)',
									 			'name'         => 'descripcion_atributo',
									 			'value'        =>  set_value("descripcion_atributo")
									 		);

									 		echo form_input($input_descripcion);
									 		echo form_error("descripcion_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")

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