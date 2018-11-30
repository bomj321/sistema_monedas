<div>
				

				<?php if($this->session->userdata("tipo_usuario") != '2'): ?>
						<?php if (!empty($imagenes)): ?>									
									<?php foreach ($imagenes as $imagen ): ?>
									<?php $imagen_descripcionatributo = explode(",", $imagen->descripcionatributo); ?>
										<a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" class="zoom">
									    	<img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" style='width: 100px; height: 100px;' />
									   </a>
							<?php endforeach;?>
							<?php else: ?>
								<h4>No hay Imagenes</h4>
						<?php endif;?>
				<?php endif; ?>	
</div>

