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
                                    <th>Nombre de la Moneda</th>
                                    <th>Condici&oacute;n de la Moneda</th>
                                    <th>Casa Certificadora</th>
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
<?php $i=0; ?> <!--CODIGO QUE AUTOINCREMENTA EL ID POR UNO PARA EVITAR DUPLICADOS-->                                              
                                <?php if(!empty($monedas)):?>
                                    <?php foreach($monedas as $moneda):?>
                                        <tr>
<!--CONSULTAS-->
<?php 

include 'consultas_nombre.php';
/*VERIFICACION SI ESTA VACIA*/
if ( $valor_facial=='') {
    $valor_facial = 'N/A';
}

if ( $ano_acunacion=='') {
    $ano_acunacion = 'N/A';
}

if ( $ensayador=='') {
    $ensayador = 'N/A';
}

if ( $ceca=='') {
    $ceca = 'N/A';
}

if ( $gobernante=='') {
    $gobernante = 'N/A';
}
/*VERIFICACION SI ESTA VACIA*/

 ?>
<!--CONSULTAS-->                                                      
                                             <td>
                                                <a onmouseout="cerrar_popover(<?php echo $i; ?>)" onmouseover='popover_contenido(<?php echo $i; ?>,<?php echo $moneda->id_moneda; ?>)' id="popover_toggle_moneda_<?php echo $i; ?>" class='nombre_todo' onclick="datosusuariomonedas(<?php echo $moneda->id_moneda;?>)" value="<?php echo $moneda->id_usuario;?>" data-toggle="modal" data-trigger="hover" data-html="true" data-container="body" data-target="#modal-default" data-content="">

                                                    <?php echo $valor_facial .'&nbsp;&nbsp;'. $ano_acunacion .'&nbsp;&nbsp;'. $ensayador .'&nbsp;&nbsp;'. $ceca .'&nbsp;&nbsp;'. $gobernante ?>
                                                        
                                                </a>
                                            </td>

                                            <td><?php echo $moneda->condicion_moneda;?></td>
                                            <td><?php echo $moneda->casa_certificadora;?></td>
                                            <td>

                                               <button type="button" class="btn btn-info btn-view-moneda" data-toggle="modal" data-target="#modal-default" title="Información de la Moneda"  onclick="datosusuariom(<?php echo $moneda->id_moneda;?>)" value="<?php echo $moneda->id_moneda;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>   

                                               <button type="button" class="btn btn-warning btn-view-moneda-usuario" data-toggle="modal" data-target="#modal-default" title="Información del Usuario" onclick="datoscoleccionm(<?php echo $moneda->id_usuario;?>,<?php echo $moneda->id_coleccion_personal_moneda;?>)" value="<?php echo $moneda->id_coleccion_personal_moneda;?>">
                                                        <span class="fa fa-search"></span>
                                                 </button>                                            	                                             

                                               <a title="Eliminar Moneda" onclick="return confirm('Estás Seguro?')" href="<?php echo base_url();?>collectionm/delete/2/<?php echo $moneda->id_coleccion_personal_moneda;?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>                                      

                                            </td>
                                        </tr>
<?php $i++; ?> <!--CODIGO QUE AUTOINCREMENTA EL ID POR UNO PARA EVITAR DUPLICADOS-->                                       

                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>                  	
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