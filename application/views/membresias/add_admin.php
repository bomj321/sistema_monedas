<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Administrador</h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Administradores</h2>
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
							 echo form_open_multipart('collectionm/create',$formulario); 
							 ?>							
  
							 <div class="form-group">
									<label for="nombre_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">Nombres</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Nombres" id="nombre_registro" name="nombre_registro">
										 	<?php 									 	
	                						echo form_error("nombre_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
						    	</div>


								<div class="form-group">
									<label for="apellidop_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">Apellido Paterno</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Apellido Paterno" id="apellidop_registro" name="apellidop_registro">
										 	<?php 									 	
	                						echo form_error("apellidop_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>


								<div class="form-group">
									<label for="apellidom_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">Apellido Materno</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Apellido Materno" id="apellidom_registro" name="apellidom_registro">
										 	<?php 									 	
	                						echo form_error("apellidom_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>	

								<div class="form-group">
								
									<label for="fecha_nacimiento_registro" class="col-sm-2 col-xs-12 col-md-2 control-label">A&ntilde;o de Nacimiento</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="date" class="form-control" id="fecha_nacimiento_registro" name="fecha_nacimiento_registro">
										 	<?php 									 	
	                						echo form_error("fecha_nacimiento_registro","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>
						



								<div class="form-group">
									<label for="nacimiento_estado" class="col-sm-2 col-xs-12 col-md-2 control-label">Estado de Nacimiento</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select class="form-control" id="nacimiento_estado" name="nacimiento_estado" >
									 			<option selected>Estado de Nacimiento</option>
                								<?php require('options_select.php') ?>									 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("nacimiento_estado","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>									
							

								<div class="form-group">
									<label for="residencia_estado" class="col-sm-2 col-xs-12 col-md-2 control-label">Estado de Residencia</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select class="form-control" id="residencia_estado" name="residencia_estado">
									 				 <option selected>Estado de Residencia</option>
                								     <?php require('options_select.php') ?>								 												 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("residencia_estado","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>

								<div class="form-group">
								
									<label for="nombre_usuario" class="col-sm-2 col-xs-12 col-md-2 control-label">Nombre de Usuario</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Ingrese Nombre de Usuario" id="nombre_usuario" name="nombre_usuario">
										 	<?php 									 	
	                						echo form_error("nombre_usuario","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

									<div class="form-group">
								
									<label for="dni_usuario" class="col-sm-2 col-xs-12 col-md-2 control-label">DNI</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Ingrese DNI" id="dni_usuario" name="dni_usuario">
										 	<?php 									 	
	                						echo form_error("dni_usuario","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>



								<div class="form-group">
								
									<label for="email_usuario" class="col-sm-2 col-xs-12 col-md-2 control-label">Correo Electronico</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input type="text" class="form-control" placeholder="Ingrese Correo Electronico" id="email_usuario" name="email_usuario">
										 	<?php 									 	
	                						echo form_error("email_usuario","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>

							
								<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 50px;">		
									<center><button class="btn btn-primary" type="submit" id="button">Agregar Administrador</button></center>
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