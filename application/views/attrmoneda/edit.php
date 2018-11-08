<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edici&oacute;n de Atributos<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Atributo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                  	

                  	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>                                
                             </div>
                       		 <?php endif;?>

							<?php
							$formulario = array('class' => 'form-horizontal');
							 echo form_open('attrmoneda/update_atribute',$formulario);
							 ?>
							 <input type="hidden" name="id_atributo" value="<?php echo $atributo->id_atributo_m ?>">
								<div class="form-group">
									<label for="nombre_atributo" class="col-sm-2 col-xs-12 col-md-2 control-label">Nombre del Atributo</label>									
									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<input type="text" required="true" value="<?php echo $atributo->nombre_atributo ?>" class="form-control" id="nombre_atributo" name="nombre_atributo">
									 	<?php echo form_error("nombre_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>") ?>
									 </div>									
					
								</div>	
<!--------------------------DESCRIPCION------------------>
								<div class="form-group">
									<label for="descripcion_atributo" class="col-sm-2 col-xs-12 col-md-2 control-label">Descripción</label>									

									 <div class="col-md-10 col-sm-12 col-xs-12">
									 	<input placeholder="Descripción del Atributo (Palabra Clave: EJ: catalogo,tipo)" value="<?php echo $atributo->descripcion_atributo ?>" type="text" required="true" class="form-control" id="descripcion_atributo" name="descripcion_atributo">
									 	<?php echo form_error("descripcion_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>") ?>
									 </div>
					
								</div>

<!--------------------------DESCRIPCION------------------>

<!---------------------------SECCION DE LAS CATEGORIAS DE ATRIBUTOS-->

                                <div class="form-group">
                                    <?php 
                                        $label_tipo = array(
                                            'class'        => 'col-sm-2 col-xs-12 col-md-2 control-label',

                                        );


                                        echo form_label('Categoría de Atributo','categoria_atributo',$label_tipo)
                                     ?>
                                
                            
                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                            <select  class="form-control" id="categoria_atributo" name="categoria_atributo" required='true'>
                                                    <option value="">Seleccione una Opcion</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Información_general' ? 'selected' : '' ?> value="Información_general">Información general</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Datos_Técnicos' ? 'selected' : '' ?> value="Datos_Técnicos">Datos Técnicos</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Anverso' ? 'selected' : '' ?> value="Anverso">Anverso</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Reverso' ? 'selected' : '' ?> value="Reverso">Reverso</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Canto' ? 'selected' : '' ?> value="Canto">Canto</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Información_adicional' ? 'selected' : '' ?> value="Información_adicional">Información adicional</option>
                                                    <option  <?php echo $atributo->categoria_atributom == 'Catalogos' ? 'selected' : '' ?> value="Catalogos">Catalogos</option>
                                            </select>
                                            <?php                                       
                                            echo form_error("categoria_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
                                            ?>
                                    </div>
                                </div>

<!---------------------------SECCION DE LAS CATEGORIAS DE ATRIBUTOS-->   

<!-------------------TIPO DE ATRIBUTO------------------------------->
                                <div class="form-group">  
                                 <label for="tipo_atributo" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Atributo</label>
                                
                              
                                  <div class="col-md-10 col-sm-12 col-xs-12">
                                      <select  class="form-control" name='tipo_atributo' id="tipo_atributo" required onchange="tipoatributom()">
                                          <option value="">Seleccione una Opcion</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Generales' ? 'selected' : '' ?> value="Generales">Generales</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Precios' ? 'selected' : '' ?> value="Precios">Precios</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Especiales' ? 'selected' : '' ?> value="Especiales">Especiales</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Catalogos' ? 'selected' : '' ?> value="Catalogos">Catalogos</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Fotos' ? 'selected' : '' ?> value="Fotos">Fotos</option>
                                          <option <?php echo $atributo->tipo_atributom == 'Medidas' ? 'selected' : '' ?> value="Medidas">Medidas</option>
                                        
                                      </select>
                                      <?php                     
                                              echo form_error("tipo_atributo","<span style='margin-top:10px;' class='pull-left label label-danger'>","</span>")
                                        ?>
                                  </div>
                                </div>                            
<!-------------------TIPO DE ATRIBUTO-------------------------------> 

<!--------ATRIBUTOS ESPECIALES--------->
                               <?php if (!empty($atributo_especiales)): ?>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col xs-12">
                                            <center><h3>Opciones del Atributo Agregadas</h3></center>
                                        </div>
                                    </div>

                                    <?php foreach ($atributo_especiales as $atributo_especial): ?>
                                        <div class="form-group">
                                            <label for="opciones_especialesm" class="col-sm-12 col-xs-12 col-md-2 col-lg-2  control-label">Opci&oacute;n</label>
                                             <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input value="<?php echo $atributo_especial->opciones_especialesm ?>" required type="text" class="form-control" placeholder="Opcion Nueva" id="opciones_especialesm" name="opciones_especialesm[]">            
                                            </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <a href="<?php echo base_url();?>attrmoneda/delete_opcion_es/<?php echo $atributo_especial->id_atributos_especiales_m?>/<?php echo $atributo->id_atributo_m ?>" class=" btn btn-warning" type="button">Eliminar Opci&oacute;n</a>
                                            </div>
                    
                                        </div>
                                        
                                    <?php endforeach ?>                                    
                                <?php endif ?>


<!--------ATRIBUTOS ESPECIALES--------->

<!------------------RESPUESTA AJAX Y CODIGO QUE SE ESCONDE CUANDO EN EDIT----------------->   
 <?php if ($atributo->tipo_atributom=='Especiales'): ?>

   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="div_boton">
      <button id='boton_tipo_atributo_edit' class="btn btn-primary" type="button" onclick="opcionesaddm()"><span class="fa fa-plus">Agregar Opciones</button>
   </div>
<?php endif ?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
         <button id='boton_tipo_atributo' class="btn btn-primary" type="button" onclick="opcionesaddm()"><span class="fa fa-plus">Agregar Opciones</button>
</div>

<div id="gif_carga"></div>
<div style="margin-top: 60px;" id="tipo_atributo_ajax"></div>
<!------------------RESPUESTA AJAX Y CODIGO QUE SE ESCONDE CUANDO EN EDIT----------------->


								<div class="col-md-12 col-sm-12 col-xs-12">									
										<center><button class="btn btn-primary" type="submit">Editar Atributo</button></center>
								</div>	
							<?php echo form_close(); ?>	
						</div>
                 </div>

                  	
<!--CONTENIDO-->
                </div>
              </div>       
             </div>             
            </div>
          </div>  
</div>
        <!---------