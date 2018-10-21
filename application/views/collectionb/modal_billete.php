<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->
<?php if(!empty($coleccionesbp)): ?>
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
		<p>Cantidad Adicional: <?php echo $coleccionesbp->cantidad_billete                   == '' ? 'Sin Información': $coleccionesbp->cantidad_billete;?></p>
	 <?php endif; ?> 	
	<p>Descripci&oacute;n: <?php echo $coleccionesbp->descripcion_billete                     == '' ? 'Sin Información': $coleccionesbp->descripcion_billete;?></p>
	
 <?php endif; ?>	
<!-----------------------------------------SECCION DE LOS ATRIBUTOS--------------------------------------------------------->

<!----------------------------------------------------SECCION DE PAGOS---------------------------------------------->	
						
