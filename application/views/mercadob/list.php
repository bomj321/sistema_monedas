<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mercado de Billetes<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Billetes</h2>
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
                                    <th>Usuario que la Registro</th>
                                    <th>Contacto</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($billetes_mercado)):?>
                                    <?php foreach($billetes_mercado as $billete_mercado):?>
                                        <tr>
                                            <td><?php echo $billete_mercado->nombreusuario;?></td>
                                            <td><?php echo $billete_mercado->emailusuario;?></td>
                                            <td>

                                               <button type="button" class="btn btn-info btn-view-billete" data-toggle="modal" data-target="#modal-default" title="Información General del Billete"  onclick="datosusuario(<?php echo $billete_mercado->id_billete;?>)" value="<?php echo $billete_mercado->id_billete;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>


                                            	 <button type="button" class="btn btn-warning btn-view-usuario" data-toggle="modal" data-target="#modal-default"  title="Información del Usuario" onclick="datoscoleccionmercado(<?php echo $billete_mercado->id_coleccion_personal_billete;?>)" value="<?php echo $billete_mercado->id_coleccion_personal_billete;?>">
                                                        <span class="fa fa-search"></span>
                                               </button>                                            

                                                    

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
        <h4 class="modal-title">Informacion del Billete</h4>
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