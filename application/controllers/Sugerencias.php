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

/***************************************************************SECCION DE MONEDAS************************************************************/
public function list_monedas()
{

	if($this->session->userdata("tipo_usuario")==1 ){
						if ($this->input->post("filtros") AND $this->input->post("id_filtro")) {
							$filtros   = $this->input->post("filtros");
							$id_filtro = $this->input->post("id_filtro");
							$data = array(
							'usuarios'          => $this->Sugerencias_model->listusuarios_filtro($filtros), 
							'filtros'           => $this->input->post("filtros"),
							'id_filtro'         => $this->input->post("id_filtro"),
							'atributos'         => $this->Sugerencias_model->listatributos(),
							'opciones_atributo' => $this->Sugerencias_model->listatributos_opciones($id_filtro),

							);
							$this->layout->view("list_monedas",$data);

						}else{
							$data = array(
							'atributos'  => $this->Sugerencias_model->listatributos(),	
							'usuarios'   => $this->Sugerencias_model->listusuarios(), 
							);
							$this->layout->view("list_monedas",$data);
						}

		}else{
						if ($this->input->post("filtros") AND $this->input->post("id_filtro")) {
							$filtros   = $this->input->post("filtros");
							$id_filtro = $this->input->post("id_filtro");
							$data = array(
							'usuarios'          => $this->Sugerencias_model->listusuarios_filtro_free($filtros), 
							'filtros'           => $this->input->post("filtros"),
							'id_filtro'         => $this->input->post("id_filtro"),
							'atributos'         => $this->Sugerencias_model->listatributos(),
							'opciones_atributo' => $this->Sugerencias_model->listatributos_opciones($id_filtro),

							);
							$this->layout->view("list_monedas",$data);

						}else{
							$data = array(
							'atributos'  => $this->Sugerencias_model->listatributos(),	
							'usuarios'   => $this->Sugerencias_model->listusuarios_free(), 
							);
							$this->layout->view("list_monedas",$data);
						}



		}




}

public function view_moneda($id,$codigo_sugerencia)
{
	$data  = array(
			'monedas_general'    => $this->Sugerencias_model->listmoneda_general($id,$codigo_sugerencia), 
			'monedas_tecnico'    => $this->Sugerencias_model->listmoneda_tecnico($id,$codigo_sugerencia),
			'monedas_anverso'    => $this->Sugerencias_model->listmoneda_anverso($id,$codigo_sugerencia),
			'monedas_reverso'    => $this->Sugerencias_model->listmoneda_reverso($id,$codigo_sugerencia),
			'monedas_canto'      => $this->Sugerencias_model->listmoneda_canto($id,$codigo_sugerencia),
			'monedas_variedades' => $this->Sugerencias_model->listmoneda_variedades($id,$codigo_sugerencia),
			'monedas_adicional'  => $this->Sugerencias_model->listmoneda_adicional($id,$codigo_sugerencia), 
			'imagenes'           => $this->Sugerencias_model->listmonedaimage($id,$codigo_sugerencia),
			'catalogos'          => $this->Sugerencias_model->listattr_cat_edit($id,$codigo_sugerencia),
			'pagos_catalogo'     => $this->Sugerencias_model->listattr_cat_pagos($id,$codigo_sugerencia)
		);
		$this->load->view("sugerencias/modal_moneda",$data);
}



/**************ELIMINAR O ACEPTAR CAMBIOS*******************/
public function delete($id_moneda,$codigo_sugerencia)
{
	        $this->Sugerencias_model->delete_moneda($id_moneda,$codigo_sugerencia);
	        $this->Sugerencias_model->delete_moneda_cat($id_moneda,$codigo_sugerencia);
			redirect(base_url()."sugerencias/list_monedas");	
}



public function aceptar($id_moneda,$codigo_sugerencia)
{
		$imagenes            = $this->Sugerencias_model->listmonedaimage($id_moneda,$codigo_sugerencia);
		$imagenes_existentes = $this->Sugerencias_model->listmonedaimage_existentes($id_moneda);

		if (empty($imagenes_existentes)) {

			
				$this->Sugerencias_model->delete_moneda_existente($id_moneda);
				$this->Sugerencias_model->delete_moneda_cat_existente($id_moneda);
				

				$data = array(				
					'tipo_moneda' => '1', 
				);

				$this->Sugerencias_model->update_moneda_sugerida($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_moneda_sugerida_cat($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_pagos_catalogo($id_moneda,$codigo_sugerencia,$data);

				redirect(base_url()."sugerencias/list_monedas");


		}elseif(empty($imagenes)){


				foreach ($imagenes_existentes as $imagen) {
					$id_atributo = $imagen->id_atributo;
						$data_atributo = array(				
								'tipo_moneda' => '0', 
							);
					$this->Sugerencias_model->update_imagenes_existentes($id_atributo,$data_atributo);
				}

				$this->Sugerencias_model->delete_moneda_existente($id_moneda);
				$this->Sugerencias_model->delete_moneda_cat_existente($id_moneda);

				$data = array(				
					'tipo_moneda' => '1', 
				);
				$this->Sugerencias_model->update_imagenes_existentes($id_atributo,$data);
				$this->Sugerencias_model->update_moneda_sugerida($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_moneda_sugerida_cat($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_pagos_catalogo($id_moneda,$codigo_sugerencia,$data);

				redirect(base_url()."sugerencias/list_monedas");




		}elseif($imagenes AND $imagenes_existentes){

					foreach ($imagenes_existentes as $imagen) {
					$id_atributo = $imagen->id_atributo;
						$data_atributo = array(				
								'tipo_moneda' => '0', 
							);
					$this->Sugerencias_model->update_imagenes_existentes($id_atributo,$data_atributo);
				}

				$this->Sugerencias_model->delete_moneda_existente($id_moneda);
				$this->Sugerencias_model->delete_moneda_cat_existente($id_moneda);

				$data = array(				
					'tipo_moneda' => '1', 
				);
				$this->Sugerencias_model->update_imagenes_existentes($id_atributo,$data);
				$this->Sugerencias_model->update_moneda_sugerida($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_moneda_sugerida_cat($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_pagos_catalogo($id_moneda,$codigo_sugerencia,$data);

				redirect(base_url()."sugerencias/list_monedas");



		}else{
				$this->Sugerencias_model->delete_moneda_existente($id_moneda);
				$this->Sugerencias_model->delete_moneda_cat_existente($id_moneda);

				$data = array(				
					'tipo_moneda' => '1', 
				);

				$this->Sugerencias_model->update_moneda_sugerida($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_moneda_sugerida_cat($id_moneda,$codigo_sugerencia,$data);
				$this->Sugerencias_model->update_pagos_catalogo($id_moneda,$codigo_sugerencia,$data);

				redirect(base_url()."sugerencias/list_monedas");
		}

		
		
}

/**************ELIMINAR O ACEPTAR CAMBIOS*******************/

/***************************************************************SECCION DE MONEDAS************************************************************/

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



