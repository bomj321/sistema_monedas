<div class="form-group">
    <label for="precio_billete" class="col-sm-2 col-xs-12 col-md-2 control-label">Precio</label>                              
     <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" required class="form-control" placeholder="Precio del Billete" id="precio_billete" name="precio_billete">
            <?php                                       
            echo form_error("precio_billete","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
            ?>
    </div>                  
</div>