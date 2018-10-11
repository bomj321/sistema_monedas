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
					$this->index();
				}
				else{
					$data  = array(
						'id'                 => $res->id_usuario, 
						'nombre_persona'     => $res->nombre_persona,
						'nombre_usuario'     => $res->nombre_usuario,
						'tipo_usuario'       => $res->tipo_usuario,
						'dni_usuario'        => $res->dni_usuario,
						'membresia'          => $res->membresia,
						'login'              => TRUE
					);
					$this->session->set_userdata($data);
					redirect(base_url()."dashboard");
				}
			}else{

				$this->index();

			}	



	}

	public function add_user()
	{
		$usuario_registro    = $this->input->post("usuario_registro");
		$nombre_usuario      = $this->input->post("nombre_usuario");
		$dni_usuario         = $this->input->post("dni_usuario");
		$email_usuario       = $this->input->post("email_usuario");

		$this->form_validation->set_rules("usuario_registro","Nombre Persona","required");
		$this->form_validation->set_rules("nombre_usuario","Nombre Atributo","required|is_unique[usuarios.nombre_usuario]");
		$this->form_validation->set_rules("dni_usuario","Dni","required");
		$this->form_validation->set_rules("email_usuario","Email","required");

		if ($this->form_validation->run()) {
			$data = [
			    'nombre_persona' => $usuario_registro,
			    'nombre_usuario' => $nombre_usuario,
			    'dni_usuario'    => $dni_usuario,
			    'email_usuario'  => $email_usuario,
			    'tipo_usuario'   => '2',
			    'membresia'      => '0'
			];

			 if ($this->Usuarios_model->add_user($data)) {
			 	$this->session->set_flashdata("register_ok","Usuario Registrado");
			 	$this->index();
			 }else{
			 	$this->session->set_flashdata("error","No se pudo guardar la información");
			 	$this->register();
			 }

		}else {
			$this->register();
		}




	}




	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
