<div class="container">
	<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->
<?php if(!empty($coleccionesmp)): ?>
	<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<center><h3>Moneda Principal</h3></center>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<a href="<?php echo base_url();?>collectionm/editp/<?php echo $coleccionesmp->id_coleccion_personal_moneda;?>" class="btn btn-success" style="width: 100%">Editar</a>
				</div>
		</div>

	<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				
					 <?php if($this->session->userdata("tipo_usuario")==1 ):?>
						<p>Condición del Moneda: <?php echo $coleccionesmp->condicion_moneda                  == '' ? 'Sin Información': $coleccionesmp->condicion_moneda;?></p>
					 <?php endif; ?> 
					<p>Casa Certificadora: <?php echo $coleccionesmp->casa_certificadora                      == '' ? 'Sin Información': $coleccionesmp->casa_certificadora;?></p>
					<p>Valor de la Certificaci&oacute;n: <?php echo $coleccionesmp->valor_certificacion       == '' ? 'Sin Información': $coleccionesmp->valor_certificacion;?></p>
					<p>Registro de la Certificaci&oacute;n: <?php echo $coleccionesmp->registro_certificacion == '' ? 'Sin Información': $coleccionesmp->registro_certificacion;?></p>
					<p>Tipo de Registro: <?php echo $coleccionesmp->tipo_registro                             == '' ? 'Sin Información': $coleccionesmp->tipo_registro;?></p>
					<p>Precio del Moneda: <?php echo $coleccionesmp->precio_moneda                            == '' ? 'Sin Información': $coleccionesmp->precio_moneda . ' $';?></p>
					<p>Precio de Referencia: <?php echo $coleccionesmp->precio_referencia                     == '' ? 'Sin Información': $coleccionesmp->precio_referencia . ' $';?></p>
					<p>Lugar donde se Adquiri&oacute;: <?php echo $coleccionesmp->lugar_moneda                == '' ? 'Sin Información': $coleccionesmp->lugar_moneda;?></p>
					<?php if($this->session->userdata("tipo_usuario")==1 ):?>
						<p>Cantidad Adicional: <?php echo $coleccionesmp->cantidad_moneda                     == '' ? 'Sin Información': $coleccionesmp->cantidad_moneda;?></p>
					 <?php endif; ?> 	
					<p>Descripci&oacute;n: <?php echo $coleccionesmp->descripcion_moneda                      == '' ? 'Sin Información': $coleccionesmp->descripcion_moneda;?></p>
				<?php if($this->session->userdata("id")==$coleccionesmp->id_usuario ):?>
					<p>Descripci&oacute;n: <?php echo $coleccionesmp->descripcion_moneda_privada                      == '' ? 'Sin Información': $coleccionesmp->descripcion_moneda_privada;?></p>
				<?php endif; ?> 	
					
				
			</div>	 
	</div>
<?php endif; ?>		 	
	<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

	<!-------------------------------------------MONEDAS AGREGADOS------------------------------------------------------------>
	<?php if(!empty($coleccionesma)): ?>
		<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<center><h3>Monedas Adicionales</h3></center>
				</div>
		</div>

		<?php foreach($coleccionesma as $coleccionesma):?>
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-top: 40px;">	
							<?php if($this->session->userdata("tipo_usuario")==1 ):?>
								<p>Condición del Moneda: <?php echo $coleccionesma->condicion_moneda                == '' ? 'Sin Información': $coleccionesma->condicion_moneda;?></p>
							<?php endif; ?>	
								<p>Numero del Moneda: <?php echo $coleccionesma->numero_moneda_add                  == '' ? 'Sin Información': $coleccionesma->numero_moneda_add;?></p>
								<p>Tipo de Registro: <?php echo $coleccionesma->tipo_registro                       == '' ? 'Sin Información': $coleccionesma->tipo_registro;?></p>
								<p>Precio del Moneda: <?php echo $coleccionesma->precio_moneda                      == '' ? 'Sin Información': $coleccionesma->precio_moneda. ' $';?></p>
								<p>Descripci&oacute;n: <?php echo $coleccionesma->descripcion_moneda                == '' ? 'Sin Información': $coleccionesma->descripcion_moneda;?></p>
						<?php if($this->session->userdata("id")==$coleccionesma->id_usuario ):?>		
								<p>Descripci&oacute;n: <?php echo $coleccionesma->descripcion_moneda_privada        == '' ? 'Sin Información': $coleccionesma->descripcion_moneda_privada;?></p>
						<?php endif; ?> 		
							 	
					
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<center>
							<a href="<?php echo base_url();?>collectionm/edita/<?php echo $coleccionesma->id_coleccion_personal_moneda;?>" class="btn btn-warning" style="width: 100%">Editar</a>

							<a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$coleccionesma->foto_frente_moneda?>" class="zoom">
						    <img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$coleccionesma->foto_frente_moneda?>" style='width: 100%; height: 100px;' />

						    <a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$coleccionesma->foto_detras_moneda?>" class="zoom">
						    <img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$coleccionesma->foto_detras_moneda?>" style='width: 100%; height: 100px;' />
						</center>
				</div>	


			</div>
		<?php endforeach;?>
	<?php endif; ?>	
</div>

<!-------------------------------------------MONEDAS AGREGADOS------------------------------------------------------------>

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
