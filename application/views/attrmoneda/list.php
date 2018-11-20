<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Verificar Atributos<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Atributos <a  type="button" href="<?php echo base_url();?>attrmoneda/add" style="margin-left: 5px;" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar</a>
                         <?php if($this->session->flashdata("error")):?>
                                <h4 style="color: red; font-weight: bold;"><?php echo $this->session->flashdata("error"); ?></h4>                              
                         <?php endif;?>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                    <div class="row" id="botones_categorias">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Información_general" style='font-size: 15px; width: 100%;' class="btn btn-primary">Información general</a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Datos_Técnicos" style='font-size: 15px; width: 100%;' class="btn btn-success">Datos Técnicos</a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Anverso" style='font-size: 15px; width: 100%;' class="btn btn-info">Anverso</a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Reverso" style='font-size: 15px; width: 100%;' class="btn btn-warning">Reverso</a>
                        </div>


                    </div>

                     <div class="row" id="botones_categorias">                      

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Canto" style='font-size: 15px; width: 100%;' class="btn btn-danger">Canto</a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Variedades" style='font-size: 15px; width: 100%;' class="btn btn-success">Variedades</a>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Información_adicional" style='font-size: 15px; width: 100%;' class="btn btn-info">Información adicional</a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <a href="<?php echo base_url();?>attrmoneda/list/Catalogos" style='font-size: 15px; width: 100%;' class="btn btn-warning">Catalogos</a>
                        </div>
                    </div>


                  <div class="x_content"> <!--CONTENIDO-->
							         <table id="list_attrm" class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre del Atributo</th>
                                    <th>Descripci&oacute;n del Atributo</th>
                                    <th>Categor&iacute;a del Atributo</th>
                                    <th>Tipo del Atributo</th>
                                    <th>Orden</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($monedas)):?>
                                    <?php foreach($monedas as $moneda):?>
                                        <tr>
                                            <td><?php echo $moneda->nombre_atributo;?></td>
                                            <td><?php echo $moneda->descripcion_atributo;?></td>
                                            <?php 
                                              $separado_categoria = str_replace("_"," ", $moneda->categoria_atributom);
                                             ?>
                                             <td><?php echo $separado_categoria;?></td>
                                            <td><?php echo $moneda->tipo_atributom;?></td>
                                            <td><?php echo $moneda->orden;?></td>
                                            <td>
                                            	<?php if ($moneda->estado=='1'): ?>
                                            		<a title="bloquear atributo" href="<?php echo base_url();?>attrmoneda/update/<?php echo $moneda->id_atributo_m;?>/0/<?php echo $moneda->categoria_atributom;?>" class="btn btn-warning btn-remove"><span class="fa fa-remove"></span></a>
                                            	<?php else: ?>
                                            	<a title="Desbloquear atributo" href="<?php echo base_url();?>attrmoneda/update/<?php echo $moneda->id_atributo_m;?>/1/<?php echo $moneda->categoria_atributom;?>" class="btn btn-success btn-check"><span class="fa fa-check"></span></a>	                                            		
                                            	<?php endif ?>
                                              <a title="Editar Atributo" href="<?php echo base_url();?>attrmoneda/edit/<?php echo $moneda->id_atributo_m;?>" class="btn btn-success btn-check"><span class="fa fa-pencil"></span></a> 

                                               <a title="Eliminar Atributo" href="<?php echo base_url();?>attrmoneda/delete/<?php echo $moneda->id_atributo_m;?>/<?php echo $moneda->categoria_atributom;?>" class="btn btn-danger "><span class="fa fa-trash-o"></span></a>


                                               <?php if ( $valor_maximo->orden_max != $moneda->orden): ?>
                                                     <a title="Subir Atributo" href="<?php echo base_url();?>attrmoneda/up_order/<?php echo $moneda->id_atributo_m;?>/<?php echo $moneda->orden;?>/<?php echo $moneda->categoria_atributom;?>" class="btn btn-danger "><span class="fa fa-sort-down"></span></a> 
                                                <?php endif ?> 

                                               
                                                <?php if ( $valor_minimo->orden_min != $moneda->orden): ?>
                                                    <a title="Bajar Atributo" href="<?php echo base_url();?>attrmoneda/down_order/<?php echo $moneda->id_atributo_m;?>/<?php echo $moneda->orden;?>/<?php echo $moneda->categoria_atributom;?>" class="btn btn-success "><span class="fa fa-sort-up"></span></a>
                                                <?php endif ?>    
                                                    
                                                    
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>                  	
                </div><!--CONTENIDO-->

             </div>       
          </div>             
        </div>
     </div>  
</div>
        <!---------