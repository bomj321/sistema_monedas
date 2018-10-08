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

							 echo form_open_multipart('billetes/update',$formulario); 

							 ?>
 <?php foreach($atributos_not as $atributo_not):?>
<input type="text" value="<?php echo $atributo_not->nombre_atributo?>">
<input type="text" value="<?php echo $atributo_not->idbillete?>">

<?php endforeach;?>
<br>
<br>
<?php $query = $this->db->query("SELECT * FROM atributo_billetes WHERE id_billete='$atributo_not->idbillete[0]';"); ?>

 <?php foreach($query->result() as $atributo):?>
 	<input type="text" value="<?php echo $atributo->atributo_billete?>">

 <?php endforeach;?>
<br>
<br>
 <?php $query2 = $this->db->query("SELECT * FROM atributos_b WHERE id_atributo_b NOT IN (SELECT id_atributo FROM atributo_billetes WHERE id_billete = '$atributo_not->idbillete')"); ?>

 <?php foreach($query2->result() as $atributo):?>
 	<input type="text" value="<?php echo $atributo->nombre_atributo?>">

 <?php endforeach;?>


							 <?php foreach($atributos as $atributo):?>

							 	<?php
							 		//CODIGO PARA FORMATEAR ATRIBUTOS
									 	 if (strpos($atributo->descripcion_atributo, 'Foto') !== false) 
									 	    {
									 	    		$name_id        = 'atributo_id_image[]';
									 	    		$id_unico        = 'id_unico[]';
										 	    	$input_atributo = array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo->nombreatributo,
										 			'placeholder'  =>  $atributo->nombreatributo,
										 			'name'         =>  'imagen[]',
										 			'value'        =>  $atributo->descripcionatributo,
										 			'type'         =>  'file',
										 			'multiple'     =>  true
										 			
										 		);									 		   
									 		}else
									 		{
									 				$name_id        = 'atributo_id[]';
									 				$id_unico        = 'id_unico[]';
										 			$input_atributo =  array(
										 			'required'     =>  true,
										 			'class'        =>  'form-control', 
										 			'id'           =>  $atributo->nombreatributo,
										 			'placeholder'  =>  $atributo->nombreatributo,
										 			'name'         =>  'catalogo[]',
										 			'value'        =>  $atributo->descripcionatributo,
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


	                						echo form_label($atributo->nombreatributo,$atributo->nombreatributo,$label_atributo)
										 ?>
										<input type="text" name='<?php echo $name_id?>' value="<?php echo $atributo->id_atributo_b;?>">
								         <input type="text" name='<?php echo $id_unico?>' value="<?php echo $atributo->id_unico_atributo;?>">

										 <div class="col-md-10 col-sm-12 col-xs-12">
										 	<?php echo form_input($input_atributo);?>
										 </div>
										  <?php if(strpos($atributo->descripcion_atributo, 'Foto') !== false):?>
										 <div class="col-md-12 col-sm-12 col-xs-12">										
										 		<div><img style="margin:10px 10px;" width="100" src="<?php echo base_url().'public/images_billetes/'.$atributo->descripcionatributo?>"></div>										
										 </div>
										  <?php endif; ?>
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

            <?php foreach($catalogos_edit as $catalogo_edit):?>    
								 <table class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
								 	<input type="text" value="<?php echo $catalogo_edit->id_unico_atributo ?>" name="id_unico_catalogo_edit[]">
								 	<input type="text" value="<?php echo $catalogo_edit->id_atributo_edit ?>" name="id_atributo_edit[]">
								        <thead>
								        	<tr >
								        	  <th colspan="5">
								        	  	<div class="row">
									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  				  	<center style="margin-top: 10px;"><?php echo $catalogo_edit->nombreatributo;?></center>
									  				</div>

									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  				<center style="margin-top: 10px;"><input class="form-control" type="text" name="numero_referencia_edit[]" placeholder="Numero de Referencia" value="<?php echo $catalogo_edit->descripcionatributo;?>"></center>										  					
									  				</div>

									  				<div class="col-md-4 col-sm-12 col-xs-12">
									  					<center style="margin-top: 10px;"><button class=" btn btn-warning btn-remove" type="button">Eliminar Catalogo</button></center>
									  				</div>		
								        	  	</div> 
								        	  </th>
								        	</tr>
								            <tr>
								                <th>G</th>
								                <th>F</th>
								                <th>VF</th>
								                <th>XF</th>
								                <th>UNC</th>                                   
								            </tr>
								        </thead>
								        <tbody>								        	
								        	    <?php foreach($pagos_catalogo as $pago_catalogo):?> 
								        	    <?php if($pago_catalogo->id_catalogo == $catalogo_edit->atributoid): ?> 
								                    <tr>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_G_edit[]" value="<?php echo $pago_catalogo->G?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_F_edit[]" value="<?php echo $pago_catalogo->VF?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VF_edit[]" value="<?php echo $pago_catalogo->F?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_XF_edit[]" value="<?php echo $pago_catalogo->XF?>"></center></td>
								                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_UNC_edit[]" value="<?php echo $pago_catalogo->UNC?>"></center></td>
								                    </tr>
								                <?php endif; ?>
								                 <?php endforeach;?>     
								        </tbody>
								</table>   	
		        <?php endforeach;?>        


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