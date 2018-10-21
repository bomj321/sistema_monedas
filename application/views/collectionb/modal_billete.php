<div class="container">
	<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->
<?php if(!empty($coleccionesbp)): ?>
	<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<center><h3>Moneda Principal</h3></center>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<a href="<?php echo base_url();?>collectionb/editp/<?php echo $coleccionesbp->id_coleccion_personal_billete;?>" class="btn btn-success" style="width: 100%">Editar</a>
				</div>
		</div>

	<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				
					 <?php if($this->session->userdata("tipo_usuario")==1 ):?>
						<p>Condición del Billete: <?php echo $coleccionesbp->condicion_billete                == '' ? 'Sin Información': $coleccionesbp->condicion_billete;?></p>
					 <?php endif; ?> 
					<p>Casa Certificadora: <?php echo $coleccionesbp->casa_certificadora                      == '' ? 'Sin Información': $coleccionesbp->casa_certificadora;?></p>
					<p>Valor de la Certificaci&oacute;n: <?php echo $coleccionesbp->valor_certificacion       == '' ? 'Sin Información': $coleccionesbp->valor_certificacion;?></p>
					<p>Registro de la Certificaci&oacute;n: <?php echo $coleccionesbp->registro_certificacion == '' ? 'Sin Información': $coleccionesbp->registro_certificacion;?></p>
					<p>Tipo de Registro: <?php echo $coleccionesbp->tipo_registro                             == '' ? 'Sin Información': $coleccionesbp->tipo_registro;?></p>
					<p>Precio del Billete: <?php echo $coleccionesbp->precio_billete                          == '' ? 'Sin Información': $coleccionesbp->precio_billete . ' $';?></p>
					<p>Serie del Billete: <?php echo $coleccionesbp->serie_billete                            == '' ? 'Sin Información': $coleccionesbp->serie_billete;?></p>
					<p>Precio de Referencia: <?php echo $coleccionesbp->precio_referencia                     == '' ? 'Sin Información': $coleccionesbp->precio_referencia . ' $';?></p>
					<p>Lugar donde se Adquiri&oacute;: <?php echo $coleccionesbp->lugar_billete               == '' ? 'Sin Información': $coleccionesbp->lugar_billete;?></p>
					<?php if($this->session->userdata("tipo_usuario")==1 ):?>
						<p>Cantidad Adicional: <?php echo $coleccionesbp->cantidad_billete                    == '' ? 'Sin Información': $coleccionesbp->cantidad_billete;?></p>
					 <?php endif; ?> 	
					<p>Descripci&oacute;n: <?php echo $coleccionesbp->descripcion_billete                     == '' ? 'Sin Información': $coleccionesbp->descripcion_billete;?></p>
					
				
			</div>	 
	</div>
<?php endif; ?>		 	
	<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

	<!-------------------------------------------BILLETES AGREGADOS------------------------------------------------------------>
	<?php if(!empty($coleccionesba)): ?>
		<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<center><h3>Monedas Adicionales</h3></center>
				</div>
		</div>

		<?php foreach($coleccionesba as $coleccionesba):?>
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-top: 40px;">	
							<?php if($this->session->userdata("tipo_usuario")==1 ):?>
								<p>Condición del Billete: <?php echo $coleccionesba->condicion_billete                == '' ? 'Sin Información': $coleccionesba->condicion_billete;?></p>
							<?php endif; ?>	
								<p>Serie del Billete: <?php echo $coleccionesba->serie_billete                        == '' ? 'Sin Información': $coleccionesba->serie_billete;?></p>
								<p>Subserie del Billete: <?php echo $coleccionesba->subserie                          == '' ? 'Sin Información': $coleccionesba->subserie;?></p>
								<p>Numero del Billete: <?php echo $coleccionesba->numero_billete_add                  == '' ? 'Sin Información': $coleccionesba->numero_billete_add;?></p>
								<p>Tipo de Registro: <?php echo $coleccionesba->tipo_registro                         == '' ? 'Sin Información': $coleccionesba->tipo_registro;?></p>
								<p>Precio del Billete: <?php echo $coleccionesba->precio_billete                      == '' ? 'Sin Información': $coleccionesba->precio_billete. ' $';?></p>
								<p>Descripci&oacute;n: <?php echo $coleccionesba->descripcion_billete                 == '' ? 'Sin Información': $coleccionesba->descripcion_billete;?></p>
							 	
					
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<center>
							<a href="<?php echo base_url();?>collectionb/edita/<?php echo $coleccionesba->id_coleccion_personal_billete;?>" class="btn btn-warning" style="width: 100%">Editar</a>

							<a target="_blank"  href="<?php echo base_url().'public/images_billetes/'.$coleccionesba->foto_frente_billete?>" class="zoom">
						    <img class="zoom" src="<?php echo base_url().'public/images_billetes/'.$coleccionesba->foto_frente_billete?>" style='width: 100%; height: 100px;' />

						    <a target="_blank"  href="<?php echo base_url().'public/images_billetes/'.$coleccionesba->foto_detras_billete?>" class="zoom">
						    <img class="zoom" src="<?php echo base_url().'public/images_billetes/'.$coleccionesba->foto_detras_billete?>" style='width: 100%; height: 100px;' />
						</center>
				</div>	


			</div>
		<?php endforeach;?>
	<?php endif; ?>	
</div>

<!-------------------------------------------BILLETES AGREGADOS------------------------------------------------------------>

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
