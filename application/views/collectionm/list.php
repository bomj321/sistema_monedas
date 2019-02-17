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
							        

                            <div>

                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#coleccion_personal" aria-controls="coleccion_personal" role="tab" data-toggle="tab">Mi colecci&oacute;n</a></li>
                                <li role="presentation"><a href="#intercambios_ventas" aria-controls="intercambios_ventas" role="tab" data-toggle="tab">Intercambios/Ventas</a></li>
                                <li role="presentation"><a href="#busco" aria-controls="busco" role="tab" data-toggle="tab">Busco</a></li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="coleccion_personal">
                                  <?php require_once('tabs_personal.php') ?>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="intercambios_ventas">
                                   <?php require_once('tabs_ventas.php') ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="busco">
                                   <?php require_once('tabs_busco.php') ?>
                                </div>
                              </div>

                            </div>


                </div><!--CONTENIDO-->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
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