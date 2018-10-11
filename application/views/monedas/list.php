<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Control de Monedas<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                     <h2>Monedas
                        <?php if($this->session->userdata("tipo_usuario")==1 ):?>   
                          <a  type="button" href="<?php echo base_url();?>monedas/add" style="margin-left: 5px;" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar</a>
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
                                    <th>ID de la Moneda</th>
                                    <th>Usuario que la Registro</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarios)):?>
                                    <?php foreach($usuarios as $usuario):?>
                                        <tr>
                                            <td><?php echo $usuario->id_catalogo_moneda;?></td>
                                            <td><?php echo $usuario->usuario;?></td>
                                            <td>
                                            	 <button type="button" class="btn btn-info btn-view-usuario" data-toggle="modal" data-target="#modal-default" class="btn btn-info btn-view" onclick="datosusuariomonedas(<?php echo $usuario->id_catalogo_moneda;?>)" value="<?php echo $usuario->id_catalogo_moneda;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                              <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                                                <a title="Editar Billete" href="<?php echo base_url();?>monedas/edit/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-success btn-check"><span class="fa fa-pencil"></span></a> 
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
        <h4 class="modal-title">Informacion de la Moneda</h4>
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