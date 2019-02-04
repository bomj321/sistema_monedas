<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Catalogo de Monedas<!--<small>Todos los clientes</small>--></h3>
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
                          <div class="row" style="margin-bottom: 10px;"> 
                                <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <!--VERIFICAR SI EXISTE LA VARIABLE-->
                                                <?php 
                                                    if (isset($id_filtro) AND !empty($id_filtro)) {
                                                        $id_filtro = $id_filtro;
                                                    }else{
                                                        $id_filtro = '';
                                                    }
                                                 ?>
                                                <!--VERIFICAR SI EXISTE LA VARIABLE-->
                                                    <select onchange='opciones_moneda()' name='filtro_moneda' class="form-control" id="filtro_moneda">
                                                      <option>Seleccione una Opci&oacute;n</option>
                                                      <?php foreach ($atributos as $atributo): 
                                                            /*CONVERTIR GUION BAJO A ESPACIO*/
                                                                $nombreatributo = str_replace("_", " ", $atributo->categoria_atributom);
                                                            /*CONVERTIR GUION BAJO A ESPACIO*/
                                                        ?>
                                                        <option style='font-weight: 900;' disabled>Sección <?php echo $nombreatributo ?></option>
                                                <!--SUB CONSULTA-->
                                                    <?php 
                                                         $sql ="SELECT * FROM atributos_m WHERE categoria_atributom = '$atributo->categoria_atributom' AND tipo_atributom != 'Fotos' GROUP BY id_atributo_m";
                                                         $query = $this->db->query($sql);
                                                     ?>

                                                     <?php if ($query->num_rows() > 0): ?>
                                                        <?php foreach ($query->result() as $row): ?>
                                                            <option  <?php echo $id_filtro == $row->id_atributo_m ? 'selected' : '' ?> value="<?php echo $row->id_atributo_m;?>"><?php echo $row->nombre_atributo;?></option>
                                                        <?php endforeach ?>                                                         
                                                     <?php endif ?>
                                              
                                                <!--SUB CONSULTA-->                                                        
                                                            
                                                      <?php endforeach ?>
                                                      
                                                     
                                                   </select>
                                            </div>
                                </div>
<!--RESPUESTA AJAX-->
                                <div class="col-md-5 col-sm-12" id="respuesta_ajax_filtros_monedas">
                                        <?php if (isset($id_filtro) AND !empty($id_filtro)): ?>
                                            <form action="<?php echo base_url();?>monedas/list" method='POST'>
                                                <div class="col-md-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input name="id_filtro" type="hidden" value="<?php echo $id_filtro;?>">
                                                    <div class="form-group">
                                                        <select class='form-control' name="filtros" id="filtros">
                                                            <?php foreach ($opciones_atributo as $opcion_atributo): ?>
                                                                <option  <?php echo $filtros == $opcion_atributo->atributo_moneda ? 'selected' : '' ?> value="<?php echo $opcion_atributo->atributo_moneda;?>"><?php echo $opcion_atributo->atributo_moneda;?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                                    </div>
                                                </div>                                            
                                            </form>                                        
                                        <?php endif ?>
                                     
                                </div>
<!--RESPUESTA AJAX-->
                                 <div class="col-md-3 col-sm-12">                                   
                                        <a href="<?php echo base_url();?>monedas/list" class='btn btn-success pull-left'>Refrescar Registros</a>
                                            
                                </div>
                                    
                           </div>

						<table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Usuario que la Registro</th>
                                    <th>Nombre de la Moneda</th>                                   
                                    <th>Opciones</th>                                   
                                </tr>
                            </thead>
                            <tbody>
<?php $i=0; ?> <!--CODIGO QUE AUTOINCREMENTA EL ID POR UNO PARA EVITAR DUPLICADOS-->                               
                                <?php if(!empty($usuarios)):?>
                                    <?php foreach($usuarios as $usuario):?>
                                        <tr>
                                            <td><?php echo $usuario->usuario;?></td>

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
                                                <a onmouseout='popover_destroy()' onmouseover='popover_contenido(<?php echo $i; ?>,<?php echo $usuario->id_catalogo_moneda; ?>)' id="popover_toggle_moneda_<?php echo $i; ?>"  data-trigger="hover" data-html="true" data-container="body" data-target="#modal-default" data-content="" class='nombre_todo popover_all' onclick="datosusuariomonedas(<?php echo $usuario->id_catalogo_moneda;?>)" value="<?php echo $usuario->id_catalogo_moneda;?>" data-toggle="modal">

                                                    <?php echo $valor_facial .'&nbsp;&nbsp;'. $ano_acunacion .'&nbsp;&nbsp;'. $ensayador .'&nbsp;&nbsp;'. $ceca .'&nbsp;&nbsp;'. $gobernante ?>
                                                        
                                                </a>
                                            </td>

                                            <td>                                            

                                              <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                                                 <a title="Editar Moneda" href="<?php echo base_url();?>monedas/edit/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-success btn-check"><span class="fa fa-pencil"></span></a> 
                                              <?php endif; ?> 



                                                <?php if ($usuario->estado=='1'): ?>
                                                    <a title="Deshabilitar Moneda" href="<?php echo base_url();?>monedas/deshabilitar/0/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-warning"><span class="fa fa-remove"></span></a> 
                                              <?php else: ?>
                                                  <a title="Habilitar Moneda" href="<?php echo base_url();?>monedas/deshabilitar/1/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-success"><span class="fa fa-check"></span></a>                                                   
                                              <?php endif ?>  


                                              <?php if($this->session->userdata("tipo_usuario")==1 ):?>
                                                  <a title="Eliminar Moneda" onclick="return confirm('Estas Seguro?')" href="<?php echo base_url();?>monedas/delete/2/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a> 
                                               <?php endif; ?> 
                                              
                                              <a onclick="datoscoleccion(<?php echo $usuario->id_catalogo_moneda;?>)" class="btn btn-success" data-toggle="modal" data-target="#modal_add"><span class="fa fa-plus"></span></a>

                                              <!-- <a title="Agregar a Colección" href="<?php echo base_url();?>collectionm/add_collection/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-success"><span class="fa fa-plus"></span></a> -->

                                               <a title="Sugerir Cambios" href="<?php echo base_url();?>monedas/sugerir/<?php echo $usuario->id_catalogo_moneda;?>" class="btn btn-primary btn-check"><span class="fa fa-plus-circle"></span></a>              

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
        <h4 class="modal-title">Informacion de la Moneda</h4>
      </div>
      <div class="modal-body">

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once('modal_coleccion.php') ?>

             </div>       
          </div>             
        </div>
     </div>  
</div>

        <!---------