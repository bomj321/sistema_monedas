<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membresias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Membresias_model");
	}

	public function list()
	{
		$data = [
		    'membresias' => $this->Membresias_model->list()
		];

		$this->layout->view("list",$data);

	}

public function inf()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'membresia' => $this->Membresias_model->get_membresia($id_usuario_session)
		];

		$this->layout->view("inf",$data);

	}



	public function publicidad($estado_publicidad)
	{
		$id_usuario_session = $this->session->userdata("id");
		$publicidad         = $estado_publicidad;
		$data = [
		    'publicidad'   => $publicidad
		];

		$this->Membresias_model->update_publicidad($id_usuario_session,$data);
		redirect(base_url()."membresias/inf");

	}

	
	


}


