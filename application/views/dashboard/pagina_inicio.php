<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Datos de mi Colecci&oacute;n<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>
            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                 
<!--CONTENIDO-->

                  <div class="x_content">                 	<!--CONSULTA SQL-->                 

                    <div class="row"> 
                            
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                   <center> <h1><em>Mi Colecci&oacute;n</em></h1></center>
                                </div>
                    </div>


                     <div class="row"> 
                            
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                   <button class="btn btn-default btn-lg" style="width: 100%"><?php echo $monedas_totales ?> Moneda(s)</button>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                   <button class="btn btn-primary btn-lg" style="width: 100%"><?php echo $monedas_intercambio ?> Moneda(s) para Intercambio</button>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                   <button class="btn btn-success btn-lg" style="width: 100%"><?php echo $monedas_venta ?> Moneda(s) para Venta</button>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                   <button class="btn btn-info btn-lg" style="width: 100%"><?php echo $monedas_personales ?> Moneda(s) Personales</button>
                                </div>
                              
                    </div>


<!--SECCION DEL MAPA-->                    

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <?php include 'mapa.php'; ?>
                        </div>
                    </div>

<!--SECCION DEL MAPA-->



<!--SECCION DE LA GRAFICA-->    
<!--SACAR AÑO ACTUAL-->
<?php 
$año_actual = date('Y');
 ?>
<!--SACAR AÑO ACTUAL-->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">
                            <select class="form-control" name="ano_proyecto" id="ano_proyecto">
                                  <option <?php echo '2018' == $año_actual ? 'selected':'';?> value="2018">2018</option>
                                  <option <?php echo '2019' == $año_actual ? 'selected':'';?> value="2019">2019</option>
                                  <option <?php echo '2020' == $año_actual ? 'selected':'';?> value="2020">2020</option>
                                  <option <?php echo '2021' == $año_actual ? 'selected':'';?> value="2021">2021</option>
                                  <option <?php echo '2022' == $año_actual ? 'selected':'';?> value="2022">2022</option>
                                  <option <?php echo '2023' == $año_actual ? 'selected':'';?> value="2023">2023</option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 myChart" id="respuesta">
                                <canvas id="myChart" width="400" height="200"></canvas>  
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sin_registros">
                             <center><h3>Sin Registros</h3></center>
                       </div>

                    </div>
<!--SECCION DE LA GRAFICA-->                   

 

                  	
                </div>
<!--CONTENIDO-->
   
              </div>       
             </div>             
            </div>
          </div>  
</div>
        <!---------