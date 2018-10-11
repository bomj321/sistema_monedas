<table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
	<input type="hidden" value="<?php echo $value?>" name="id_catalogo[]">
        <thead>
        	<tr >
        	  <th colspan="7">
        	  	<div class="row">
	  				<div class="col-md-4 col-sm-12 col-xs-12">
	  					<center style="margin-top: 10px;"><?php $nombre_formateado= str_replace("%20"," ",$nombre); echo $nombre_formateado;?></center>
	  				</div>

	  				<div class="col-md-4 col-sm-12 col-xs-12">
	  					<center style="margin-top: 10px;"><input class="form-control" type="text" name="numero_referencia[]" placeholder="Numero de Referencia"></center>
	  				</div>

	  				<div class="col-md-4 col-sm-12 col-xs-12">
	  					<center style="margin-top: 10px;"><button class=" btn btn-warning btn-remove" type="button">Eliminar Catalogo</button></center>
	  				</div>		
        	  	</div> 
        	  </th>
        	</tr>
            <tr>
                <th>G</th>
                <th>VG</th>
                <th>F</th>
                <th>VF</th>
                <th>XF</th>
                <th>AU</th>
                <th>UNC</th>                                   
            </tr>
        </thead>
        <tbody>
        	<?php for ($i=0; $i < 1; $i++): ?>            
                    <tr>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_G[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VG[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_F[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_VF[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_XF[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_AU[]"></center></td>
                        <td><center><input style="width: 100%; height: 100%" type="text" name="precio_UNC[]"></center></td>
                    </tr>
            <?php endfor; ?>        
        </tbody>
</table>   