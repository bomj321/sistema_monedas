<?php foreach ($billetes as $billete ): ?>
<p><?php echo $billete->nombreatributo?>: <?php echo $billete->descripcionarticulo?></p> 
<?php endforeach;?>
<center><h3>Imagen del Billete</h3></center>
<?php foreach ($imagenes as $imagen ): ?>
<center>
	<a target="_blank"  href="<?php echo base_url().'public/images_billetes/'.$imagen->descripcionarticulo?>" class="zoom">
    <img class="zoom" src="<?php echo base_url().'public/images_billetes/'.$imagen->descripcionarticulo?>" style='width: 400px; height: 200px;' />
</a>
</center>
<?php endforeach;?>