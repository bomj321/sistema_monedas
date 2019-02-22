<div class="contenido">

			<div class="row" style="margin-bottom: 20px; margin-top: 100px;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div_titulo_productos_importantes">
						<center><h1 id="titulo_productos_importantes"><?php echo $configuracion->titulo_producto ?></h1></center>

				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 div_titulo_productos_importantes">
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
			                                                         $sql ="SELECT * FROM atributos_m WHERE categoria_atributom = '$atributo->categoria_atributom' AND tipo_atributom != 'Fotos' GROUP BY id_atributo_m ORDER BY orden DESC";
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
			                <div class="col-md-5 col-sm-12" id="respuesta_ajax_filtros_monedas" style="margin-top: -10px;">

			  						<?php if (isset($id_filtro) AND !empty($id_filtro)): ?>
			                                	<form action="<?php echo base_url();?>tienda/index" method='POST' class="form-inline">  
													  <div class="form-group">
													  	 <input name="id_filtro" type="hidden" value="<?php echo $id_filtro;?>">
													     <select class='form-control' name="filtros" id="filtros" style="width: 300px;">
													        <?php foreach ($opciones_atributo as $opcion_atributo): ?>
													            <option  <?php echo $filtros == $opcion_atributo->atributo_moneda ? 'selected' : '' ?> value="<?php echo $opcion_atributo->atributo_moneda;?>"><?php echo $opcion_atributo->atributo_moneda;?></option>
													        <?php endforeach ?>
													       </select>
													  </div>
													  <button class="btn btn-primary" type="submit">Buscar</button>
												</form>
			                         <?php endif ?>


			                                     
			                                     
			                </div>
			<!--RESPUESTA AJAX-->
			             <div class="col-md-3 col-sm-12">                                   
			                    <a href="<?php echo base_url();?>tienda" class='btn btn-success pull-left'>Refrescar Registros</a>
			                        
			            </div>

			</div>

<div class="row">	

	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre de la Moneda</th>                                   
                                </tr>
                            </thead>

					          <tbody>
										<?php $i=0; ?> <!--CODIGO QUE AUTOINCREMENTA EL ID POR UNO PARA EVITAR DUPLICADOS-->                               
			                                <?php if(!empty($usuarios)):?>
			                                    <?php foreach($usuarios as $usuario):?>
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
					                                                <a onclick="datosusuariomonedas(<?php echo $usuario->id_catalogo_moneda;?>)" data-toggle="modal" data-target="#modal-default">

					                                                    <?php echo $valor_facial .'&nbsp;&nbsp;'. $ano_acunacion .'&nbsp;&nbsp;'. $ensayador .'&nbsp;&nbsp;'. $ceca .'&nbsp;&nbsp;'. $gobernante ?>
					                                                        
					                                                </a>
					                                            </td>
					                                          
					                                        </tr>
					<?php $i++; ?> <!--CODIGO QUE AUTOINCREMENTA EL ID POR UNO PARA EVITAR DUPLICADOS-->                                       
					                                    <?php endforeach;?>
					                                <?php endif;?>
					                            </tbody>
					                        </table>    
    </div> 

    			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">    		
    					<center><h4><?php echo $configuracion->titulo_tabla ?></h4></center>

    					<p><?php echo $configuracion->contenido_tabla ?></p>
    			</div>

                         
</div>

</div>

<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-default">Informacion de la Moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

