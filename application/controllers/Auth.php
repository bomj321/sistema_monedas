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
		

	

	public function login()
	{
			$usuario = $this->input->post("usuario");
			$contraseña = $this->input->post("contraseña");


			$this->form_validation->set_rules("usuario","Nombre del Usuario","required");
		    $this->form_validation->set_rules("contraseña","Contraseña","required");

		    if ($this->form_validation->run()) {

				$res = $this->Usuarios_model->login($usuario, $contraseña);

				if (!$res) {
					$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
					redirect(base_url());
				}
				else{
					$data  = array(
						'id'             => $res->id_usuario, 
						'nombre_persona'         => $res->nombre_persona,
						'nombre_usuario' => $res->nombre_usuario,
						'tipo_usuario'   => $res->tipo_usuario,
						'dni_usuario'            => $res->dni_usuario,
						'membresia'      => $res->membresia,
						'login'          => TRUE
					);
					$this->session->set_userdata($data);
					redirect(base_url()."dashboard");
				}
			}else{

				$this->index();

			}	



	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
