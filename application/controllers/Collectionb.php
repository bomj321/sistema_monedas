<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collectionb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Billetes_model");
	}
/*FORMULARIO RENDERIZADO CON AJAX*/	

		public function add_collection($id_moneda)
		{
			$data = [
			    '$id_moneda' => $id_moneda
			];

			$this->layout->view("add",$data);
		}
	
}
