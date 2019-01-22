<?php if($this->session->userdata("tipo_usuario") != '2'): ?>
						<?php if (!empty($imagenes)): ?>	
									<center><h4>Imagenes</h4></center>
									<?php foreach ($imagenes as $imagen ): ?>
									<?php $imagen_descripcionatributo = explode(",", $imagen->descripcionatributo); ?>

										<a target="_blank"  href="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" class="zoom" style='margin-left: 60px;'>
									    <img class="zoom" src="<?php echo base_url().'public/images_monedas/'.$imagen_descripcionatributo[0]?>" style='width: 200px; height: 200px;' />
										</a>
							<?php endforeach;?>
							<?php else: ?>
								<center><h3>No Hay Imagenes</h3></center>
						<?php endif;?>
				<?php endif; ?>	