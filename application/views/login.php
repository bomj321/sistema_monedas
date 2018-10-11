<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>public/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>public/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

    <?php echo form_open('auth/login');  ?><!--FORMULARIO CIERRE Y APERTURA-->

              <h1>Inicio de Sesi&oacute;n</h1>
	              <?php if($this->session->flashdata("error")):?>
	              <div class="alert alert-danger">
	                <p><?php echo $this->session->flashdata("error")?></p>
	              </div>
	            <?php endif; ?>

               <?php if($this->session->flashdata("register_ok")):?>
                <div class="alert alert-success">
                  <p><?php echo $this->session->flashdata("register_ok")?></p>
                </div>
              <?php endif; ?>

              <div>
                <?php 
                $usuario = array(
                    'class'        => form_error("usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Nombre de Usuario',
                    'name'         => 'usuario',
                    'value'        =>  set_value("usuario")
                );

                echo form_input($usuario);
                echo form_error("usuario","<span class='pull-left label label-danger'>","</span>")        

              ?>
              </div>



              <div style="margin-top: 40px;">
                 <?php 
                $contraseña = array(
                    'class'        => form_error("contraseña") != false ? "parsley-error form-control":" form-control",
                    'placeholder'  => 'Cedula de Identidad',
                    'name'         => 'contraseña',

                );

            echo form_password($contraseña);
            echo form_error("contraseña","<span class=' pull-left label label-danger'>","</span>");

              ?>
              </div>


              <div style="margin-top: 45px;">
                 <?php 
                $boton = array(
                    'type'     => 'submit',       
                    'class'    => 'btn btn-default',
                    'content'  => 'Iniciar Sesión'             
                );

              echo form_button($boton);

              ?>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Nuevo en el Sitio?
                  <a href="<?php echo base_url(); ?>auth/register" class="to_register"> Crea una Cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />


                <div >
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
    <?php echo form_close();?><!--FORMULARIO CIERRE Y APERTURA-->
          </section>
        </div>
 
      </div>
    </div>
  </body>
</html>
