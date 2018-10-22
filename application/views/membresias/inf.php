<div class="right_col" role="main">
	   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Verificar Membres&iacute;a<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Membres&iacute;a 
                    <?php if ($membresia->tipo_usuario=='1' || $membresia->tipo_usuario=='3'): ?>
                            <?php if ($membresia->publicidad=='1'): ?>
                                <a  type="button" href="<?php echo base_url();?>membresias/publicidad/0" style="margin-left: 5px;" class="btn btn-warning"><span class="fa fa-plus"></span>Eliminar Publicidad</a>
                            <?php elseif($membresia->publicidad=='0'): ?>
                                <a  type="button" href="<?php echo base_url();?>membresias/publicidad/1" style="margin-left: 5px;" class="btn btn-primary"><span class="fa fa-plus"></span>Aceptar Publicidad</a>
                            <?php endif ?>    
                    <?php endif ?> 
                     <?php if($this->session->flashdata("error")):?>
                                <h4 style="color: red; font-weight: bold;"><?php echo $this->session->flashdata("error"); ?></h4>                              
                      <?php endif;?>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> <!--CONTENIDO-->
							 <p>Nombre del Usuario: <?php echo $membresia->nombre_persona ?></p> 
                             <p>DNI del Usuario<?php echo $membresia->dni_usuario ?></p>
                             <p>Email del Usuario: <?php echo $membresia->email_usuario ?></p>
                               <?php if ($membresia->tipo_usuario=='1'): ?>
                                     <p>Tipo de Membres&iacute;a: Sin L&iacute;mite</p>
                                <?php elseif($membresia->tipo_usuario=='2'): ?>
                                       <p>Tipo de Membres&iacute;a: Es Usuario Gratuito</p>
                                <?php elseif($membresia->tipo_usuario=='3'): ?>
                                      <p>Tipo de Membres&iacute;a: <?php echo $membresia->membresia_fin;?></p>
                                <?php endif ?>         	
                </div><!--CONTENIDO-->

             </div>       
          </div>             
        </div>
     </div>  
</div>
        <!---------