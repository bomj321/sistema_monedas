<div class="container">

	<!-------------------------------------------BILLETES AGREGADOS------------------------------------------------------------>
	<?php if(!empty($coleccionesb)): ?>		

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
							<?php if($this->session->userdata("tipo_usuario")==1 ):?>
								<p>Condición del Billete: <?php echo $coleccionesb->condicion_billete                         == '' ? 'Sin Información': $coleccionesb->condicion_billete;?></p>
							 <?php endif; ?>	
								 <p>Casa Certificadora: <?php echo $coleccionesb->casa_certificadora                         == '' ? 'Sin Información': $coleccionesb->casa_certificadora;?></p>
								<p>Valor de la Certificaci&oacute;n: <?php echo $coleccionesb->valor_certificacion           == '' ? 'Sin Información': $coleccionesb->valor_certificacion;?></p>
								<p>Registro de la Certificaci&oacute;n: <?php echo $coleccionesb->registro_certificacion     == '' ? 'Sin Información': $coleccionesb->registro_certificacion;?></p>
								<p>Serie del Billete: <?php echo $coleccionesb->serie_billete                        	      == '' ? 'Sin Información': $coleccionesb->serie_billete;?></p>
								<p>Subserie del Billete: <?php echo $coleccionesb->subserie                        			  == '' ? 'Sin Información': $coleccionesb->subserie;?></p>
								<p>Numero del Billete: <?php echo $coleccionesb->numero_billete_add               		      == '' ? 'Sin Información': $coleccionesb->numero_billete_add;?></p>
								<p>Tipo de Registro: <?php echo $coleccionesb->tipo_registro                                  == '' ? 'Sin Información': $coleccionesb->tipo_registro;?></p>
								<p>Precio del Billete: <?php echo $coleccionesb->precio_billete                               == '' ? 'Sin Información': $coleccionesb->precio_billete. ' $';?></p>
								
					
				</div>
				
			</div>
	<?php endif; ?>	
</div>

<!-------------------------------------------BILLETES AGREGADOS------------------------------------------------------------>

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
