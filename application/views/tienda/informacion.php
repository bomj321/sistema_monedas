<div class="row">			
		<div class="col-md-6 col-sm-12 col-xs-12">

			<?php if(!empty($monedas_general)): ?>
					<center><h4>Informaci&oacute;n General</h4></center>
					<?php foreach ($monedas_general as $moneda_general ): ?>
						<?php if($moneda_general->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_general->nombreatributo?>: <?php echo $moneda_general->descripcionatributo?><?php echo $moneda_general->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12">

				<?php if(!empty($monedas_tecnico)): ?>
					<center><h4>Datos T&eacute;cnicos</h4></center>
					<?php foreach ($monedas_tecnico as $moneda_tecnico ): ?>
						<?php if($moneda_tecnico->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_tecnico->nombreatributo?>: <?php echo $moneda_tecnico->descripcionatributo?><?php echo $moneda_tecnico->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

		</div>				

</div>



				<?php if(!empty($monedas_anverso)): ?>
					<center><h4>Anverso</h4></center>
					<?php foreach ($monedas_anverso as $moneda_anverso ): ?>
						<?php if($moneda_anverso->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_anverso->nombreatributo?>: <?php echo $moneda_anverso->descripcionatributo?><?php echo $moneda_anverso->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_reverso)): ?>
					<center><h4>Reverso</h4></center>
					<?php foreach ($monedas_reverso as $moneda_reverso ): ?>
						<?php if($moneda_reverso->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_reverso->nombreatributo?>: <?php echo $moneda_reverso->descripcionatributo?><?php echo $moneda_reverso->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_canto)): ?>
					<center><h4>Canto</h4></center>
					<?php foreach ($monedas_canto as $moneda_canto ): ?>
						<?php if($moneda_canto->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_canto->nombreatributo?>: <?php echo $moneda_canto->descripcionatributo?><?php echo $moneda_canto->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_variedades)): ?>
					<center><h4>Variedades</h4></center>
					<?php foreach ($monedas_variedades as $moneda_variedad ): ?>
						<?php if($moneda_variedad->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_variedad->nombreatributo?>: <?php echo $moneda_variedad->descripcionatributo?><?php echo $moneda_variedad->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>

				<?php if(!empty($monedas_adicional)): ?>
					<center><h4>Informaci&oacute;n Adicional</h4></center>
					<?php foreach ($monedas_adicional as $moneda_adicional ): ?>
						<?php if($moneda_adicional->estado == '1' OR $this->session->userdata("tipo_usuario") != '2'): ?>
							<p><?php echo $moneda_adicional->nombreatributo?>: <?php echo $moneda_adicional->descripcionatributo?><?php echo $moneda_adicional->palabraclave == 'Precio' ? ' $':'';?></p>
						<?php endif; ?>	 
					<?php endforeach;?>
				<?php endif; ?>