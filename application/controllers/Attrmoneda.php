<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attrmoneda extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		$this->load->model("Monedas_model");
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
		$categoria_atributo          = $this->input->post("categoria_atributo");
		$tipo_atributo               = $this->input->post("tipo_atributo");
		$opciones_especialesm        = $this->input->post("opciones_especialesm");

		$this->form_validation->set_rules("nombre_atributo","Nombre Seccion","required|is_unique[atributos_m.nombre_atributo]");
		$this->form_validation->set_rules("descripcion_atributo","Descripcion","required");

		$valor_orden_maximo=$this->Monedas_model->max_orden();
		$valor_maximo = intval($valor_orden_maximo->orden_max)+1;

		if ($this->form_validation->run()) {
			$data = array(
				'nombre_atributo'        => $nombre_atributo, 
				'descripcion_atributo'   => ucfirst($descripcion_atributo),
				'tipo_atributom'         => $tipo_atributo,
				'categoria_atributom'    => $categoria_atributo,
				'orden'                  => $valor_maximo,
				'estado'                 => '1'			
			);

			if ($ultimo_id_atributo=$this->Monedas_model->save_attr($data)) 
			{
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/
			if ($tipo_atributo=='Especiales') {	
					for ($i = 0; $i < count($opciones_especialesm) ; $i++) {
						$data_atributo  = array(
								'id_atributom'              => $ultimo_id_atributo,
								'opciones_especialesm'      => $opciones_especialesm[$i],								
							);
						$this->Monedas_model->atributos_especiales_m($data_atributo);
						
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
		//$valor_orden_maximo=$this->Monedas_model->max_orden();
		$data = array(
			'monedas'       => $this->Monedas_model->listattr(),
			'valor_maximo'  => $this->Monedas_model->max_orden(),
			'valor_minimo'  => $this->Monedas_model->min_orden()
		);

		$this->layout->view("list",$data);
	}

	public function update($id,int $estado){
		$data = array(
			'estado' => $estado
		);

		$this->Monedas_model->update_state_attr($id,$data);
		$this->list();
	}

	public function edit($id)
	{
		$data = array(
			'atributo'            => $this->Monedas_model->get_attr($id),
			'atributo_especiales' => $this->Monedas_model->get_attr_especiales($id)
		);
		
		$this->layout->view("edit",$data);
	}

	public function update_atribute()
	{
		$id_atributo                 = $this->input->post("id_atributo");
		$nombre_atributo             = $this->input->post("nombre_atributo");
		$descripcion_atributo        = $this->input->post("descripcion_atributo");
		$categoria_atributo          = $this->input->post("categoria_atributo");
		$tipo_atributo               = $this->input->post("tipo_atributo");
		$opciones_especialesm        = $this->input->post("opciones_especialesm");

		$atributo_actual = $this->Monedas_model->get_attr($id_atributo);

		if ($nombre_atributo == $atributo_actual->nombre_atributo) {
			$is_unique = "";
		}else{
			$is_unique= '|is_unique[atributos_m.nombre_atributo]';
		}


		$this->form_validation->set_rules("nombre_atributo","Nombre Seccion","required".$is_unique);
		$this->form_validation->set_rules("descripcion_atributo","Descripcion","required");

		if ($this->form_validation->run()) {
				$data = array(
					'nombre_atributo'        => $nombre_atributo, 
				    'descripcion_atributo'   => ucfirst($descripcion_atributo),
				    'tipo_atributom'         => $tipo_atributo,
				    'categoria_atributom'    => $categoria_atributo,					
				);

				if ($this->Monedas_model->update_atribute($id_atributo,$data)) 
				{
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/
					if ($tipo_atributo=='Especiales') {	
						$this->Monedas_model->atributos_especiales_m_delete($id_atributo);//BORRAMOS TODOS LOS REGISTROS DE ESA MONEDA

							for ($i = 0; $i < count($opciones_especialesm) ; $i++) {
								$data_atributo  = array(
										'id_atributom'              => $id_atributo,
										'opciones_especialesm'      => $opciones_especialesm[$i],								
									);
								$this->Monedas_model->atributos_especiales_m($data_atributo);
								
							}
					}else{
						$this->Monedas_model->atributos_especiales_m_delete($id_atributo);//BORRAMOS TODOS LOS REGISTROS DE ESA MONEDA AL NO SER ESPECIAL
					}
/*PARA GUARDAR TODOS LOS ATRIBUTOS*/		
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
		$count = count($this->Monedas_model->get_attr_exist($id));
		if($count == 0){
			$this->Monedas_model->delete($id);
			$this->list();
		}else{
			$this->session->set_flashdata("error","Este Registro esta siendo usado");
			$this->list();
		}
	}

/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_opciones()
{	
    
	$this->load->view("attrmoneda/form_opciones");
}
/*FORMULARIO RENDERIZADO CON AJAX*/	

/*FUNCION PARA ELIMINAR LA OPCION ACTUAL*/
public function delete_opcion_es($id,$id_atributo_edit)
{
		$this->Monedas_model->delete_opcion_es($id);
		$this->edit($id_atributo_edit);
}
/*FUNCION PARA ELIMINAR LA OPCION ACTUAL*/


/*FUNCION PARA SUBIR LA OPCION*/
public function up_order($id,$orden)
{		

		$orden_arriba =  intval($orden) + 1;
		$orden_superior= $this->Monedas_model->row_up_orden($orden_arriba);

		$orden_row = $orden_superior->orden;//ORDEN NUMERO SUPERIOR
		$orden_id  = $orden_superior->id_atributo_m;//ID DEL REGISTRO CON ORDEN SUPERIOR

		$data_superior = array(
			'orden' => $orden
		);

		$this->Monedas_model->update_orden_superior($orden_id,$data_superior);//REBAJA EL REGISTRO SUPERIOR

		$data_inferior = array(
			'orden' => $orden_arriba
		);

		$this->Monedas_model->update_orden_superior($id,$data_inferior);//SUBE EL REGISTRO INFERIOR
		redirect(base_url()."attrmoneda/list");

		

		//$this->Monedas_model->delete_opcion_es($id);
		//$this->edit($id_atributo_edit);
}
/*FUNCION PARA SUBIR LA OPCION*/


/*FUNCION PARA BAJAR LA OPCION*/
public function down_order($id,$orden)
{		

		$orden_abajo   =  intval($orden) - 1;
		$orden_inferior= $this->Monedas_model->row_down_orden($orden_abajo);

		$orden_row = $orden_inferior->orden;//ORDEN NUMERO SUPERIOR
		$orden_id  = $orden_inferior->id_atributo_m;//ID DEL REGISTRO CON ORDEN SUPERIOR

		$data_inferior = array(
			'orden' => $orden
		);

		$this->Monedas_model->update_orden_inferior($orden_id,$data_inferior);//REBAJA EL REGISTRO SUPERIOR

		$data_superior = array(
			'orden' => $orden_abajo
		);

		$this->Monedas_model->update_orden_inferior($id,$data_superior);//SUBE EL REGISTRO INFERIOR
		redirect(base_url()."attrmoneda/list");

		

		//$this->Monedas_model->delete_opcion_es($id);
		//$this->edit($id_atributo_edit);
}
/*FUNCION PARA BAJAR LA OPCION*/



}
