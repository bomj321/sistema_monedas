<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attrbillete extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		$this->load->model("Billetes_model");
	}

	public function add()
	{
		$this->layout->view("add");
	}

	public function create()
	{
		$nombre_atributo      = $this->input->post("nombre_atributo");
		$descripcion_atributo = $this->input->post("descripcion_atributo");

		$this->form_validation->set_rules("nombre_atributo","Nombre Seccion","required|is_unique[atributos_b.nombre_atributo]");
		$this->form_validation->set_rules("descripcion_atributo","Descripcion","required");

		if ($this->form_validation->run()) {
			$data = array(
				'nombre_atributo'        => $nombre_atributo, 
				'descripcion_atributo'   => ucfirst($descripcion_atributo),
				'estado'                 => '1',
			);

			if ($this->Billetes_model->save_attr($data)) 
			{
				$this->list();
			}else
			{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				$this->add();
			}


		}else{
			$this->add();
		}
	}

	public function list()
	{
		$data = array(
			'billetes' => $this->Billetes_model->listattr() , 
		);

		$this->layout->view("list",$data);
	}

	public function update($id,int $estado){
		$data = array(
			'estado' => $estado
		);

		$this->Billetes_model->update_attr($id,$data);
		$this->list();
	}
}
