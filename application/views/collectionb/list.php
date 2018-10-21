<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Control de la Colecci&oacute;n<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Colecci&oacute;n</h2>
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
                                    <th>ID del Billete</th>
                                    <th>Condici&oacute;n del Billete</th>
                                    <th>Casa Certificadora</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($billetes)):?>
                                    <?php foreach($billetes as $billete):?>
                                        <tr>
                                            <td><?php echo $billete->id_coleccion_personal_billete;?></td>
                                            <td><?php echo $billete->condicion_billete;?></td>
                                            <td><?php echo $billete->casa_certificadora;?></td>
                                            <td>

                                               <button type="button" class="btn btn-info btn-view-billete" data-toggle="modal" data-target="#modal-default" title="Información del Billete"  onclick="datosusuario(<?php echo $billete->id_billete;?>)" value="<?php echo $billete->id_billete;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>   

                                               <button type="button" class="btn btn-warning btn-view-billete-usuario" data-toggle="modal" data-target="#modal-default" title="Información Personal" onclick="datoscoleccion(<?php echo $billete->id_usuario;?>,<?php echo $billete->id_billete;?>)" value="<?php echo $billete->id_billete;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>                                            	                                             

                                               <!-- <a title="Editar Billete" href="<?php //echo base_url();?>billetes/edit/<?php //echo $billete->id_coleccion_personal_billete;?>" class="btn btn-success btn-check"><span class="fa fa-pencil"></span></a>              -->                                   

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