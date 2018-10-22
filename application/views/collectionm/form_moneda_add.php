<div class="form-group">
    <label for="precio_moneda_add" class="col-sm-2 col-xs-12 col-md-2 control-label">Precio</label>                              
     <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" required class="form-control" placeholder="Precio de la Moneda" id="precio_moneda_add" name="precio_moneda_add_<?php echo $contador?>">
            <?php                                       
            echo form_error("precio_moneda_add","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
            ?>
    </div>                  
</div>