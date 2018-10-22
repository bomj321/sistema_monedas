<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Sugerencias<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sugerencias <a  type="button" href="<?php echo base_url();?>sugerencias/add" style="margin-left: 5px;" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar</a>
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
                                    <th>Nombre del Usuario</th>
                                    <th>Correo del Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($sugerencias)):?>
                                    <?php foreach($sugerencias as $sugerencia):?>
                                        <tr>
                                            <td><?php echo $sugerencia->nombreusuario;?></td>
                                            <td><?php echo $sugerencia->emailusuario;?></td>
                                            <td><?php echo $sugerencia->fecha_enviado;?></td>
                                            <td>

                                                <?php if ($sugerencia->estado=='0'): ?>
                                                        <button type="button" class='btn btn-warning'>
                                                            No Visto
                                                        </button>

                                                    <?php else: ?>
                                                     <button type="button" class='btn btn-success'>
                                                             Visto
                                                        </button>                                                       
                                                <?php endif ?>

                                            </td>

                                            <td>
                                            		<button type="button" class="btn btn-info btn-view-sugerencia" data-toggle="modal" data-target="#modal-default" title="Información del Sugerencia"  onclick="datosugerencia(<?php echo $sugerencia->id_sugerencia;?>)" value="<?php echo $sugerencia->id_sugerencia;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                            <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                                                 <?php if ($sugerencia->estado=='0'): ?>
                                                     <a title="No lo he Visto" href="<?php echo base_url();?>sugerencias/update/<?php echo $sugerencia->id_sugerencia;?>/<?php echo $sugerencia->estado;?>" class="btn btn-warning"><span class="fa fa-check"></span></a>
                                                 <?php else: ?> 
                                                         <a title="Ya lo ví" class="btn btn-success"><span class="fa fa-check"></span></a>                                                     
                                                <?php endif ?>   

                                            <?php endif; ?>     
                                            </td>

                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>                  	
                </div><!--CONTENIDO-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>                

             </div>       
          </div>             
        </div>
     </div>  
</div>
        <!---------