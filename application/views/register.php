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
        <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

  <body class="login">
    <div>     

      <div class="login_wrapper">        
        <div  class="animate">
          <section class="login_content">


<?php echo form_open('auth/add_user');  ?><!--FORMULARIO REGISTRO CIERRE Y APERTURA-->
  <h1>Crear una Cuenta</h1>
    <?php if($this->session->flashdata("error")):?>
                <div class="alert alert-danger">
                  <p><?php echo $this->session->flashdata("error")?></p>
                </div>
    <?php endif; ?>

     <?php if($this->session->flashdata("captcha-error")):?>
                <div class="alert alert-success">
                  <p><?php echo $this->session->flashdata("captcha-error")?>a</p>
                </div>
    <?php endif; ?>


     <div>
                <?php 
                $nombres_registro = array(
                    'class'        => form_error("nombres_registro") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Nombres',
                   // 'required'     =>  true,
                    'name'         => 'nombres_registro',
                    'value'        =>  set_value("nombres_registro"),
                    'autocomplete' => true
                );

                echo form_input($nombres_registro);
                echo form_error("nombres_registro","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>


     <div>
                <?php 
                $apellidop_registro = array(
                    'class'        => form_error("apellidop_registro") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Apellido Paterno',
                   // 'required'     =>  true,
                    'name'         => 'apellidop_registro',
                    'value'        =>  set_value("apellidop_registro"),
                    'autocomplete' => true
                );

                echo form_input($apellidop_registro);
                echo form_error("apellidop_registro","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>


     <div>
                <?php 
                $apellidom_registro = array(
                    'class'        => form_error("apellidom_registro") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Apellido Materno',
                   // 'required'     =>  true,
                    'name'         => 'apellidom_registro',
                    'value'        =>  set_value("apellidom_registro"),
                    'autocomplete' => true
                );

                echo form_input($apellidom_registro);
                echo form_error("apellidom_registro","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>

      <div>
         <label for="fecha_nacimiento_registro" class="pull-left"> Ingrese año de Nacimiento</label> 
                <?php 
                $fecha_nacimiento_registro = array(
                    'class'        => form_error("fecha_nacimiento_registro") != false ? "parsley-error form-control":"form-control ",
                   // 'required'     =>  true,
                    'name'         => 'fecha_nacimiento_registro',
                    'value'        =>  set_value("fecha_nacimiento_registro"),
                    'type'         => 'date'
                );

                echo form_input($fecha_nacimiento_registro);
                echo form_error("fecha_nacimiento_registro","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>



     <div>
        <select name="nacimiento_estado" class=" <?php echo form_error("nacimiento_estado") != false ? "parsley-error form-control":"form-control " ?> ">
          <option selected>Estado de Nacimiento</option>
                <?php require('options_select.php') ?>
        </select>

        <?php 
          echo form_error("nacimiento_estado","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>") 
         ?>

    </div>

      <div>
        <select name="residencia_estado" class=" <?php echo form_error("residencia_estado") != false ? "parsley-error form-control":"form-control " ?> ">
                <option selected>Estado de Residencia</option>
                <?php require('options_select.php') ?>

        </select>

        <?php 
          echo form_error("residencia_estado","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>") 
         ?>

    </div>



    <div>
                <?php 
                $nombre_usuario = array(
                    'class'        => form_error("nombre_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese Nombre de Usuario',
                    //'required'     =>  true,
                    'name'         => 'nombre_usuario',
                    'value'        =>  set_value("nombre_usuario"),
                    'autocomplete' => true
                );

                echo form_input($nombre_usuario);
                echo form_error("nombre_usuario","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>

    <div>
                <?php 
                $dni_usuario = array(
                    'class'        => form_error("dni_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese DNI',
                   // 'required'     =>  true,
                    'name'         => 'dni_usuario',
                    'value'        =>  set_value("dni_usuario"),
                    'type'         => 'password',
                    'autocomplete' => true
                );

                echo form_input($dni_usuario);
                echo form_error("dni_usuario","<span style='margin-bottom: 10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>    
    

     <div>
                <?php 
                $email_usuario = array(
                    'class'        => form_error("email_usuario") != false ? "parsley-error form-control":"form-control ",
                    'placeholder'  => 'Ingrese Correo Electronico',
                   // 'required'     =>  true,
                    'name'         => 'email_usuario',
                    'value'        =>  set_value("email_usuario"),
                    'autocomplete' => true
                );

                echo form_input($email_usuario);
                echo form_error("email_usuario","<span style='margin-top: -10px;' class='pull-left label label-danger'>","</span>")        

              ?>
    </div>

     <div style='margin-top: 20px;' class="g-recaptcha" data-sitekey="6LfICpIUAAAAAAdW5MJZIggTPAW-OlIzNZnO28qy"></div>

   

     <div style="margin-top: 40px;">
                 <?php 
                $boton = array(
                    'type'     => 'submit',       
                    'class'    => 'btn btn-default boton_registro',
                    'content'  => 'Registrar',
                );

              echo form_button($boton);

              ?>
      </div>
     
       <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Eres Miembro?
                  <a href="<?php echo base_url(); ?>auth/login" class="to_register"> Logueate </a>
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
