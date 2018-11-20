<div class="container">
	<div class="row">
<!------------------------------------------------IMAGEN-------------------------------------------------------------------->
		<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 contenido_modal">
				<?php if(!empty($monedas_general)): ?>
					<center><h3>Información General</h3></center>
					<?php foreach ($monedas_general as $moneda_general ): ?>
						<?php if($moneda_general->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_general->nombreatributo?>: <?php echo $moneda_general->descripcionatributo?><?php echo $moneda_general->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>


				<?php if(!empty($monedas_tecnico)): ?>
					<center><h3>Datos Técnicos</h3></center>
					<?php foreach ($monedas_tecnico as $moneda_tecnico ): ?>
						<?php if($moneda_tecnico->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_tecnico->nombreatributo?>: <?php echo $moneda_tecnico->descripcionatributo?><?php echo $moneda_tecnico->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_anverso)): ?>
					<center><h3>Anverso</h3></center>
					<?php foreach ($monedas_anverso as $moneda_anverso ): ?>
						<?php if($moneda_anverso->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_anverso->nombreatributo?>: <?php echo $moneda_anverso->descripcionatributo?><?php echo $moneda_anverso->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_reverso)): ?>
					<center><h3>Reverso</h3></center>
					<?php foreach ($monedas_reverso as $moneda_reverso ): ?>
						<?php if($moneda_reverso->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_reverso->nombreatributo?>: <?php echo $moneda_reverso->descripcionatributo?><?php echo $moneda_reverso->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_canto)): ?>
					<center><h3>Canto</h3></center>
					<?php foreach ($monedas_canto as $moneda_canto ): ?>
						<?php if($moneda_canto->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_canto->nombreatributo?>: <?php echo $moneda_canto->descripcionatributo?><?php echo $moneda_canto->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_variedades)): ?>
					<center><h3>Variedades</h3></center>
					<?php foreach ($monedas_variedades as $moneda_variedad ): ?>
						<?php if($moneda_variedad->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_variedad->nombreatributo?>: <?php echo $moneda_variedad->descripcionatributo?><?php echo $moneda_variedad->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_adicional)): ?>
					<center><h3>Información Adicional</h3></center>
					<?php foreach ($monedas_adicional as $moneda_adicional ): ?>
						<?php if($moneda_adicional->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_adicional->nombreatributo?>: <?php echo $moneda_adicional->descripcionatributo?><?php echo $moneda_adicional->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

		</div>
<!------------------------------------------------IMAGEN-------------------------------------------------------------------->

<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
				

				<?php if($this->session->userdata("tipo_usuario") != '2'): ?>
						<?php if (!empty($imagenes)): ?>	
									<center><h3>Imagenes</h3></center>
									<?php foreach ($imagenes as $imagen ): ?>
									<?php $imagen_descripcionatributo = explode(",", $imagen->descripcionatributo); ?>
									<center>
										<a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" class="zoom">
									    <img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" style='width: 100%; height: 300px;' />
									</a>
									</center>			
							<?php endforeach;?>
						<?php endif;?>
				<?php endif; ?>	
		</div>
<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
<?php if($this->session->userdata("tipo_usuario") != '2'): ?>  
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
		</div>
	</div>
</div>