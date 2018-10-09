<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edici&oacute;n de Atributos<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Atributo</h2>
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
							 echo form_open('attrmoneda/update_atribute',$formulario);
							 ?>
							 <input type="hidden" name="id_atributo" value="<?php echo $atributo->id_atributo_m ?>">
								<div class="form-group">
									<label for="nombre_atributo" class="col-sm-2 col-xs-12 col-md-2 control-label">Nombre del Atributo</label>									
									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<input type="text" required="true" value="<?php echo $atributo->nombre_atributo ?>" class="form-control" id="nombre_atributo" name="nombre_atributo">
									 	<?php echo form_error("nombre_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>") ?>
									 </div>									
					
								</div>	

								<div class="form-group">
									<label for="descripcion_atributo" class="col-sm-2 col-xs-12 col-md-2 control-label">Descripción</label>									

									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<input placeholder="Descripción del Atributo (Palabra Clave: EJ: catalogo,tipo)" value="<?php echo $atributo->descripcion_atributo ?>" type="text" required="true" class="form-control" id="descripcion_atributo" name="descripcion_atributo">
									 	<?php echo form_error("descripcion_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>") ?>
									 </div>
					
								</div>


								<div class="col-md-12 col-sm-12 col-xs-12">									
										<center><button class="btn btn-primary" type="submit">Editar Atributo</button></center>
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