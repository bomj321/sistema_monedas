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
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

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
                    'placeholder'  => 'Contraseña',
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
                  <a href="#signup" class="to_register"> Crea una Cuenta </a>
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






        <div id="register" class="animate form registration_form">
          <section class="login_content">


<?php echo form_open('auth/register');  ?><!--FORMULARIO REGISTRO CIERRE Y APERTURA-->
  <h1>Crear una Cuenta</h1>
    <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger">
                  <p><?php echo $this->session->flashdata("error")?></p>
                </div>
    <?php endif; ?>


     <div>
                <?php 
                $usuario_registro = array(
                    'class'        => form_error("usuario_registro") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Nombre Completo',
                    'required'     =>  true,
                    'name'         => 'usuario_registro',
                    'value'        =>  set_value("usuario_registro")
                );

                echo form_input($usuario_registro);
                echo form_error("usuario_registro","<span class='pull-left label label-danger'>","</span>")        

              ?>
    </div>

    <div>
                <?php 
                $dni_usuario = array(
                    'class'        => form_error("dni_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese DNI',
                    'required'     =>  true,
                    'name'         => 'dni_usuario',
                    'value'        =>  set_value("dni_usuario"),
                    'type'         => 'password'
                );

                echo form_input($dni_usuario);
                echo form_error("dni_usuario","<span class='pull-left label label-danger'>","</span>")        

              ?>
    </div>

     <div>
                <?php 
                $nombre_usuario = array(
                    'class'        => form_error("nombre_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese Nombre de Usuario',
                    'required'     =>  true,
                    'name'         => 'nombre_usuario',
                    'value'        =>  set_value("nombre_usuario")
                );

                echo form_input($nombre_usuario);
                echo form_error("nombre_usuario","<span class='pull-left label label-danger'>","</span>")        

              ?>
    </div>
    

     <div>
                <?php 
                $email_usuario = array(
                    'class'        => form_error("email_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese Correo Electronico',
                    'required'     =>  true,
                    'name'         => 'email_usuario',
                    'value'        =>  set_value("email_usuario")
                );

                echo form_input($email_usuario);
                echo form_error("email_usuario","<span class='pull-left label label-danger'>","</span>")        

              ?>
    </div>
   

     <div style="margin-top: 45px;">
                 <?php 
                $boton = array(
                    'type'     => 'submit',       
                    'class'    => 'btn btn-default',
                    'content'  => 'Registrar'             
                );

              echo form_button($boton);

              ?>
      </div>

       <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Eres Miembro?
                  <a href="#signin" class="to_register"> Logueate </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
        </div>



 <?php echo form_close();?><!--FORMULARIO REGISTRO CIERRE Y APERTURA-->
          </section>
        </div>
       
      </div>
    </div>
  </body>
</html>
