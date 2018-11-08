<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->
<?php if(!empty($monedas)): ?>
	<?php foreach ($monedas as $moneda ): ?>
		<?php if($moneda->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
			<p><?php echo $moneda->nombreatributo?>: <?php echo $moneda->descripcionatributo?><?php echo $moneda->palabraclave == 'Precio' ? ' $':'';?></p>
		<?php endif; ?>	 
	<?php endforeach;?>
<?php endif; ?>
<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
<?php if($moneda->estado == '1' OR  $this->session->userdata("tipo_usuario") != '2'): ?>  
							<?php if(!empty($catalogos)): ?>
						<center><strong><h3>Catalogos Agregados</h3></strong></center>
							 <?php endif; ?>							
           	 <?php foreach($catalogos as $catalogo):?>           					   
									 <table class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">								 
									        <thead>
									        	<tr >
									        	  <th colspan="7">
									        	  	<div class="row">
										  				<div class="col-md-4 col-sm-12 col-xs-12">
										  				  	<center style="margin-top: 10px;"><?php echo $catalogo->nombreatributo;?></center>
										  				</div>

										  				<div class="col-md-4 col-sm-12 col-xs-12">
										  				<center style="margin-top: 10px;"><input disabled  class="form-control" type="text" value="<?php echo $catalogo->descripcionatributo;?>"></center>										  					
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
									        	    <?php if($pago_catalogo->id_catalogo == $catalogo->atributoid): ?> 
									                   <tr>				
									                   <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->G == '' ? 'Sin Precio' :  $pago_catalogo->G . ' $'?> "></center></td>
									                   <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->VG == '' ? 'Sin Precio' :  $pago_catalogo->VG . ' $'?> "></center></td>			                        
								                        <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->F == '' ? 'Sin Precio' :  $pago_catalogo->F . ' $'?> "></center></td>
								                        <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->VF == '' ? 'Sin Precio' : $pago_catalogo->VF . ' $'?> "></center></td>							                        
								                        <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->XF == '' ? 'Sin Precio' : $pago_catalogo->XF . ' $'?> "></center></td>
								                        <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->AU == '' ? 'Sin Precio' :  $pago_catalogo->AU . ' $' ?> "></center></td>
								                        <td><center><input disabled style="width: 100%; height: 100%" type="text" value="<?php echo $pago_catalogo->UNC == '' ? 'Sin Precio' : $pago_catalogo->UNC . ' $'?> "></center></td>
									                   </tr>
									                <?php endif; ?>
									                 <?php endforeach;?>     
									        </tbody>
									</table> 									  	
		        	<?php endforeach;?> 
   <?php else: ?> 
				<center><h4>Solo Usuarios Pagos</h4></center>

	<?php endif; ?> 
<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->

<!--------------------------------------------------SECCION DE LAS IMAGENES-->
<?php if($moneda->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
	<?php if (!empty($imagenes)): ?>	
				<center><h3>Imagenes de la Moneda</h3></center>
				<?php foreach ($imagenes as $imagen ): ?>
				<?php $imagen_descripcionatributo = explode(",", $imagen->descripcionatributo); ?>
				<center>
					<a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" class="zoom">
				    <img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" style='width: 400px; height: 200px;' />
				</a>
				</center>			
		<?php endforeach;?>
	<?php endif;?>
<?php endif; ?>		
<!--------------------------------------------------SECCION DE LAS IMAGENES-->	