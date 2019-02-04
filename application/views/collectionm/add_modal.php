<?php 
               $formulario = array('class' => 'form-horizontal');
               echo form_open_multipart('collectionm/create',$formulario); 
               ?>
                             <input type="hidden" name="id_usuario" value="<?php echo $this->session->userdata("id") ?>">
                             <input type="hidden" name="id_moneda" value="<?php echo $id_moneda ?>">
                             <input type="hidden" value="principal" name="tipo_registro_moneda">

                             
                <div class="form-group">
                  <label for="condicion_moneda" class="col-sm-2 col-xs-12 col-md-2 control-label">Condici&oacute;n</label>                
                   <div class="col-md-10 col-sm-12 col-xs-12">
                      <select class="form-control" id="condicion_moneda" name="condicion_moneda" required >
                          <option value="">Seleccione una Opcion</option> 
                          <option value="G">G</option>
                          <option value="VG">VG</option>
                          <option value="F">F</option>
                          <option value="VF">VF</option>
                          <option value="XF">XF</option>
                          <option value="AU">AU</option>
                          <option value="UNC">UNC</option>                        
                      </select>
                    
                  </div>
          
                </div>  

                <div class="form-group">
                  <label for="casa_certificadora" class="col-sm-2 col-xs-12 col-md-2 control-label">Certificaci&oacute;n</label>                
                   <div class="col-md-10 col-sm-12 col-xs-12">
                      <input type="text" class="form-control" placeholder="Casa Certificadora" id="casa_certificadora" name="casa_certificadora" required>                     
                  </div>
          
                </div>

                <div class="form-group">
                  <label for="valor_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Valoraci&oacute;n</label>                
                   <div class="col-md-10 col-sm-12 col-xs-12">
                      <input type="text" class="form-control" placeholder="Valoración de la Certificadora" id="valor_certificacion" name="valor_certificacion" required>
                     
                  </div>          
                </div>

                <div class="form-group">
                  <label for="registro_certificacion" class="col-sm-2 col-xs-12 col-md-2 control-label">Registro</label>                
                   <div class="col-md-10 col-sm-12 col-xs-12">
                      <input type="text" class="form-control" placeholder="Registro del Certificado" id="registro_certificacion" name="registro_certificacion" required>
                     
                  </div>          
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label for="descripcion_moneda" class="col-sm-2 col-xs-12 col-md-2 control-label">Nota P&uacute;blica</label>               
                   <div class="col-md-10 col-sm-12 col-xs-12">
                      <textarea name="descripcion_moneda" id="descripcion_moneda" cols="30" rows="10" class="form-control" required></textarea>

                  </div>          
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">   
                  <button class="btn btn-primary" type="submit" id="button">Agregar a Colecci&oacute;n</button>
                </div>  

               <?php echo form_close(); ?>