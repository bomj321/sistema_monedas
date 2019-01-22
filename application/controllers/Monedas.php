<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Monedas_model");
	}


/*********************AGREGAR, EDITAR, DESHABILITAR Y ELIMINAR*/
	public function add()
	{
		if($this->session->userdata("tipo_usuario")!=1){
			$this->load->view("505");	


		}else{
			$data = array(
				'atributos_generales'       => $this->Monedas_model->listattr_form_generales(),
				'atributos_tecnicos'        => $this->Monedas_model->listattr_form_tecnicos(),
				'atributos_anverso'         => $this->Monedas_model->listattr_form_anverso(),
				'atributos_reverso'         => $this->Monedas_model->listattr_form_reverso(),
				'atributos_canto'           => $this->Monedas_model->listattr_form_canto(),
				'atributos_variedades'      => $this->Monedas_model->listattr_form_variedades(),
				'atributos_adicional'       => $this->Monedas_model->listattr_form_adicional(),
				'catalogos'                 => $this->Monedas_model->listattr_cat() 
			);

			$this->layout->view("add",$data);
		}
	}






	public function edit($id)
	{

		if($this->session->userdata("tipo_usuario")!=1){
			$this->load->view("505");	

					
		}else{	
			$data = array(
				'atributos_generales'        => $this->Monedas_model->listattr_form_edit_generales($id),
			    'atributos_tecnicos'         => $this->Monedas_model->listattr_form_edit_tecnicos($id),
			    'atributos_anverso'          => $this->Monedas_model->listattr_form_edit_anverso($id),
			    'atributos_reverso'          => $this->Monedas_model->listattr_form_edit_reverso($id),
			    'atributos_canto'            => $this->Monedas_model->listattr_form_edit_canto($id),
			    'atributos_variedades'       => $this->Monedas_model->listattr_form_edit_variedades($id),
		    	'atributos_adicional'        => $this->Monedas_model->listattr_form_edit_adicional($id),
				'catalogos_edit' 			 => $this->Monedas_model->listattr_cat_edit($id),
				'pagos_catalogo' 			 => $this->Monedas_model->listattr_cat_pagos($id),
				'catalogos'      			 => $this->Monedas_model->listattr_cat(),
				'atributos_not_generales'    => $this->Monedas_model->listattr_form_not_generales($id),
				'atributos_not_tecnicos'     => $this->Monedas_model->listattr_form_not_tecnicos($id),
				'atributos_not_anverso'      => $this->Monedas_model->listattr_form_not_anverso($id),
				'atributos_not_reverso'      => $this->Monedas_model->listattr_form_not_reverso($id),
				'atributos_not_canto'        => $this->Monedas_model->listattr_form_not_canto($id),
				'atributos_not_variedades'   => $this->Monedas_model->listattr_form_not_variedades($id),
				'atributos_not_adicional'    => $this->Monedas_model->listattr_form_not_adicional($id),
			);

			$this->layout->view("edit",$data);
		}
	}

/*SECCION PARA SUGERIR CAMBIOS*/
public function sugerir($id)
	{

		if($this->session->userdata("tipo_usuario")!=1){
			$this->load->view("505");	

					
		}else{	
			$data = array(
				'atributos_generales'        => $this->Monedas_model->listattr_form_edit_generales($id),
			    'atributos_tecnicos'         => $this->Monedas_model->listattr_form_edit_tecnicos($id),
			    'atributos_anverso'          => $this->Monedas_model->listattr_form_edit_anverso($id),
			    'atributos_reverso'          => $this->Monedas_model->listattr_form_edit_reverso($id),
			    'atributos_canto'            => $this->Monedas_model->listattr_form_edit_canto($id),
			    'atributos_variedades'       => $this->Monedas_model->listattr_form_edit_variedades($id),
		    	'atributos_adicional'        => $this->Monedas_model->listattr_form_edit_adicional($id),
				'catalogos_edit' 			 => $this->Monedas_model->listattr_cat_edit($id),
				'pagos_catalogo' 			 => $this->Monedas_model->listattr_cat_pagos($id),
				'catalogos'      			 => $this->Monedas_model->listattr_cat(),
				'atributos_not_generales'    => $this->Monedas_model->listattr_form_not_generales($id),
				'atributos_not_tecnicos'     => $this->Monedas_model->listattr_form_not_tecnicos($id),
				'atributos_not_anverso'      => $this->Monedas_model->listattr_form_not_anverso($id),
				'atributos_not_reverso'      => $this->Monedas_model->listattr_form_not_reverso($id),
				'atributos_not_canto'        => $this->Monedas_model->listattr_form_not_canto($id),
				'atributos_not_variedades'   => $this->Monedas_model->listattr_form_not_variedades($id),
				'atributos_not_adicional'    => $this->Monedas_model->listattr_form_not_adicional($id),
			);

			$this->layout->view("sugerir",$data);
		}
	}

	////////////////////////////////////////////////////////////////////////////////////GUARDAR SUGERENCIA
public function guardar_sugerencia()
	{
		     $atributo_id           = $this->input->post("atributo_id");
		     $id_unico              = $this->input->post("id_unico");
		     $catalogo              = $this->input->post("catalogo");
		     $fuente_imagen         = $this->input->post("fuente_imagen");
		     /*INPUTS DE AGREGACION*/
			 $atributo_id_add       = $this->input->post("atributo_id_add");
			 $catalogo_add          = $this->input->post("catalogo_add");
			 $fuente_imagen_add     = $this->input->post("fuente_imagen_add");
		    /*INPUTS DE AGREGACION*/  
		     


/*******************************INSERTAR IMAGEN EDITADA*/

if (!empty($_FILES['imagen']["name"])) {
		$this->load->library("upload");
		$atributo_id_image = $this->input->post("atributo_id_image");
		//$id_unico_usuario = $this->input->post("id_unico");


		$config['upload_path']          =  './public/images_monedas';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  0;
		$config['max_width']            =  0;
		$config['max_height']           =  0;


		$variablefile= $_FILES;
		$info = array();
		$files = count($_FILES['imagen']['name']);
		for ($i=0; $i < $files; $i++) { 
			if (!empty($_FILES['imagen']["name"][$i])) {
						$id_atributo                  = $atributo_id_image[$i];
						$id_unico_usuario_unico       = $id_unico[0];
						$_FILES['imagen']['name']     = $variablefile['imagen']['name'][$i];
						$_FILES['imagen']['type']     = $variablefile['imagen']['type'][$i];
						$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
						$_FILES['imagen']['error']    = $variablefile['imagen']['error'][$i];
						$_FILES['imagen']['size']     = $variablefile['imagen']['size'][$i];
						$this->upload->initialize($config);

						if ($this->upload->do_upload('imagen')) {
							$data = array("upload_data" => $this->upload->data());
							$datos = array(
								'id_moneda'            => $id_unico_usuario_unico, 
								'id_atributo'          => $id_atributo[$i],
								'atributo_moneda'      => $data['upload_data']['file_name'].','.$fuente_imagen[$i],
								'tipo_moneda'          => '0'
							);
							$this->Monedas_model->save_atributes_image($datos);
							
						}
					}
				
			}


		
}


/*******************************INSERTAR IMAGEN EDITADA*/

/*******************************INSERTAR IMAGEN NUEVOS EN LA EDICION QUE NO ESTABA*/

if (!empty($_FILES['imagen_add']["name"])) {
		$this->load->library("upload");	
		$atributo_id_image = $this->input->post("atributo_id_image_add");	
		//$id_unico  = $this->input->post("id_unico");
		
		$config['upload_path']          =  './public/images_monedas';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  0;
		$config['max_width']            =  0;
		$config['max_height']           =  0;


		$variablefile= $_FILES;
		$info = array();
		$files = count($_FILES['imagen_add']['name']);
		for ($i=0; $i < $files; $i++) { 
			$id_unico_usuario_unico = $id_unico[0];
			$_FILES['imagen_add']['name'] = $variablefile['imagen_add']['name'][$i];
			$_FILES['imagen_add']['type'] = $variablefile['imagen_add']['type'][$i];
			$_FILES['imagen_add']['tmp_name'] = $variablefile['imagen_add']['tmp_name'][$i];
			$_FILES['imagen_add']['error'] = $variablefile['imagen_add']['error'][$i];
			$_FILES['imagen_add']['size'] = $variablefile['imagen_add']['size'][$i];
			$this->upload->initialize($config);

			if ($this->upload->do_upload('imagen_add')) {
				$data = array("upload_data" => $this->upload->data());
				$datos = array(
					'id_moneda'             => $id_unico_usuario_unico, 
					'id_atributo'           => $atributo_id_image[$i],
					'atributo_moneda'       => $data['upload_data']['file_name'].','.$fuente_imagen_add[$i],
					'tipo_moneda'          => '0'
				);
				$this->Monedas_model->save_atributes_image($datos);
				
			}
			
		}
		
}


/*******************************INSERTAR IMAGEN NUEVOS EN LA EDICION QUE NO ESTABA*/

/*INSERTAR ATRIBUTO NORMAL EN LA EDICION QUE NO ESTABA*/
if (!empty($atributo_id_add)) {	
	//$id_unico  = $this->input->post("id_unico");
	for ($i=0; $i < count($atributo_id_add); $i++) { 

		if (!empty($catalogo_add[$i])) {
			$id_unico_usuario_unico = $id_unico[0];
			$data  = array(
				'id_moneda'            => $id_unico_usuario_unico, 
				'id_atributo'          => $atributo_id_add[$i],
				'atributo_moneda'      => $catalogo_add[$i],
				'tipo_moneda'          => '0'
				
			);
			$this->Monedas_model->save_atributes($data);
		}
	}
}

/*INSERTAR ATRIBUTO NORMAL EN LA EDICION QUE NO ESTABA*/


/******************************Atributos Normales EDITADA*/
if (!empty($atributo_id)) {	

	for ($i=0; $i < count($atributo_id); $i++) {
	$atributo_unico = $id_unico[$i];
	$id_atributo_id = $atributo_id[$i]; 
							$data  = array(
								'id_moneda'            => $id_unico_usuario_unico, 
								'id_atributo'          => $atributo_id[$i],
								'atributo_moneda'      => $catalogo[$i],
								'tipo_moneda'          => '0'								
							);
							$this->Monedas_model->save_atributes($data);
	}
}
/******************************Atributos Normales EDITADA*/	


/**********************CATALOGO Y PRECIO NO AGREGADO*********************************/
if (!empty($this->input->post("id_catalogo"))) {	

/*INPUTS NECESARIOS*/
 $id_catalogo            = $this->input->post("id_catalogo");
 $numero_referencia      = $this->input->post("numero_referencia"); 
 $precio_G               = $this->input->post("precio_G"); 
 $precio_VG              = $this->input->post("precio_VG");   
 $precio_F               = $this->input->post("precio_F"); 
 $precio_VF              = $this->input->post("precio_VF"); 
 $precio_XF              = $this->input->post("precio_XF"); 
 $precio_AU              = $this->input->post("precio_AU"); 
 $precio_UNC             = $this->input->post("precio_UNC");
 $id_unico  = $this->input->post("id_unico");
/*INPUTS NECESARIOS*/

	for ($i=0; $i < count($id_catalogo); $i++) {
	$id_unico_usuario_unico = $id_unico[0]; 	
			$data_catalogo  = array(
							'id_moneda'             => $id_unico_usuario_unico, 
							'id_atributo'           => $id_catalogo[$i],
							'atributo_moneda'       => $numero_referencia[$i],
							'tipo_moneda'           => '0'	
							
						);
					$this->Monedas_model->save_atributes_catalogo($data_catalogo);


			/*for ($pr = 0; $pr < 1 ; $pr++) {*/
				$data_precio  = array(
							'id_catalogo'   => $id_catalogo[$i],
							'id_moneda'     => $id_unico_usuario_unico,
							'G'             => $precio_G[$i],
							'VG'            => $precio_VG[$i],							
							'VF'            => $precio_VF[$i],
							'F'             => $precio_F[$i],
							'XF'            => $precio_XF[$i],
							'AU'            => $precio_AU[$i],
							'UNC'           => $precio_UNC[$i],
							'tipo_moneda'   => '0'	
				);
					$this->Monedas_model->save_precios_catalogo($data_precio);
				
			/*}*/
						
	}
}	
/**********************CATALOGO Y PRECIO NO AGREGADO*********************************/


/*********************************CATALOGO Y PRECIO CATALOGO EDITADA*/

if (!empty($this->input->post("id_unico_catalogo_edit"))) {	

				/*INPUTS NECESARIOS*/
				 $id_unico_catalogo_edit      = $this->input->post("id_unico_catalogo_edit");
				 $id_atributo_edit            = $this->input->post("id_atributo_edit");

				 $numero_referencia_edit      = $this->input->post("numero_referencia_edit"); 
				 $precio_G_edit               = $this->input->post("precio_G_edit");
				 $precio_VG_edit              = $this->input->post("precio_VG_edit");				 
				 $precio_F_edit               = $this->input->post("precio_F_edit"); 
				 $precio_VF_edit              = $this->input->post("precio_VF_edit"); 
				 $precio_XF_edit              = $this->input->post("precio_XF_edit"); 
				 $precio_AU_edit              = $this->input->post("precio_AU_edit"); 
				 $precio_UNC_edit             = $this->input->post("precio_UNC_edit");
				/*INPUTS NECESARIOS*/

/*NUEVO*/
	for ($i=0; $i < count($id_atributo_edit); $i++) { 	
		$id_unico       = $id_unico_catalogo_edit[0];
			$data_catalogo  = array(
							'id_moneda'            => $id_unico, 
							'id_atributo'          => $id_atributo_edit[$i],
							'atributo_moneda'      => $numero_referencia_edit[$i],
							'tipo_moneda'          => '0'	
							
						);
					$this->Monedas_model->save_atributes_catalogo($data_catalogo);


			/*for ($pr = 0; $pr < 1 ; $pr++) {*/
				$data_precio  = array(
							'id_catalogo'        => $id_atributo_edit[$i],
							'id_moneda'    		 => $id_unico,
							'G'             	 => $precio_G_edit[$i],
							'VG'           		 => $precio_VG_edit[$i],							
							'VF'           		 => $precio_VF_edit[$i],
							'F'            		 => $precio_F_edit[$i],
							'XF'           		 => $precio_XF_edit[$i],
							'AU'          		 => $precio_AU_edit[$i],
							'UNC'          		 => $precio_UNC_edit[$i],
							'tipo_moneda'        => '0'	
				);
					$this->Monedas_model->save_precios_catalogo($data_precio);
				
			/*}*/
						
	}


	/*NUEVO*/
					
		}	


////PRUEBA
		

////PRUEBA


/*********************************CATALOGO Y PRECIO CATALOGO EDITADA*/


$this->session->set_flashdata("success","Información Editada");
redirect(base_url()."monedas/list");				
	}

/////////////////////////////////////////////////////////////////////////////////////////GUARDAR SUGERENCIA
/*SECCION PARA SUGERIR CAMBIOS*/


	public function deshabilitar($estado,$id){
		$data = array(
			'estado' => $estado			
		);

		$this->Monedas_model->update_state_moneda($id,$data);
		redirect(base_url()."monedas/list");
	}


	public function delete($estado,$id){
		$data = array(
			'estado' => $estado			
		);

		$this->Monedas_model->delete_state_moneda($id,$data);
		redirect(base_url()."monedas/list");
	}


/*********************AGREGAR, EDITAR, DESHABILITAR Y ELIMINAR*/


public function create()
	{///////////////////////////////////////////////////////////////////CREATE
		     $atributo_id       = $this->input->post("atributo_id");
		     $catalogo          = $this->input->post("catalogo"); 
		     $fuente_imagen     = $this->input->post("fuente_imagen");    

		     
/*INSERTAR USUARIO*/
		    if($this->session->userdata("tipo_usuario")==1 )
		    {
		    	$usuario   = 'Administrador';
		    }

		    $data_usuario = array(
		     'usuario'     => $usuario, 
			);

			$ultimo_id= $this->Monedas_model->add_moneda($data_usuario);
/*INSERTAR USUARIO*/


/*******************************INSERTAR IMAGEN*/

if (!empty($_FILES['imagen']["name"])) {
		$this->load->library("upload");
		$atributo_id_image = $this->input->post("atributo_id_image");


		$config['upload_path']          =  './public/images_monedas';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  0;
		$config['max_width']            =  0;
		$config['max_height']           =  0;


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
					'id_moneda'             => $ultimo_id, 
					'id_atributo'           => $atributo_id_image[$i],
					'atributo_moneda'       => $data['upload_data']['file_name'].','.$fuente_imagen[$i],
				);
				$this->Monedas_model->save_atributes_image($datos);
				
			}
			
		}
		
}


/*******************************INSERTAR IMAGEN*/

/******************************Atributos Normales*/
if (!empty($atributo_id)) {	

	for ($i=0; $i < count($atributo_id); $i++) { 
							$data  = array(
								'id_moneda'            => $ultimo_id, 
								'id_atributo'          => $atributo_id[$i],
								'atributo_moneda'      => $catalogo[$i],
								
							);
							$this->Monedas_model->save_atributes($data);
	}
}
/******************************Atributos Normales*/					



/*********************************PRECIO CATALOGO*/

if (!empty($this->input->post("id_catalogo"))) {	

/*INPUTS NECESARIOS*/
 $id_catalogo            = $this->input->post("id_catalogo");
 $numero_referencia      = $this->input->post("numero_referencia");
 $precio_G               = $this->input->post("precio_G"); 
 $precio_VG              = $this->input->post("precio_VG");   
 $precio_F               = $this->input->post("precio_F"); 
 $precio_VF              = $this->input->post("precio_VF"); 
 $precio_XF              = $this->input->post("precio_XF"); 
 $precio_AU              = $this->input->post("precio_AU"); 
 $precio_UNC             = $this->input->post("precio_UNC");
/*INPUTS NECESARIOS*/

	for ($i=0; $i < count($id_catalogo); $i++) { 	
			$data_catalogo  = array(
							'id_moneda'            => $ultimo_id, 
							'id_atributo'          => $id_catalogo[$i],
							'atributo_moneda'      => $numero_referencia[$i],
							
						);
					$this->Monedas_model->save_atributes_catalogo($data_catalogo);


			/*for ($pr = 0; $pr < 1 ; $pr++) {*/
				$data_precio  = array(
							'id_catalogo'   => $id_catalogo[$i],
							'id_moneda'     => $ultimo_id,
							'G'             => $precio_G[$i],
							'VG'            => $precio_VG[$i],							
							'VF'            => $precio_VF[$i],
							'F'             => $precio_F[$i],
							'XF'            => $precio_XF[$i],
							'AU'            => $precio_AU[$i],
							'UNC'           => $precio_UNC[$i],
				);
					$this->Monedas_model->save_precios_catalogo($data_precio);
				
			/*}*/
						
	}
}	

/*********************************PRECIO CATALOGO*/
$this->session->set_flashdata("success","Información Agregada");
$this->add();   
				
	}

/////////////////////////////////////////////////////////////////////CREATE

////////////////////////////////////////////////////////////////////////////////////EDIT
public function update()
	{
		     $atributo_id       = $this->input->post("atributo_id");
		     $id_unico          = $this->input->post("id_unico");
		     $catalogo          = $this->input->post("catalogo");
		     $fuente_imagen     = $this->input->post("fuente_imagen");
		     /*INPUTS DE AGREGACION*/
			 $atributo_id_add  = $this->input->post("atributo_id_add");
			 $catalogo_add     = $this->input->post("catalogo_add");
			 $fuente_imagen_add     = $this->input->post("fuente_imagen_add");
		    /*INPUTS DE AGREGACION*/  
		     


/*******************************INSERTAR IMAGEN EDITADA*/

if (!empty($_FILES['imagen']["name"])) {
		$this->load->library("upload");
		$atributo_id_image = $this->input->post("atributo_id_image");
		//$id_unico_usuario = $this->input->post("id_unico");


		$config['upload_path']          =  './public/images_monedas';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  0;
		$config['max_width']            =  0;
		$config['max_height']           =  0;


		$variablefile= $_FILES;
		$info = array();
		$files = count($_FILES['imagen']['name']);
		for ($i=0; $i < $files; $i++) { 
			if (!empty($_FILES['imagen']["name"][$i])) {
						$id_atributo                  = $atributo_id_image[$i];
						$id_unico_usuario_unico       = $id_unico[0];
						$_FILES['imagen']['name']     = $variablefile['imagen']['name'][$i];
						$_FILES['imagen']['type']     = $variablefile['imagen']['type'][$i];
						$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
						$_FILES['imagen']['error']    = $variablefile['imagen']['error'][$i];
						$_FILES['imagen']['size']     = $variablefile['imagen']['size'][$i];
						$this->upload->initialize($config);

						if ($this->upload->do_upload('imagen')) {
							$data = array("upload_data" => $this->upload->data());
							$datos = array(
								
								'atributo_moneda'      => $data['upload_data']['file_name'].','.$fuente_imagen[$i],
							);
							$this->Monedas_model->update_atributes_image($id_unico_usuario_unico,$id_atributo,$datos);
							
						}
					}
				
			}


		
}


/*******************************INSERTAR IMAGEN EDITADA*/

/*******************************INSERTAR IMAGEN NUEVOS EN LA EDICION QUE NO ESTABA*/

if (!empty($_FILES['imagen_add']["name"])) {
		$this->load->library("upload");	
		$atributo_id_image = $this->input->post("atributo_id_image_add");	
		//$id_unico  = $this->input->post("id_unico");
		
		$config['upload_path']          =  './public/images_monedas';
		$config['allowed_types']        =  'gif|jpg|png|jpeg';
		$config['max_size']             =  0;
		$config['max_width']            =  0;
		$config['max_height']           =  0;


		$variablefile= $_FILES;
		$info = array();
		$files = count($_FILES['imagen_add']['name']);
		for ($i=0; $i < $files; $i++) { 
			$id_unico_usuario_unico = $id_unico[0];
			$_FILES['imagen_add']['name'] = $variablefile['imagen_add']['name'][$i];
			$_FILES['imagen_add']['type'] = $variablefile['imagen_add']['type'][$i];
			$_FILES['imagen_add']['tmp_name'] = $variablefile['imagen_add']['tmp_name'][$i];
			$_FILES['imagen_add']['error'] = $variablefile['imagen_add']['error'][$i];
			$_FILES['imagen_add']['size'] = $variablefile['imagen_add']['size'][$i];
			$this->upload->initialize($config);

			if ($this->upload->do_upload('imagen_add')) {
				$data = array("upload_data" => $this->upload->data());
				$datos = array(
					'id_moneda'            => $id_unico_usuario_unico, 
					'id_atributo'           => $atributo_id_image[$i],
					'atributo_moneda'      => $data['upload_data']['file_name'].','.$fuente_imagen_add[$i],
				);
				$this->Monedas_model->save_atributes_image($datos);
				
			}
			
		}
		
}


/*******************************INSERTAR IMAGEN NUEVOS EN LA EDICION QUE NO ESTABA*/

/*INSERTAR ATRIBUTO NORMAL EN LA EDICION QUE NO ESTABA*/
if (!empty($atributo_id_add)) {	
	//$id_unico  = $this->input->post("id_unico");
	for ($i=0; $i < count($atributo_id_add); $i++) { 

		if (!empty($catalogo_add[$i])) {
			$id_unico_usuario_unico = $id_unico[0];
			$data  = array(
				'id_moneda'            => $id_unico_usuario_unico, 
				'id_atributo'          => $atributo_id_add[$i],
				'atributo_moneda'      => $catalogo_add[$i],
				
			);
			$this->Monedas_model->save_atributes($data);
		}
	}
}

/*INSERTAR ATRIBUTO NORMAL EN LA EDICION QUE NO ESTABA*/


/******************************Atributos Normales EDITADA*/
if (!empty($atributo_id)) {	

	for ($i=0; $i < count($atributo_id); $i++) {
	$atributo_unico = $id_unico[$i];
	$id_atributo_id = $atributo_id[$i]; 
							$data  = array(
								'atributo_moneda'      => $catalogo[$i],
								
							);
							$this->Monedas_model->update_atributes($atributo_unico,$id_atributo_id,$data);
	}
}
/******************************Atributos Normales EDITADA*/	


/**********************CATALOGO Y PRECIO NO AGREGADO*********************************/
if (!empty($this->input->post("id_catalogo"))) {	

/*INPUTS NECESARIOS*/
 $id_catalogo            = $this->input->post("id_catalogo");
 $numero_referencia      = $this->input->post("numero_referencia"); 
 $precio_G               = $this->input->post("precio_G"); 
 $precio_VG              = $this->input->post("precio_VG");   
 $precio_F               = $this->input->post("precio_F"); 
 $precio_VF              = $this->input->post("precio_VF"); 
 $precio_XF              = $this->input->post("precio_XF"); 
 $precio_AU              = $this->input->post("precio_AU"); 
 $precio_UNC             = $this->input->post("precio_UNC");
 $id_unico  = $this->input->post("id_unico");
/*INPUTS NECESARIOS*/

	for ($i=0; $i < count($id_catalogo); $i++) {
	$id_unico_usuario_unico = $id_unico[0]; 	
			$data_catalogo  = array(
							'id_moneda'            => $id_unico_usuario_unico, 
							'id_atributo'           => $id_catalogo[$i],
							'atributo_moneda'      => $numero_referencia[$i],
							
						);
					$this->Monedas_model->save_atributes_catalogo($data_catalogo);


			/*for ($pr = 0; $pr < 1 ; $pr++) {*/
				$data_precio  = array(
							'id_catalogo'   => $id_catalogo[$i],
							'id_moneda'    => $id_unico_usuario_unico,
							'G'             => $precio_G[$i],
							'VG'            => $precio_VG[$i],							
							'VF'            => $precio_VF[$i],
							'F'             => $precio_F[$i],
							'XF'            => $precio_XF[$i],
							'AU'            => $precio_AU[$i],
							'UNC'           => $precio_UNC[$i],
				);
					$this->Monedas_model->save_precios_catalogo($data_precio);
				
			/*}*/
						
	}
}	
/**********************CATALOGO Y PRECIO NO AGREGADO*********************************/


/*********************************CATALOGO Y PRECIO CATALOGO EDITADA*/

if (!empty($this->input->post("id_unico_catalogo_edit"))) {	

				/*INPUTS NECESARIOS*/
				 $id_unico_catalogo_edit      = $this->input->post("id_unico_catalogo_edit");
				 $id_atributo_edit            = $this->input->post("id_atributo_edit");

				 $numero_referencia_edit      = $this->input->post("numero_referencia_edit"); 
				 $precio_G_edit               = $this->input->post("precio_G_edit");
				 $precio_VG_edit              = $this->input->post("precio_VG_edit");				 
				 $precio_F_edit               = $this->input->post("precio_F_edit"); 
				 $precio_VF_edit              = $this->input->post("precio_VF_edit"); 
				 $precio_XF_edit              = $this->input->post("precio_XF_edit"); 
				 $precio_AU_edit              = $this->input->post("precio_AU_edit"); 
				 $precio_UNC_edit             = $this->input->post("precio_UNC_edit");
				/*INPUTS NECESARIOS*/

					for ($i=0; $i < count($id_atributo_edit); $i++) { 
							$id_unico       = $id_unico_catalogo_edit[0];
							//$id_atributo    =  ;
							$data_catalogo  = array(											
											'atributo_moneda'      => $numero_referencia_edit[$i],
											
										);
									$this->Monedas_model->update_atributes_catalogo($id_unico,$id_atributo_edit[$i],$data_catalogo);
									$this->Monedas_model->delete_precios_catalogo($id_unico,$id_atributo_edit[$i]);


							/*for ($pr = 0; $pr < 1 ; $pr++) {*/
								$data_precio  = array(	
											'id_catalogo'   => $id_atributo_edit[$i],
											'id_moneda'     => $id_unico,
											'G'             => $precio_G_edit[$i],
											'VG'            => $precio_VG_edit[$i],
											'F'             => $precio_F_edit[$i],	
											'VF'            => $precio_VF_edit[$i],											
											'XF'            => $precio_XF_edit[$i],
											'AU'            => $precio_AU_edit[$i],
											'UNC'           => $precio_UNC_edit[$i],
								);
									
									$this->Monedas_model->save_precios_catalogo($data_precio);
								
							/*}*/
										
					}
		}	

/*********************************CATALOGO Y PRECIO CATALOGO EDITADA*/


$this->session->set_flashdata("success","Información Editada");
redirect(base_url()."monedas/list");				
	}

/////////////////////////////////////////////////////////////////////////////////////////EDIT


public function delete_cat($id,$id_atributo_edit)
{
$this->Monedas_model->delete_catalogo($id,$id_atributo_edit);
$this->session->set_flashdata("error","Catalogo Eliminado");
$this->edit($id);
}



/**********SECCION DE LISTADO Y FILTROS********/


public function form_atributo_moneda($id_atributo)
{
	$data = array(
		'opciones_atributo' => $this->Monedas_model->listatributos_opciones($id_atributo),
		'id_atributo' => $id_atributo,

	);
	$this->load->view("monedas/form_atributo_moneda",$data);
}




	public function list()
	{

		if($this->session->userdata("tipo_usuario")==1 ){
						if ($this->input->post("filtros") AND $this->input->post("id_filtro")) {
							$filtros   = $this->input->post("filtros");
							$id_filtro = $this->input->post("id_filtro");
							$data = array(
							'usuarios'          => $this->Monedas_model->listusuarios_filtro($filtros), 
							'filtros'           => $this->input->post("filtros"),
							'id_filtro'         => $this->input->post("id_filtro"),
							'atributos'         => $this->Monedas_model->listatributos(),
							'opciones_atributo' => $this->Monedas_model->listatributos_opciones($id_filtro),

							);
							$this->layout->view("list",$data);

						}else{
							$data = array(
							'atributos'  => $this->Monedas_model->listatributos(),	
							'usuarios'   => $this->Monedas_model->listusuarios(), 
							);
							$this->layout->view("list",$data);
						}

		}else{
						if ($this->input->post("filtros") AND $this->input->post("id_filtro")) {
							$filtros   = $this->input->post("filtros");
							$id_filtro = $this->input->post("id_filtro");
							$data = array(
							'usuarios'          => $this->Monedas_model->listusuarios_filtro_free($filtros), 
							'filtros'           => $this->input->post("filtros"),
							'id_filtro'         => $this->input->post("id_filtro"),
							'atributos'         => $this->Monedas_model->listatributos(),
							'opciones_atributo' => $this->Monedas_model->listatributos_opciones($id_filtro),

							);
							$this->layout->view("list",$data);

						}else{
							$data = array(
							'atributos'  => $this->Monedas_model->listatributos(),	
							'usuarios'   => $this->Monedas_model->listusuarios_free(), 
							);
							$this->layout->view("list",$data);
						}



		}

}
/**********SECCION DE LISTADO Y FILTROS********/

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
		$this->load->view("monedas/modal_moneda",$data);
}



/*VISTAS PARA EL MODAL*/

/*VISTAS DEL POPOVER*/
public function view_popover($id_usuario)
{
	$data  = array(			
			'imagenes'           => $this->Monedas_model->listmonedaimage($id_usuario),
			
		);
		$this->load->view("monedas/popover_moneda",$data);
}

/*VISTAS DEL POPOVER*/
/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_moneda($selectext,$selecvalue)
{	
     $data = array(
		'nombre' => $selectext,
		'value'  => $selecvalue
	);
	$this->load->view("monedas/form_moneda",$data);
}
/*FORMULARIO RENDERIZADO CON AJAX*/	
	
}
