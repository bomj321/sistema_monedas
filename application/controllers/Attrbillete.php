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
		$nombre_atributo             = $this->input->post("nombre_atributo");
		$descripcion_atributo        = $this->input->post("descripcion_atributo");
		$tipo_atributo               = $this->input->post("tipo_atributo");
		$opciones_especialesb        = $this->input->post("opciones_especialesb");

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

			if ($ultimo_id_atributo=$this->Billetes_model->save_attr($data)) 
			{
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/
			if ($tipo_atributo=='Especiales') {	
					for ($i = 0; $i < count($opciones_especialesb) ; $i++) {
						$data_atributo  = array(
								'id_atributob'              => $ultimo_id_atributo,
								'opciones_especialesb'      => $opciones_especialesb[$i],								
							);
						$this->Billetes_model->atributos_especiales_b($data_atributo);
						
					}
			}
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/				
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
			'atributo'            => $this->Billetes_model->get_attr($id),
			'atributo_especiales' => $this->Billetes_model->get_attr_especiales($id)
		);
		
		$this->layout->view("edit",$data);
	}

	public function update_atribute()
	{
		$id_atributo               = $this->input->post("id_atributo");
		$nombre_atributo           = $this->input->post("nombre_atributo");
		$descripcion_atributo      = $this->input->post("descripcion_atributo");
		$tipo_atributo             = $this->input->post("tipo_atributo");
		$opciones_especialesb      = $this->input->post("opciones_especialesb");

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
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/
			if ($tipo_atributo=='Especiales') {	
				$this->Billetes_model->atributos_especiales_b_delete($id_atributo);//BORRAMOS TODOS LOS REGISTROS DE ESA MONEDA

					for ($i = 0; $i < count($opciones_especialesb) ; $i++) {
						$data_atributo  = array(
								'id_atributob'              => $id_atributo,
								'opciones_especialesb'      => $opciones_especialesb[$i],								
							);
						$this->Billetes_model->atributos_especiales_b($data_atributo);
						
					}
			}else{
				$this->Billetes_model->atributos_especiales_b_delete($id_atributo);//BORRAMOS TODOS LOS REGISTROS DE ESA MONEDA AL NO SER ESPECIAL
			}
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/		


					$this->list();
				}else
				{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					$this->edit($id_atributo);
				}


			}else{
				$this->edit($id_atributo);
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

/*FUNCION PARA ELIMINAR LA OPCION ACTUAL*/
public function delete_opcion_es($id,$id_atributo_edit)
{
		$this->Billetes_model->delete_opcion_es($id);
		$this->edit($id_atributo_edit);
}
/*FUNCION PARA ELIMINAR LA OPCION ACTUAL*/
}
