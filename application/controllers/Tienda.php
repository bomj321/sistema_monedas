<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Tienda_model");
		$this->load->model("Monedas_model");
	}



public function index()
	{

		if ($this->input->post("filtros") AND $this->input->post("id_filtro")) {
				$filtros   = $this->input->post("filtros");
				$id_filtro = $this->input->post("id_filtro");
				$data = array(
				'configuracion'     => $this->Tienda_model->obtener_configuracion(),	
				'usuarios'          => $this->Monedas_model->listusuarios_filtro($filtros), 
				'filtros'           => $this->input->post("filtros"),
				'id_filtro'         => $this->input->post("id_filtro"),
				'atributos'         => $this->Monedas_model->listatributos(),
				'opciones_atributo' => $this->Monedas_model->listatributos_opciones($id_filtro),

				);
				$this->layout_tienda->view("inicio",$data);

			}else{
				$data = array(
				'configuracion' => $this->Tienda_model->obtener_configuracion(),
				'atributos'     => $this->Monedas_model->listatributos(),	
				'usuarios'      => $this->Monedas_model->listusuarios_free(), 
				);
				$this->layout_tienda->view("inicio",$data);
		}
						
		
	}



/*SECCION DE CONFIGURACION DEL ENTORNO*/
public function configuracion(){
	$data = array(
		'configuracion' => $this->Tienda_model->obtener_configuracion(),
	  );

	$this->layout->view("configuracion",$data);

}

public function crear_configuracion(){
	                $id_configuracion   = $this->input->post("id_configuracion");
					$titulo_producto    = $this->input->post("titulo_producto");




					$titulo_tabla       = $this->input->post("titulo_tabla");
					$contenido_tabla    = $this->input->post("contenido_tabla");



					$titulo_footer      = $this->input->post("titulo_footer");
					$contenido_footer   = $this->input->post("contenido_footer");
					$link_facebook      = $this->input->post("link_facebook");
					$link_twitter       = $this->input->post("link_twitter");
					$link_google        = $this->input->post("link_google");
					$link_instagram     = $this->input->post("link_instagram");				

					$this->form_validation->set_rules("titulo_producto","Titulo de la Ropa","required");

					$this->form_validation->set_rules("titulo_tabla","Titulo al lado de la Tabla","required");
					$this->form_validation->set_rules("contenido_tabla","Contenido explicativo","required");


					$this->form_validation->set_rules("titulo_footer","El titulo del Footer","required");
					$this->form_validation->set_rules("contenido_footer","Contenido del Footer","required");
					$this->form_validation->set_rules("link_facebook","Link de Facebook","required");
					$this->form_validation->set_rules("link_twitter","Link de Twitter","required");
					$this->form_validation->set_rules("link_google","Link de Google","required");
					$this->form_validation->set_rules("link_instagram","Link de Instagram","required");

	if ($this->form_validation->run()) {
		$data = array
		(
			'titulo_producto'          =>  trim($titulo_producto),
			'titulo_tabla'             =>  trim($titulo_tabla),
			'contenido_tabla'          =>  trim($contenido_tabla),
			'titulo_footer'            =>  trim($titulo_footer),
			'contenido_footer'         =>  trim($contenido_footer),
			'link_facebook '           =>  trim($link_facebook),
			'link_twitter'             =>  trim($link_twitter),
			'link_google'              =>  trim($link_google),
			'link_instagram'           =>  trim($link_instagram),
		);
		if (!$this->Tienda_model->update_configuracion($data,$id_configuracion)) {
				$this->session->set_flashdata("mensaje","No se pudo guardar la información");
				$this->configuracion();
		}else{
				$this->session->set_flashdata("mensaje","Configuracion Guardada");
				$this->configuracion();
		}
				
	}else{
		$this->configuracion();
	}
}
/*SECCION DE CONFIGURACION DEL ENTORNO*/		

/*SECCION DE LAS TABLAS*/

public function form_atributo_moneda($id_atributo){
	$data = array(
		'opciones_atributo' => $this->Monedas_model->listatributos_opciones($id_atributo),
		'id_atributo' => $id_atributo,

	);
	$this->load->view("tienda/consulta_filtro",$data);

}

/*SECCION DE LAS TABLAS*/

/*VISTAS PARA EL MODAL*/
public function view($id)
{
	$data  = array(
			'monedas_general'    => $this->Monedas_model->listmoneda_general($id), 
			'monedas_tecnico'    => $this->Monedas_model->listmoneda_tecnico($id),
			'monedas_anverso'    => $this->Monedas_model->listmoneda_anverso($id),
			'monedas_reverso'    => $this->Monedas_model->listmoneda_reverso($id),
			'monedas_canto'      => $this->Monedas_model->listmoneda_canto($id),
			'monedas_variedades' => $this->Monedas_model->listmoneda_variedades($id),
			'monedas_adicional'  => $this->Monedas_model->listmoneda_adicional($id), 
			'imagenes'           => $this->Monedas_model->listmonedaimage($id),
			'catalogos'          => $this->Monedas_model->listattr_cat_edit($id),
			'pagos_catalogo'     => $this->Monedas_model->listattr_cat_pagos($id)
		);
		$this->load->view("tienda/modal_moneda",$data);
}



/*VISTAS PARA EL MODAL*/
	
}
