<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Usuarios_model");
		$this->load->model("Collectionm_model");
	}

	public function index()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'monedas_totales'     => $this->Collectionm_model->get_collection_totales($id_usuario_session),
		    'monedas_intercambio' => $this->Collectionm_model->get_collection_intercambio($id_usuario_session),
		    'monedas_venta'       => $this->Collectionm_model->get_collection_venta($id_usuario_session),
		    'monedas_personales'  => $this->Collectionm_model->get_collection_personales($id_usuario_session)
		];
		$this->layout->view("pagina_inicio",$data);
	}

	public function grafica($ano_proyecto)
	{

		$resultados = $this->Collectionm_model->get_data_ano($ano_proyecto);
		echo json_encode($resultados);		
	}	

}
