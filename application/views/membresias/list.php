<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Membres&iacute;as<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Membres&iacute;as</h2>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($membresias)):?>
                                    <?php foreach($membresias as $membresia):?>
                                        <tr>
                                            <td><?php echo $membresia->nombre_usuario;?></td>
                                            <td><?php echo $membresia->email_usuario;?></td>
                                            <td>
                                                  <?php if ($membresia->tipo_usuario=='1'): ?>
                                                     <button style="width: 100%" class="btn btn-success">Administrador</button>
                                                    <?php elseif($membresia->tipo_usuario=='2'): ?>
                                                      <button style="width: 100%" class="btn btn-warning">Gratuito</button>
                                                    <?php elseif($membresia->tipo_usuario=='3'): ?>
                                                      <button style="width: 100%" class="btn btn-warning">Usuario Pago</button>
                                                <?php endif ?>
                                                    
                                                </td>
                                            <td>

                                                <?php if ($membresia->tipo_usuario=='1'): ?>
                                                     Sin L&iacute;mite
                                                    <?php elseif($membresia->tipo_usuario=='2'): ?>
                                                       Es Usuario Gratuito
                                                    <?php elseif($membresia->tipo_usuario=='3'): ?>
                                                      <?php echo $membresia->membresia_fin;?>
                                                <?php endif ?>
                                               

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