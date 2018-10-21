<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collectionb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Billetes_model");
		$this->load->model("Collectionb_model");
		
	}

	public function add_collection($id_billete)
	{
		$data = [
		    'id_billete' => $id_billete
		];

		$this->layout->view("add",$data);
	}

	public function list()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'billetes' => $this->Collectionb_model->list($id_usuario_session)
		];

		$this->layout->view("list",$data);

	}

public function create()
{	    $id_usuario               = $this->input->post("id_usuario");
	    $id_billete               = $this->input->post("id_billete");
	    $condicion_billete        = $this->input->post("condicion_billete");
		$casa_certificadora       = $this->input->post("casa_certificadora");
		$valor_certificacion      = $this->input->post("valor_certificacion");
		$registro_certificacion   = $this->input->post("registro_certificacion");
		$tipo_registro            = $this->input->post("tipo_registro");
		$tipo_registro_billete    = $this->input->post("tipo_registro_billete");
		$precio_billete           = $this->input->post("precio_billete");
		$serie_billete            = $this->input->post("serie_billete");
		$subserie                 = $this->input->post("subserie");		
		$precio_referencia        = $this->input->post("precio_referencia");
		$lugar_billete            = $this->input->post("lugar_billete"); //INPUT PARA USUARIOS PAGOS
		$cantidad_billete         = $this->input->post("cantidad_billete");
		$descripcion_billete      = $this->input->post("descripcion_billete");


		if ($tipo_registro =='Personal') {
			$mercado      = '0';

		}elseif($tipo_registro =='Busco'){
			$mercado      = '2';
		}else {
			$mercado      = '1';
		}
		

		$this->form_validation->set_rules("condicion_billete","Condicion del Billete","required");
		$this->form_validation->set_rules("casa_certificadora","Casa Certificadora","required");
		$this->form_validation->set_rules("valor_certificacion","Valor de la Certificadora","required");
		$this->form_validation->set_rules("registro_certificacion","Numero de Registro","required");
		$this->form_validation->set_rules("tipo_registro","Tipo de Registro","required");
	/*	if (!empty($tipo_registro)) {
			$this->form_validation->set_rules("precio_billete","Precio del Billete","required");
		 }*/
		$this->form_validation->set_rules("serie_billete","Serie del Billete","required");
		$this->form_validation->set_rules("precio_referencia","Precio de Referencia","required");
		$this->form_validation->set_rules("lugar_billete","Lugar del Billete","required");
		/*SECCION DE USUARIOS PAGOS*/
		/*if (!empty($cantidad_billete)) {
			$this->form_validation->set_rules("cantidad_billete","Cantidad que posee","required");			
		}*/
		/*SECCION DE USUARIOS PAGOS*/
		$this->form_validation->set_rules("descripcion_billete","Descripcion","required");

		if ($this->form_validation->run()) {
			$data = array(
				'id_usuario'               => $id_usuario,
				'id_billete'               => $id_billete,
				'condicion_billete'        => $condicion_billete, 
				'casa_certificadora'       => $casa_certificadora,
				'valor_certificacion'      => $valor_certificacion,
				'registro_certificacion'   => $registro_certificacion, 
				'tipo_registro'            => $tipo_registro,
				'tipo_billete_registro'    => $tipo_registro_billete,
				'precio_billete'           => $precio_billete,
				'mercado'                  => $mercado,
				'serie_billete'            => $serie_billete, 
				'subserie'                 => $subserie,
				'precio_referencia'        => $precio_referencia,
				'lugar_billete'            => $lugar_billete,
				'cantidad_billete'         => $cantidad_billete, 
				'descripcion_billete'      => $descripcion_billete,
			);

			if ($this->Collectionb_model->save($data)) 
			{
				/*VARIANTES DE LA MISMA MONEDA*/
		 
	if (!empty($cantidad_billete) || $cantidad_billete!= 0) {
	

				    for ($i = 0; $i < intval($cantidad_billete); $i++) {/////////////// FOR

				    	$tipo_registro_billete_add_type      = $this->input->post("tipo_registro_billete_add_type_$i");
				    	$condicion_billete_add               = $this->input->post("condicion_billete_add_$i");
				    	$serie_billete_add                   = $this->input->post("serie_billete_add_$i");
				    	$subserie_billete_add                = $this->input->post("subserie_billete_add_$i");
				    	$numero_billete_add                  = $this->input->post("numero_billete_add_$i");
                        /*IMAGENES*/
				    	$foto_frente                         = $this->input->post("foto_frente_$i");
				    	$foto_detras                         = $this->input->post("foto_detras_$i");
                        /*IMAGENES*/
				    	$tipo_registro_billete_add           = $this->input->post("tipo_registro_billete_add_$i");				    
					    $precio_billete_add                  = $this->input->post("precio_billete_add_$i");


					    if ($tipo_registro_billete_add == 'Personal') {
							$mercado_add      = '0';

						}elseif($tipo_registro_billete_add == 'Venta' || $tipo_registro_billete_add == 'Intercambio'){
							$mercado_add      = '1';
						}

					    /*CODIGO PARA SUBIR LA FOTO*/
					    $config['upload_path']          =  './public/images_billetes';
						$config['allowed_types']        =  'gif|jpg|png|jpeg';
						$config['max_size']             =  100000;
						$config['max_width']            =  2000;
						$config['max_height']           =  2000;
						
						$this->load->library('upload', $config);


						if (!$this->upload->do_upload('foto_frente_'.$i)) {
							echo $this->upload->display_errors();
						}

						if (!$this->upload->do_upload('foto_detras_'.$i)) {
							echo $this->upload->display_errors();
						}

						$imagen_1 = array("upload_data" => $this->upload->data());
						//$this->upload->do_upload('foto_detras_0');
						$imagen_2 = array("upload_data" => $this->upload->data());
						/*CODIGO PARA SUBIR LA FOTO*/
							
						     
						/*CODIGO PARA SUBIR*/
						$data = array(
								'id_usuario'               => $id_usuario,
								'id_billete'               => $id_billete,
								'condicion_billete'        => $condicion_billete_add, 
								'casa_certificadora'       => $casa_certificadora,
								'valor_certificacion'      => $valor_certificacion,
								'registro_certificacion'   => $registro_certificacion, 
								'tipo_registro'            => $tipo_registro_billete_add,
								'tipo_billete_registro'    => $tipo_registro_billete_add_type,
								'foto_frente_billete'      => $imagen_1['upload_data']['file_name'],
								'foto_detras_billete'      => $imagen_2['upload_data']['file_name'],
								'precio_billete'           => $precio_billete_add,
								'mercado'                  => $mercado_add,
								'serie_billete'            => $serie_billete_add,
								'numero_billete_add'       => $numero_billete_add,
								'subserie'                 => $subserie_billete_add, 
								'lugar_billete'            => $lugar_billete,
								//'cantidad_billete'       => $cantidad_billete, 
								'descripcion_billete'      => $descripcion_billete,
							);
						/*CODIGO PARA SUBIR*/
						$this->Collectionb_model->save_billetes_variantes($data);

				    }/////////////// FOR

				 
	}

		/*VARIANTES DE LA MISMA MONEDA*/	




				//$this->list($id_usuario);
			}else
			{
				$this->session->set_flashdata("error_add","No se pudo guardar la informacion");
				$this->add_collection($id_billete);
			}


		}else{
			$this->session->set_flashdata("error_add","No paso la Validación, intentalo de nuevo");
			$this->add_collection($id_billete);
		}
	  redirect(base_url()."collectionb/list");	
}		

/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_billete()
{	    
	$this->load->view("collectionb/form_billete");
}
/*FORMULARIO RENDERIZADO CON AJAX*/		
/*MODAL AGREGADO*/
public function view($id_usuario,$id_billete)
{
	$data  = array(
			'coleccionesbp'   => $this->Collectionb_model->get_collectionbp($id_usuario,$id_billete), 
			'coleccionesba'   => $this->Collectionb_model->get_collectionba($id_usuario,$id_billete),			
		);
		$this->load->view("collectionb/modal_billete",$data);
}	
/*MODAL AGREGADO*/	

/*CANTIDAD RENDERIZADO CON AJAX*/
public function form_billete_cantidad($selectvalue)
{	    
	$data  = array(
			'repeticiones'   => $selectvalue, 			
		);

	$this->load->view("collectionb/form_billete_cantidad",$data);
}
/*CANTIDAD RENDERIZADO CON AJAX*/		

public function form_billete_add($contador)
{	    
	$data = [
	    'contador' => $contador,
	];
	$this->load->view("collectionb/form_billete_add",$data);
}
/*CANTIDAD RENDERIZADO CON AJAX*/		

	
/*EDICION DE LAS COLECCIONES*/
public function editp($id_billete)
{
	$data = [
		    'billete' => $this->Collectionb_model->editp($id_billete)
		];
	$this->layout->view("editp",$data);	
}

public function editp_billete()
{
	    $id_billete                         = $this->input->post("id_coleccion_personal_billete");
	    $condicion_billete        			= $this->input->post("condicion_billete");
		$casa_certificadora      			= $this->input->post("casa_certificadora");
		$valor_certificacion     			= $this->input->post("valor_certificacion");
		$registro_certificacion  		    = $this->input->post("registro_certificacion");
		$tipo_registro           		    = $this->input->post("tipo_registro");
		$precio_billete          		    = $this->input->post("precio_billete");
		$mercado          		            = $this->input->post("mercado");
		$serie_billete            			= $this->input->post("serie_billete");
		$subserie                 			= $this->input->post("subserie");		
		$precio_referencia        			= $this->input->post("precio_referencia");
		$lugar_billete            			= $this->input->post("lugar_billete"); //INPUT PARA USUARIOS PAGOS
		$cantidad_billete         			= $this->input->post("cantidad_billete");
		$descripcion_billete      			= $this->input->post("descripcion_billete");


		$this->form_validation->set_rules("condicion_billete","Condicion del Billete","required");
		$this->form_validation->set_rules("casa_certificadora","Casa Certificadora","required");
		$this->form_validation->set_rules("valor_certificacion","Valor de la Certificadora","required");
		$this->form_validation->set_rules("registro_certificacion","Numero de Registro","required");
		$this->form_validation->set_rules("tipo_registro","Tipo de Registro","required");
		$this->form_validation->set_rules("mercado","Ingreso al Mercado","required");		 
		$this->form_validation->set_rules("serie_billete","Serie del Billete","required");
		$this->form_validation->set_rules("subserie","Subserie del Billete","required");
		$this->form_validation->set_rules("precio_referencia","Precio de Referencia","required");
		$this->form_validation->set_rules("lugar_billete","Lugar del Billete","required");
		/*SECCION DE USUARIOS PAGOS*/
		$this->form_validation->set_rules("cantidad_billete","Cantidad que posee","required");			
		
		/*SECCION DE USUARIOS PAGOS*/
		$this->form_validation->set_rules("descripcion_billete","Descripcion","required");

		if ($this->form_validation->run()) {

				$data = array(
				'condicion_billete'        => $condicion_billete, 
				'casa_certificadora'       => $casa_certificadora,
				'valor_certificacion'      => $valor_certificacion,
				'registro_certificacion'   => $registro_certificacion, 
				'tipo_registro'            => $tipo_registro,
				'precio_billete'           => $precio_billete,
				'mercado'                  => $mercado,
				'serie_billete'            => $serie_billete, 
				'subserie'                 => $subserie,
				'precio_referencia'        => $precio_referencia,
				'lugar_billete'            => $lugar_billete,
				'cantidad_billete'         => $cantidad_billete, 
				'descripcion_billete'      => $descripcion_billete,
			);
				$this->Collectionb_model->updatep($id_billete,$data);
				redirect(base_url()."collectionb/list");

		}else{
			$this->session->set_flashdata("error_edit","No paso la Validación, intentalo de nuevo");
			$this->editp($id_billete);
			
		}
}


public function edita($id_billete)
{
	$data = [
		    'billete' => $this->Collectionb_model->edita($id_billete)
		];
	$this->layout->view("edita",$data);	
}

public function edita_billete()
{
	    $id_billete                         = $this->input->post("id_coleccion_personal_billete");
	    $condicion_billete        			= $this->input->post("condicion_billete");
		$casa_certificadora      			= $this->input->post("casa_certificadora");
		$valor_certificacion     			= $this->input->post("valor_certificacion");
		$registro_certificacion  		    = $this->input->post("registro_certificacion");
		$tipo_registro           		    = $this->input->post("tipo_registro");
		$precio_billete          		    = $this->input->post("precio_billete");
		$mercado          		            = $this->input->post("mercado");
		$serie_billete            			= $this->input->post("serie_billete");
		$subserie                 			= $this->input->post("subserie");
		$numero_billete_add                 = $this->input->post("numero_billete_add");		
		$lugar_billete            			= $this->input->post("lugar_billete"); //INPUT PARA USUARIOS PAGOS
		$descripcion_billete      			= $this->input->post("descripcion_billete");


		$this->form_validation->set_rules("condicion_billete","Condicion del Billete","required");
		$this->form_validation->set_rules("casa_certificadora","Casa Certificadora","required");
		$this->form_validation->set_rules("valor_certificacion","Valor de la Certificadora","required");
		$this->form_validation->set_rules("registro_certificacion","Numero de Registro","required");
		$this->form_validation->set_rules("tipo_registro","Tipo de Registro","required");
		$this->form_validation->set_rules("mercado","Ingreso al Mercado","required");		 
		$this->form_validation->set_rules("serie_billete","Serie del Billete","required");
		$this->form_validation->set_rules("subserie","Subserie del Billete","required");
		$this->form_validation->set_rules("lugar_billete","Lugar del Billete","required");
		/*SECCION DE USUARIOS PAGOS*/
		
		/*SECCION DE USUARIOS PAGOS*/
		$this->form_validation->set_rules("descripcion_billete","Descripcion","required");

		if ($this->form_validation->run()) {

				$data = array(
				'condicion_billete'        => $condicion_billete, 
				'casa_certificadora'       => $casa_certificadora,
				'valor_certificacion'      => $valor_certificacion,
				'registro_certificacion'   => $registro_certificacion, 
				'tipo_registro'            => $tipo_registro,
				'precio_billete'           => $precio_billete,
				'mercado'                  => $mercado,
				'serie_billete'            => $serie_billete, 
				'subserie'                 => $subserie,
				'numero_billete_add'       => $numero_billete_add,
				'lugar_billete'            => $lugar_billete,
				'descripcion_billete'      => $descripcion_billete,
			);
				$this->Collectionb_model->updatep($id_billete,$data);
				redirect(base_url()."collectionb/list");

		}else{
			$this->session->set_flashdata("error_edit","No paso la Validación, intentalo de nuevo");
			$this->editp($id_billete);
			
		}
}



/*EDICION DE LAS COLECCIONES*/
}



