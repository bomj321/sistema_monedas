<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar a Colecci&oacute;n</h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Colleci&oacute;n de Billetes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                 

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
								<div class="form-group">
									<label for="condicion_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<select  class="form-control" id="condicion_billete" name="condicion_billete">
									 				<option value="">Seleccione una Opcion</option>	
													<option value="">G</option>
											 		<option value="">VG</option>
											 		<option value="">F</option>
											 		<option value="">VF</option>
											 		<option value="">XF</option>
											 		<option value="">AU</option>
											 		<option value="">UNC</option>										 		
										 	</select>
										 	<?php 									 	
	                						echo form_error("condicion_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>	

								<div class="form-group">
									<label for="casa_certificadora" class="col-sm-2 col-xs-12 col-md-2 control-label">Certificaci&oacute;n</label>								
									 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<input onkeypress="cerficacion()" type="text" class="form-control" placeholder="Casa Certificadora" id="casa_certificadora" name="casa_certificadora">
										 	<?php 									 	
	                						echo form_error("casa_certificadora","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>
					
								</div>					

								<div class="col-md-12 col-sm-12 col-xs-12">		
									<center><button class="btn btn-primary" type="submit" id="button">Agregar</button></center>
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