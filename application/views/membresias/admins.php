<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Administradores<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Administradores
                    <?php if($this->session->userdata("tipo_usuario")==1 ):?>   
                          <a  type="button" href="<?php echo base_url();?>membresias/add_admin" style="margin-left: 5px;" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar</a>
                       <?php endif; ?>
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
                                    <th>Estado</th>
                                    <th>Fecha De Termino</th> 
                                    <th>Acciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($administradores)):?>
                                    <?php foreach($administradores as $administrador):?>
                                        <tr>
                                            <td><?php echo $administrador->nombre_usuario;?></td>
                                            <td><?php echo $administrador->email_usuario;?></td>
                                            <td>
                                                  <?php if ($administrador->tipo_usuario=='1'): ?>
                                                     <button style="width: 100%" class="btn btn-success">Administrador</button>
                                                    <?php elseif($administrador->tipo_usuario=='2'): ?>
                                                      <button style="width: 100%" class="btn btn-warning">Gratuito</button>
                                                    <?php elseif($administrador->tipo_usuario=='3'): ?>
                                                      <button style="width: 100%" class="btn btn-warning">Usuario Pago</button>
                                                <?php endif ?>
                                                    
                                                </td>
                                            <td>Sin L&iacute;mite</td>       
                                            <td>
                                               <a title="Eliminar Administrador" onclick="return confirm('Estas Seguro?')" href="<?php echo base_url();?>monedas/delete/2/<?php echo $administrador->id_usuario;?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>

                                               <a title="Ver Información" href="<?php echo base_url();?>monedas/edit/<?php echo $administrador->id_usuario;?>" class="btn btn-primary "><span class="fa fa-eye"></span></a> 
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