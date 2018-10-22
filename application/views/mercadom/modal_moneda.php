<div class="container">

	<!-------------------------------------------MONEDAS AGREGADOS------------------------------------------------------------>
	<?php if(!empty($coleccionesm)): ?>		

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
							<?php if($this->session->userdata("tipo_usuario")==1 ):?>
								<p>Condición del Moneda: <?php echo $coleccionesm->condicion_moneda                           == '' ? 'Sin Información': $coleccionesm->condicion_moneda;?></p>
							 <?php endif; ?>	
								 <p>Casa Certificadora: <?php echo $coleccionesm->casa_certificadora                          == '' ? 'Sin Información': $coleccionesm->casa_certificadora;?></p>
								<p>Valor de la Certificaci&oacute;n: <?php echo $coleccionesm->valor_certificacion            == '' ? 'Sin Información': $coleccionesm->valor_certificacion;?></p>
								<p>Registro de la Certificaci&oacute;n: <?php echo $coleccionesm->registro_certificacion      == '' ? 'Sin Información': $coleccionesm->registro_certificacion;?></p>
								<p>Serie de la Moneda: <?php echo $coleccionesm->serie_moneda                        	          == '' ? 'Sin Información': $coleccionesm->serie_moneda;?></p>
								<p>Subserie de la Moneda: <?php echo $coleccionesm->subserie                        			  == '' ? 'Sin Información': $coleccionesm->subserie;?></p>
							<?php if($coleccionesm->tipo_moneda_registro =='add' ):?>
									<p>Numero de la  Moneda: <?php echo $coleccionesm->numero_moneda_add               		      == '' ? 'Sin Información': $coleccionesm->numero_moneda_add;?></p>
							<?php endif; ?>
								<p>Tipo de Registro: <?php echo $coleccionesm->tipo_registro                                  == '' ? 'Sin Información': $coleccionesm->tipo_registro;?></p>
							<?php if($coleccionesm->tipo_registro!='Busco' ):?>		
									<p>Precio de la Moneda: <?php echo $coleccionesm->precio_moneda                                == '' ? 'Sin Información': $coleccionesm->precio_moneda. ' $';?></p>
							<?php endif; ?>			
								
					
				</div>
				
			</div>
	<?php endif; ?>	
</div>

<!-------------------------------------------MONEDAS AGREGADOS------------------------------------------------------------>

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
