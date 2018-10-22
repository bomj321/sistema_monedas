<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercadom extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Mercadom_model");
	}

	public function list()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'monedas_mercado' => $this->Mercadom_model->list($id_usuario_session)
		];

		$this->layout->view("list",$data);

	}

	/*MODAL AGREGADO*/
public function view($id_moneda)
{
	$data  = array(
			'coleccionesm'   => $this->Mercadom_model->get_collectionbm_mercado($id_moneda), 
		);
		$this->load->view("mercadom/modal_moneda",$data);
}	
/*MODAL AGREGADO*/


/******************BUSQUEDAS DE MONEDAS*******************/
public function listb()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'monedas_mercado_busco' => $this->Mercadom_model->listb($id_usuario_session)
		];

		$this->layout->view("list_busqueda",$data);

	}

/******************BUSQUEDAS DE MONEDAS*******************/		
}
