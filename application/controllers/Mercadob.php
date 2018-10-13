<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercadob extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Mercadob_model");
	}

	public function list()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'billetes_mercado' => $this->Mercadob_model->list($id_usuario_session)
		];

		$this->layout->view("list",$data);

	}
}
