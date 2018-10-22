<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sugerencias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Sugerencias_model");
	}

	public function list()
	{
		$data = [
		    'sugerencias' => $this->Sugerencias_model->list()
		];

		$this->layout->view("list",$data);

	}


/******************VISTA DE SUGERENCIAS*******************/
public function add()
	{

		$this->layout->view("add");

	}

/******************VISTA DE SUGERENCIAS*******************/	


	public function create()
	{
		$id_usuario       = $this->session->userdata("id");
		$descripcion      = $this->input->post("sugerencia");
		$fecha_enviado    = date('Y-m-d');
		$estado           = '0';

		$this->form_validation->set_rules("sugerencia","Sugerencia del Usuario","required");

		if ($this->form_validation->run()) {
			$data = array(
				'id_usuario'        => $id_usuario, 
				'descripcion'       => $descripcion,
				'fecha_enviado'     => $fecha_enviado,
				'estado'            => $estado,
			);

			if ($this->Sugerencias_model->save($data)) 
			{
				redirect(base_url()."sugerencias/list");
			}else
			{
				$this->session->set_flashdata("error_sug","No se pudo guardar la informacion");
				redirect(base_url()."sugerencias/add");
			}


		}else{
			redirect(base_url()."sugerencias/add");
		}

	}

	/*MODAL AGREGADO*/
public function view($id_sugerencia)
{
	$data  = array(
			'sugerencia'   => $this->Sugerencias_model->get_sugerencia($id_sugerencia), 
		);
		$this->load->view("sugerencias/modal_sugerencia",$data);
}
/*MODAL AGREGADO*/

/******************SUGERENCIA YA VISTA*******************/
public function update($id_sugerencia,int $id_estado)
	{		
		if($id_estado== 0){

				$data  = array(
				'estado'       => '1' 
			);
				
			$this->Sugerencias_model->update($id_sugerencia,$data);
			redirect(base_url()."sugerencias/list");	
		}

		

	}

/******************SUGERENCIA YA VISTA*******************/	


}



