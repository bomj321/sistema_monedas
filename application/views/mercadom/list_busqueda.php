<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Busqueda de Monedas<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monedas</h2>
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
                                <?php if(!empty($monedas_mercado_busco)):?>
                                    <?php foreach($monedas_mercado_busco as $moneda_mercado_busco):?>
                                        <tr>
                                            <td><?php echo $moneda_mercado_busco->nombreusuario;?></td>
                                            <td><?php echo $moneda_mercado_busco->emailusuario;?></td>
                                            <td>

                                               <button type="button" class="btn btn-info btn-view-moneda" data-toggle="modal" data-target="#modal-default" title="Información General de la Moneda"  onclick="datosusuariom(<?php echo $moneda_mercado_busco->id_moneda;?>)" value="<?php echo $moneda_mercado_busco->id_moneda;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>


                                            	 <button type="button" class="btn btn-warning btn-view-usuario" data-toggle="modal" data-target="#modal-default"  title="Información del Usuario" onclick="datoscoleccionmercadom(<?php echo $moneda_mercado_busco->id_coleccion_personal_moneda;?>)" value="<?php echo $moneda_mercado_busco->id_coleccion_personal_moneda;?>">
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
        <h4 class="modal-title">Informacion del Moneda</h4>
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