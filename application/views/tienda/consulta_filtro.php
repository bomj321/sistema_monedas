<?php if (!empty($opciones_atributo)): ?>
    <form action="<?php echo base_url();?>tienda" method='POST' class="form-inline">  
		  <div class="form-group">
		  	 <input name="id_filtro" type="hidden" value="<?php echo $id_atributo;?>">
		     <select class='form-control' name="filtros" id="filtros"  style="width: 300px;">
            	<?php foreach ($opciones_atributo as $opcion_atributo): ?>
            		<option value="<?php echo $opcion_atributo->atributo_moneda;?>"><?php echo $opcion_atributo->atributo_moneda;?></option>
            	<?php endforeach ?>
            </select>
		  </div>
		  <button class="btn btn-primary" type="submit">Buscar</button>
	</form>

<?php else: ?>
<center><h3 style="color: red; font-weight: bold;">No hay Resultados</h3></center>
<?php endif ?>

