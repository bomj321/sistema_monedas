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
		if($this->session->userdata("tipo_usuario")!=1){
			$this->load->view("505");	


		}else{
			$this->layout->view("add");
		}
	}

	public function create()
	{
		$nombre_atributo      = $this->input->post("nombre_atributo");
		$descripcion_atributo = $this->input->post("descripcion_atributo");
		$tipo_atributo        = $this->input->post("tipo_atributo");

		$this->form_validation->set_rules("nombre_atributo","Nombre Seccion","required|is_unique[atributos_b.nombre_atributo]");
		$this->form_validation->set_rules("descripcion_atributo","Descripcion","required");
		//$this->form_validation->set_rules("tipo_atributo","Tipo de Atributo","required");

		if ($this->form_validation->run()) {
			$data = array(
				'nombre_atributo'        => $nombre_atributo, 
				'descripcion_atributo'   => ucfirst($descripcion_atributo),
				'tipo_atributob'         => $tipo_atributo,
				'estado'                 => '1',
			);

			if ($this->Billetes_model->save_attr($data)) 
			{
				$this->list();
			}else
			{
				$this->session->set_flashdata("error_attr","No se pudo guardar la informacion");
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

		$this->Billetes_model->update_state_attr($id,$data);
		$this->list();
	}

	public function edit($id)
	{
		$data = array(
			'atributo' => $this->Billetes_model->get_attr($id)
		);
		
		$this->layout->view("edit",$data);
	}

	public function update_atribute()
	{
		$id_atributo               = $this->input->post("id_atributo");
		$nombre_atributo           = $this->input->post("nombre_atributo");
		$descripcion_atributo      = $this->input->post("descripcion_atributo");
		$tipo_atributo             = $this->input->post("tipo_atributo");

		$atributo_actual = $this->Billetes_model->get_attr($id_atributo);

		if ($nombre_atributo == $atributo_actual->nombre_atributo) {
			$is_unique = "";
		}else{
			$is_unique= '|is_unique[atributos_b.nombre_atributo]';
		}


		$this->form_validation->set_rules("nombre_atributo","Nombre Seccion","required".$is_unique);
		$this->form_validation->set_rules("descripcion_atributo","Descripcion","required");
		$this->form_validation->set_rules("tipo_atributo","Tipo de Atributo","required");

		if ($this->form_validation->run()) {
				$data = array(
					'nombre_atributo'        => $nombre_atributo,
					'descripcion_atributo'   => ucfirst($descripcion_atributo),	
					'tipo_atributob'         => $tipo_atributo,				
				);

				if ($this->Billetes_model->update_atribute($id_atributo,$data)) 
				{
					$this->list();
				}else
				{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					$this->add($id_atributo);
				}


			}else{
				$this->add($id_atributo);
		}
	}

	public function delete($id)
	{
		$count = count($this->Billetes_model->get_attr_exist($id));
		if($count == 0){
			$this->Billetes_model->delete($id);
			$this->list();
		}else{
			$this->session->set_flashdata("error","Este Registro esta siendo usado");
			$this->list();
		}
	}

/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_opciones()
{	
    
	$this->load->view("attrbillete/form_opciones");
}
/*FORMULARIO RENDERIZADO CON AJAX*/	

}
