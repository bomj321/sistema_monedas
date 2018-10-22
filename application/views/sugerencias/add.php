<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Enviar Sugerencias</h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sugerencias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                 

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error_sug")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><?php echo $this->session->flashdata("error_sug"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php 
							 $formulario = array('class' => 'form-horizontal');
							 echo form_open_multipart('sugerencias/create',$formulario); 
							 ?>
							 <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata("id") ?>">							

								

								<div class="form-group" style="margin-bottom: 50px;">
									<label for="sugerencia" class="col-sm-12 col-xs-12 col-md-3 col-lg-3 control-label">Envia Tu Sugerencia</label>								
									 <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
										 	<textarea required name="sugerencia" id="sugerencia" cols="30" rows="10" class="form-control"></textarea>
										 	<?php 									 	
	                						echo form_error("sugerencia","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
										    ?>
									</div>					
								</div>							
							
								<div class="col-md-12 col-sm-12 col-xs-12">		
									<center><button class="btn btn-primary" type="submit" id="button">Envia tu Sugerencia</button></center>
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