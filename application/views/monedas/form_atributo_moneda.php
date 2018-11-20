<?php if (!empty($opciones_atributo)): ?>
	<form action="<?php echo base_url();?>monedas/list" method='POST'>
	<div class="col-md-6 col-md-6 col-sm-12 col-xs-12">
	<input name="id_filtro" type="hidden" value="<?php echo $id_atributo;?>">		
        <div class="form-group">
            <select class='form-control' name="filtros" id="filtros">
            	<?php foreach ($opciones_atributo as $opcion_atributo): ?>
            		<option value="<?php echo $opcion_atributo->atributo_moneda;?>"><?php echo $opcion_atributo->atributo_moneda;?></option>
            	<?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="col-md-6 col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </div>
                                            
</form>

<?php else: ?>
<center><h3 style="color: red; font-weight: bold;">No hay Resultados</h3></center>
<?php endif ?>

