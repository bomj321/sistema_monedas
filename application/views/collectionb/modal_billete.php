<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->
<?php if(!empty($coleccionesb)): ?>
	 <?php if($this->session->userdata("tipo_usuario")==1 ):?>
		<p>Condición del Billete: <?php echo $coleccionesb->condicion_billete                    == '' ? 'Sin Información': $coleccionesb->condicion_billete;?></p>
	 <?php endif; ?> 
	<p>Casa Certificadora: <?php echo $coleccionesb->casa_certificadora                      == '' ? 'Sin Información': $coleccionesb->casa_certificadora;?></p>
	<p>Valor de la Certificaci&oacute;n: <?php echo $coleccionesb->valor_certificacion       == '' ? 'Sin Información': $coleccionesb->valor_certificacion;?></p>
	<p>Registro de la Certificaci&oacute;n: <?php echo $coleccionesb->registro_certificacion == '' ? 'Sin Información': $coleccionesb->registro_certificacion;?></p>
	<p>Tipo de Registro: <?php echo $coleccionesb->tipo_registro                             == '' ? 'Sin Información': $coleccionesb->tipo_registro;?></p>
	<p>Precio del Billete: <?php echo $coleccionesb->precio_billete                          == '' ? 'Sin Información': $coleccionesb->precio_billete . ' $';?></p>
	<p>Serie del Billete: <?php echo $coleccionesb->serie_billete                            == '' ? 'Sin Información': $coleccionesb->serie_billete;?></p>
	<p>Precio de Referencia: <?php echo $coleccionesb->precio_referencia                     == '' ? 'Sin Información': $coleccionesb->precio_referencia . ' $';?></p>
	<p>Lugar donde se Adquiri&oacute;: <?php echo $coleccionesb->lugar_billete               == '' ? 'Sin Información': $coleccionesb->lugar_billete;?></p>
	<?php if($this->session->userdata("tipo_usuario")==1 ):?>
		<p>Cantidad Disponible: <?php echo $coleccionesb->cantidad_billete                   == '' ? 'Sin Información': $coleccionesb->cantidad_billete;?></p>
	 <?php endif; ?> 	
	<p>Descripci&oacute;n: <?php echo $coleccionesb->descripcion_billete                     == '' ? 'Sin Información': $coleccionesb->descripcion_billete;?></p>
	
 <?php endif; ?>	
<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
