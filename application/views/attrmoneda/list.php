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
                  <div class="x_content"> <!--CONTENIDO-->
							         <table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre del Atributo</th>
                                    <th>Descripci&oacute;n del Atributo</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($monedas)):?>
                                    <?php foreach($monedas as $moneda):?>
                                        <tr>
                                            <td><?php echo $moneda->nombre_atributo;?></td>
                                            <td><?php echo $moneda->descripcion_atributo;?></td>
                                            <td>
                                            	<?php if ($moneda->estado=='1'): ?>
                                            		<a title="bloquear atributo" href="<?php echo base_url();?>attrmoneda/update/<?php echo $moneda->id_atributo_m;?>/0" class="btn btn-warning btn-remove"><span class="fa fa-remove"></span></a>
                                            	<?php else: ?>
                                            	<a title="Desbloquear atributo" href="<?php echo base_url();?>attrmoneda/update/<?php echo $moneda->id_atributo_m;?>/1" class="btn btn-success btn-check"><span class="fa fa-check"></span></a>	                                            		
                                            	<?php endif ?>
                                              <a title="Editar Atributo" href="<?php echo base_url();?>attrmoneda/edit/<?php echo $moneda->id_atributo_m;?>" class="btn btn-success btn-check"><span class="fa fa-pencil"></span></a> 

                                               <a title="Eliminar Atributo" href="<?php echo base_url();?>attrmoneda/delete/<?php echo $moneda->id_atributo_m;?>" class="btn btn-danger "><span class="fa fa-trash-o"></span></a>   
                                                    
                                                    
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