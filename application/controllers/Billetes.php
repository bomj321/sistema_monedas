<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billetes extends CI_Controller {

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
		$data = array(
			'atributos' => $this->Billetes_model->listattr_form(),
			'catalogos' => $this->Billetes_model->listattr_cat() 
		);

		$this->layout->view("add",$data);
	}


	public function create()
	{//////////////////////////////////////////////CREATE
		     $atributo_id  = $this->input->post("atributo_id");
		     $catalogo     = $this->input->post("catalogo");   

		     
/*INSERTAR USUARIO*/
		    if($this->session->userdata("tipo_usuario")==1 )
		    {
		    	$usuario   = 'Administrador';
		    }

		    $data_usuario = array(
		     'usuario'     => $usuario, 
			);

			$ultimo_id= $this->Billetes_model->add_moneda($data_usuario);
/*INSERTAR USUARIO*/


/*INSERTAR IMAGEN*/

/*if (!empty($_FILES['imagen']["name"])) {
					 $this->load->library('upload');
					$atributo_id_image = $this->input->post("atributo_id_image");
					$variablefile = $_FILES;

					$config['upload_path']          =  './public/images_billetes';
					$config['allowed_types']        =  'gif|jpg|png|jpeg';
					$config['max_size']             =  10000;
					$config['max_width']            =  2000;
					$config['max_height']           =  2000;

					for ($i=0; $i < count($_FILES['imagen']["name"]); $i++) {
					$_FILES['imagen']['name']     = $variablefile['imagen']['name'][$i];
					$_FILES['imagen']['type']     = $variablefile['imagen']['type'][$i];
					$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
					               
					                $this->upload->initialize($config);
									
					              	if ($this->upload->do_upload('imagen')){
						              		$data = array("upload_data" => $this->upload->data());

						              		$data_imagen  = array(
													'id_billete'            => $ultimo_id, 
													'id_atributo'           => $atributo_id_image[$i],
													'atributo_billete'      => $data['upload_data']['file_name'],
													
												);
												

										 if (!$this->Billetes_model->save_atributes_image($data_imagen)) {
										 	$this->session->set_flashdata("error","No se pudo guardar la informacion");
											redirect(base_url()."billetes/add");
										}
					              }else{
					              	$this->session->set_flashdata("error","No se pudo guardar la informacion");
											redirect(base_url()."billetes/add");
					              }

					              	

					}

}*/

if (!empty($_FILES['imagen']["name"])) {
		$this->load->library("upload");
		$atributo_id_image = $this->input->post("atributo_id_image");


		$config['upload_path']          =  './public/images_billetes';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  10000;
		$config['max_width']            =  2000;
		$config['max_height']           =  2000;


		$variablefile= $_FILES;
		$info = array();
		$files = count($_FILES['imagen']['name']);
		for ($i=0; $i < $files; $i++) { 
			$_FILES['imagen']['name'] = $variablefile['imagen']['name'][$i];
			$_FILES['imagen']['type'] = $variablefile['imagen']['type'][$i];
			$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
			$_FILES['imagen']['error'] = $variablefile['imagen']['error'][$i];
			$_FILES['imagen']['size'] = $variablefile['imagen']['size'][$i];
			$this->upload->initialize($config);

			if ($this->upload->do_upload('imagen')) {
				$data = array("upload_data" => $this->upload->data());
				$datos = array(
					'id_billete'            => $ultimo_id, 
					'id_atributo'           => $atributo_id_image[$i],
					'atributo_billete'      => $data['upload_data']['file_name'],
				);
				$this->Billetes_model->save_atributes_image($datos);
				
			}
			
		}
		
}


/*INSERTAR IMAGEN*/

/*Atributos Normales*/
if (!empty($atributo_id)) {	

	for ($i=0; $i < count($atributo_id); $i++) { 
							$data  = array(
								'id_billete'            => $ultimo_id, 
								'id_atributo'           => $atributo_id[$i],
								'atributo_billete'      => $catalogo[$i].' Pesos',
								
							);
							$this->Billetes_model->save_atributes($data);
	}
}
/*Atributos Normales*/					



/*PRECIO CATALOGO*/

/*INPUTS NECESARIOS*/
 $id_catalogo            = $this->input->post("id_catalogo");
 $numero_referencia      = $this->input->post("numero_referencia"); 
 $precio_G               = $this->input->post("precio_G"); 
 $precio_F               = $this->input->post("precio_F"); 
 $precio_VF              = $this->input->post("precio_VF"); 
 $precio_XF              = $this->input->post("precio_XF"); 
 $precio_UNC             = $this->input->post("precio_UNC");  
/*INPUTS NECESARIOS*/
if (!empty($id_catalogo)) {	

	for ($i=0; $i < count($id_catalogo); $i++) { 
			$data_catalogo  = array(
							'id_billete'            => $ultimo_id, 
							'id_atributo'           => $id_catalogo[$i],
							'atributo_billete'      => $numero_referencia[$i],
							
						);
					$this->Billetes_model->save_atributes_catalogo($data_catalogo);


			for ($pr = 0; $pr < 4 ; $pr++) {
				$data_precio  = array(
							'id_catalogo'   => $id_catalogo[$i],
							'G'             => $precio_G[$pr],
							'VF'            => $precio_F[$pr],
							'F'             => $precio_VF[$pr],
							'VF'            => $precio_XF[$pr],
							'UNC'           => $precio_UNC[$pr],
				);
					$this->Billetes_model->save_precios_catalogo($data_precio);
				
			}
						
	}
}	

/*PRECIO CATALOGO*/

redirect(base_url()."billetes/list");
   
				
	}//////////////////////////////////////////////CREATE


	public function list()
	{
		$data = array(
			'usuarios' => $this->Billetes_model->listusuarios(), 
		);

		$this->layout->view("list",$data);
	}

public function view($id)
{
	$data  = array(
			'billetes' => $this->Billetes_model->listbillete($id), 
			'imagenes' => $this->Billetes_model->listbilleteimage($id)
		);
		$this->load->view("billetes/modal_billete",$data);
}


/*FORMULARIO RENDERIZADO*/
public function form_billete($selectext,$selecvalue)
{	
     $data = array(
		'nombre' => $selectext,
		'value'  => $selecvalue
	);
	$this->load->view("billetes/form_billete",$data);
}
/*FORMULARIO RENDERIZADO*/	
	
}
