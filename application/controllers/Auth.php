<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}



	public function index()
	{
				if ($this->session->userdata("login")) {
					redirect(base_url()."dashboard");
				}
				else{					
		
					$this->load->view("login");
				}
	}

		public function register()
	{
				if ($this->session->userdata("login")) {
					redirect(base_url()."dashboard");
				}
				else{					
		
					$this->load->view("register");
				}
	} 
		

	

	public function login()
	{
			$usuario    = $this->input->post("usuario");
			$contraseña = $this->input->post("contraseña");


			$this->form_validation->set_rules("usuario","Nombre del Usuario","required");
		    $this->form_validation->set_rules("contraseña","Contraseña","required");

		    if ($this->form_validation->run()) {

				$res = $this->Usuarios_model->login($usuario, $contraseña);

				if (!$res) {
					$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
					redirect(base_url()."auth/index");
				}else{

        				/*IF PARA EL CORREO*/
								if ($res->verificacion_correo != 1) {
									$this->session->set_flashdata("error","Cuenta no Verificada, Revise su Correo");
									redirect(base_url()."auth/index");
								}else{
									$data  = array(
											'id'                 => $res->id_usuario, 
											'nombre_persona'     => $res->nombre_registro.' '.$res->apellidop_registro,
											'nombre_usuario'     => $res->nombre_usuario,
											'tipo_usuario'       => $res->tipo_usuario,
											'dni_usuario'        => $res->dni_usuario,
											'membresia'          => $res->membresia,
											'login'              => TRUE
										);
										$this->session->set_userdata($data);
										redirect(base_url()."dashboard");

								}

						/*IF PARA EL CORREO*/								
						}


			}else{

				$this->index();

			}	



	}

	public function add_user()
	{

		$captcha = $_POST['g-recaptcha-response'];
		$secret  = '6Lc5pJIUAAAAAPsYBHE9qzmDborD7qYxAf_ub9II';

		if(!$captcha){
			$this->session->set_flashdata("captcha-error","Error en el Captch");
			redirect(base_url()."auth/register");
		}else{
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			$arr = json_decode($response, TRUE);

			if($arr['success'])
			{
					/*CODIGO DEL REGISTRO*/
					$nombre_registro              = $this->input->post("nombre_registro");
					$apellidop_registro           = $this->input->post("apellidop_registro");
					$apellidom_registro           = $this->input->post("apellidom_registro");


					$fecha_nacimiento_registro    = $this->input->post("fecha_nacimiento_registro");
					$nacimiento_estado            = $this->input->post("nacimiento_estado");
					$residencia_estado            = $this->input->post("residencia_estado");



					$nombre_usuario               = $this->input->post("nombre_usuario");
					$dni_usuario                  = $this->input->post("dni_usuario");
					$email_usuario                = $this->input->post("email_usuario");
					$codigo_verificacion          = time();

					$this->form_validation->set_rules("nombre_registro","Primer Nombre","required");
					$this->form_validation->set_rules("apellidop_registro","Apellido Paterno","required");
					$this->form_validation->set_rules("apellidom_registro","Apellido Materno","required");

					$this->form_validation->set_rules("fecha_nacimiento_registro","Fecha de Nacimiento","required");
					$this->form_validation->set_rules("nacimiento_estado","Estado de Nacimiento","required");
					$this->form_validation->set_rules("residencia_estado","Residencia Actual","required");


					$this->form_validation->set_rules("nombre_usuario","Nombre de Usuario","required|is_unique[usuarios.nombre_usuario]");
					$this->form_validation->set_rules("dni_usuario","Dni","required|is_unique[usuarios.dni_usuario]");
					$this->form_validation->set_rules("email_usuario","Email","required|is_unique[usuarios.email_usuario]");

					if ($this->form_validation->run()) {
						$data = [
						    'nombre_registro'           => $nombre_registro,
						    'apellidop_registro'        => $apellidop_registro,
						    'apellidom_registro'        => $apellidom_registro,

						    'fecha_nacimiento_registro' => $fecha_nacimiento_registro,
						    'nacimiento_estado'         => $nacimiento_estado,
						    'residencia_estado'         => $residencia_estado,

						    'nombre_usuario'            => $nombre_usuario,
						    'dni_usuario'               => $dni_usuario,
						    'email_usuario'             => $email_usuario,
						    'tipo_usuario'              => '2',
						    'membresia'                 => '0',
						    'verificacion_correo'       => $codigo_verificacion
						];

																			

						 if ($this->Usuarios_model->add_user($data)) {
/**************************EMAIL***************************/
					$subject = "La moneda Mexicana. Verificación del Correo";
													$message = "
													<h2>Hola ".$nombre_registro .' '. $apellidop_registro .' '. $apellidom_registro .", </h2>
													<p>Para Poder Verificar tu correo sigue este <a href=".base_url().'auth/verificacion/'.$codigo_verificacion.">Link</a></p>
													";

													// Get full html:
													$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
													<html xmlns="http://www.w3.org/1999/xhtml">
													<head>
													    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
													    <title>' . html_escape($subject) . '</title>
													    <style type="text/css">
													        body {
													            font-family: Arial, Verdana, Helvetica, sans-serif;
													            font-size: 16px;
													        }
													    </style>
													</head>
													<body>
													' . $message . '
													</body>
													</html>';
													// Also, for getting full html you may use the following internal method:
													//$body = $this->email->full_html($subject, $message);

													$result = $this->email
													    ->from('jmob612@gmail.com')
													    ->reply_to('jmob612@gmail.com')    // Optional, an account where a human being reads.
													    ->to("$email_usuario")
													    ->subject($subject)
													    ->message($body)
													    ->send();													
/**************************EMAIL***************************/

						 	$this->session->set_flashdata("register_ok","Usuario Registrado");
						 	$this->index();
						 }else{
						 	$this->session->set_flashdata("error","No se pudo guardar la información");
						 	redirect(base_url()."auth/register");
						 }

					}else {
						$this->register();
					}	
					/*CODIGO DEL REGISTRO*/


			} else {
				$this->session->set_flashdata("captcha-error","Error en el Captch");
				redirect(base_url()."auth/index");				

			}




		}


	}

	public function verificacion($id_verificacion)
	{
			$data = array(
	        	'verificacion_correo' => '1',
	      	);
	       $res = $this->Usuarios_model->update_verificacion($data,$id_verificacion);
	       if ($res) {
	       	 $this->session->set_flashdata("register_ok","Cuenta Verificada");
		     redirect(base_url()."auth/login");	
	       }else{
	       	 $this->session->set_flashdata("error","Cuenta ya Verificada");
		     redirect(base_url()."auth/login");	
	       }
	      	

		
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
