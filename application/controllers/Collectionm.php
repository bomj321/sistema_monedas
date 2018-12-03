<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collectionm extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Monedas_model");
		$this->load->model("Collectionm_model");
		
	}

	public function add_collection($id_moneda)
	{
		$data = [
		    'id_moneda' => $id_moneda
		];

		$this->layout->view("add",$data);
	}

	public function list()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'monedas' => $this->Collectionm_model->list($id_usuario_session)
		];

		$this->layout->view("list",$data);

	}

public function create()
{	    $id_usuario                       = $this->input->post("id_usuario");
	    $id_moneda                        = $this->input->post("id_moneda");
	    $condicion_moneda                 = $this->input->post("condicion_moneda");
		$casa_certificadora               = $this->input->post("casa_certificadora");
		$valor_certificacion              = $this->input->post("valor_certificacion");
		$registro_certificacion           = $this->input->post("registro_certificacion");
		/*IMAGENES*/
		$foto_frente                      = $this->input->post("foto_frente");
		$foto_detras                      = $this->input->post("foto_detras");
        /*IMAGENES*/
		$tipo_registro                    = $this->input->post("tipo_registro");
		$tipo_registro_moneda             = $this->input->post("tipo_registro_moneda");
		$precio_moneda                    = $this->input->post("precio_moneda");		
		$precio_referencia                = $this->input->post("precio_referencia");
		$lugar_moneda                     = $this->input->post("lugar_moneda"); //INPUT PARA USUARIOS PAGOS
		$cantidad_moneda                  = $this->input->post("cantidad_moneda");
		$descripcion_moneda               = $this->input->post("descripcion_moneda");
		$descripcion_moneda_privada       = $this->input->post("descripcion_moneda_privada");


		if ($tipo_registro =='Personal') {
			$mercado      = '0';

		}elseif($tipo_registro =='Busco'){
			$mercado      = '2';
		}else {
			$mercado      = '1';
		}
		

	  /*CODIGO PARA SUBIR LA FOTO*/
					    $config['upload_path']          =  './public/images_monedas';
						$config['allowed_types']        =  'gif|jpg|png|jpeg';
						$config['max_size']             =  100000;
						$config['max_width']            =  2000;
						$config['max_height']           =  2000;
						
						$this->load->library('upload', $config);


						if (!$this->upload->do_upload('foto_frente')) {
							echo $this->upload->display_errors();
						}

						if (!$this->upload->do_upload('foto_detras')) {
							echo $this->upload->display_errors();
						}

	 /*CODIGO PARA SUBIR LA FOTO*/

			$data = array(
				'id_usuario'                       => $id_usuario,
				'id_moneda'                        => $id_moneda,
				'condicion_moneda'                 => $condicion_moneda, 
				'casa_certificadora'               => $casa_certificadora,
				'valor_certificacion'              => $valor_certificacion,
				'registro_certificacion'           => $registro_certificacion, 
				'tipo_registro'                    => $tipo_registro,
				'tipo_moneda_registro'             => $tipo_registro_moneda,
				'foto_frente_moneda'               => $_FILES["foto_frente"]["name"],
				'foto_detras_moneda'               => $_FILES["foto_detras"]["name"],
				'precio_moneda'                    => $precio_moneda,
				'mercado'                          => $mercado,
				'precio_referencia'                => $precio_referencia,
				'lugar_moneda'                     => $lugar_moneda,
				'cantidad_moneda'                  => $cantidad_moneda, 
				'descripcion_moneda'               => $descripcion_moneda,
				'descripcion_moneda_privada'       => $descripcion_moneda_privada,
			);

			if ($this->Collectionm_model->save($data)) 
			{
				/*VARIANTES DE LA MISMA MONEDA*/
		 
	if (!empty($cantidad_moneda) || $cantidad_moneda!= 0) {
	

				    for ($i = 0; $i < intval($cantidad_moneda); $i++) {/////////////// FOR

				    	$tipo_registro_moneda_add_type      = $this->input->post("tipo_registro_moneda_add_type_$i");
				    	$condicion_moneda_add               = $this->input->post("condicion_moneda_add_$i");
				    	$casa_certificadora_add             = $this->input->post("casa_certificadora_add_$i");	
				    	$valor_certificacion_add            = $this->input->post("valor_certificacion_add_$i");
		                $registro_certificacion_add         = $this->input->post("registro_certificacion_add_$i");			    	
				    	$numero_moneda_add                  = $this->input->post("numero_moneda_add_$i");
                        /*IMAGENES*/
				    	$foto_frente                        = $this->input->post("foto_frente_$i");
				    	$foto_detras                        = $this->input->post("foto_detras_$i");
                        /*IMAGENES*/
				    	$tipo_registro_moneda_add           = $this->input->post("tipo_registro_moneda_add_$i");				    
					    $precio_moneda_add                  = $this->input->post("precio_moneda_add_$i");
					    $descripcion_moneda_add             = $this->input->post("descripcion_moneda_add_$i");
		                $descripcion_moneda_privada_add     = $this->input->post("descripcion_moneda_privada_add__$i");


					    if ($tipo_registro_moneda_add == 'Personal') {
							$mercado_add      = '0';

						}elseif($tipo_registro_moneda_add == 'Venta' || $tipo_registro_moneda_add == 'Intercambio'){
							$mercado_add      = '1';
						}

					    /*CODIGO PARA SUBIR LA FOTO*/
					    $config['upload_path']          =  './public/images_monedas';
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
					
						/*CODIGO PARA SUBIR LA FOTO*/
							
						     
						/*CODIGO PARA SUBIR*/
						$data = array(
								'id_usuario'                       => $id_usuario,
								'id_moneda'                        => $id_moneda,
								'condicion_moneda'                 => $condicion_moneda_add, 
								'casa_certificadora'               => $casa_certificadora_add,
								'valor_certificacion'              => $valor_certificacion_add,
								'registro_certificacion'           => $registro_certificacion_add, 
								'tipo_registro'                    => $tipo_registro_moneda_add,
								'tipo_moneda_registro'             => $tipo_registro_moneda_add_type,
								'foto_frente_moneda'               => $_FILES["foto_frente_$i"]["name"],
								'foto_detras_moneda'               => $_FILES["foto_detras_$i"]["name"],
								'precio_moneda'                    => $precio_moneda_add,
								'mercado'                          => $mercado_add,
								'serie_moneda'                     => $serie_moneda_add,
								'numero_moneda_add'                => $numero_moneda_add,
								'subserie'                         => $subserie_moneda_add, 
								'lugar_moneda'                     => $lugar_moneda,
								//'cantidad_moneda'        => $cantidad_moneda, 
								'descripcion_moneda'               => $descripcion_moneda_add,
								'descripcion_moneda_privada'       => $descripcion_moneda_privada_add,
							);
						/*CODIGO PARA SUBIR*/
						$this->Collectionm_model->save_monedas_variantes($data);

				    }/////////////// FOR

				 
	}

		/*VARIANTES DE LA MISMA MONEDA*/	




				//$this->list($id_usuario);
			}else
			{
				$this->session->set_flashdata("error_add","No se pudo guardar la informacion");
				$this->add_collection($id_moneda);
			}
	
	  redirect(base_url()."collectionm/list");	
}		

/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_moneda()
{	    
	$this->load->view("collectionm/form_moneda");
}
/*FORMULARIO RENDERIZADO CON AJAX*/		

/*MODAL AGREGADO*/
public function view($id_usuario,$id_moneda)
{
	$data  = array(
			'coleccionesmp'   => $this->Collectionm_model->get_collectionmp($id_usuario,$id_moneda), 
			'coleccionesma'   => $this->Collectionm_model->get_collectionma($id_usuario,$id_moneda),			
		);
		$this->load->view("collectionm/modal_moneda",$data);
}	
/*MODAL AGREGADO*/	

/*CANTIDAD RENDERIZADO CON AJAX*/
public function form_moneda_cantidad($selectvalue)
{	    
	$data  = array(
			'repeticiones'   => $selectvalue, 			
		);

	$this->load->view("collectionm/form_moneda_cantidad",$data);
}
/*CANTIDAD RENDERIZADO CON AJAX*/		

public function form_moneda_add($contador)
{	    
	$data = [
	    'contador' => $contador,
	];
	$this->load->view("collectionm/form_moneda_add",$data);
}
/*CANTIDAD RENDERIZADO CON AJAX*/		

	
/*EDICION DE LAS COLECCIONES*/
public function editp($id_moneda)
{
	$data = [
		    'moneda' => $this->Collectionm_model->editp($id_moneda)
		];
	$this->layout->view("editp",$data);	
}

public function editp_moneda()
{
	    $id_moneda                          = $this->input->post("id_coleccion_personal_moneda");
	    $condicion_moneda        			= $this->input->post("condicion_moneda");
		$casa_certificadora      			= $this->input->post("casa_certificadora");
		$valor_certificacion     			= $this->input->post("valor_certificacion");
		$registro_certificacion  		    = $this->input->post("registro_certificacion");
		/*IMAGENES*/
		$foto_frente                        = $this->input->post("foto_frente");
		$foto_detras                        = $this->input->post("foto_detras");
        /*IMAGENES*/
		$tipo_registro           		    = $this->input->post("tipo_registro");
		$precio_moneda          		    = $this->input->post("precio_moneda");
		$mercado          		            = $this->input->post("mercado");	
		$precio_referencia        			= $this->input->post("precio_referencia");
		$lugar_moneda            			= $this->input->post("lugar_moneda"); //INPUT PARA USUARIOS PAGOS
		$cantidad_moneda         			= $this->input->post("cantidad_moneda");
		$descripcion_moneda      			= $this->input->post("descripcion_moneda");
		$descripcion_moneda_privada         = $this->input->post("descripcion_moneda_privada");

	 /*CODIGO PARA SUBIR LA FOTO*/
					    $config['upload_path']          =  './public/images_monedas';
						$config['allowed_types']        =  'gif|jpg|png|jpeg';
						$config['max_size']             =  100000;
						$config['max_width']            =  2000;
						$config['max_height']           =  2000;
						
						$this->load->library('upload', $config);


						if (!$this->upload->do_upload('foto_frente')) {
							echo $this->upload->display_errors();
						}

						if (!$this->upload->do_upload('foto_detras')) {
							echo $this->upload->display_errors();
						}

	 /*CODIGO PARA SUBIR LA FOTO*/



		if ($this->form_validation->run()) {

				$data = array(
				'condicion_moneda'                 => $condicion_moneda, 
				'casa_certificadora'               => $casa_certificadora,
				'valor_certificacion'              => $valor_certificacion,
				'registro_certificacion'           => $registro_certificacion, 
				'tipo_registro'                    => $tipo_registro,
				'foto_frente_moneda'               => $_FILES["foto_frente"]["name"],
				'foto_detras_moneda'               => $_FILES["foto_detras"]["name"],
				'precio_moneda'                    => $precio_moneda,
				'mercado'                          => $mercado,
				'precio_referencia'                => $precio_referencia,
				'lugar_moneda'                     => $lugar_moneda,
				'cantidad_moneda'                  => $cantidad_moneda, 
				'descripcion_moneda'               => $descripcion_moneda,
				'descripcion_moneda_privada'       => $descripcion_moneda_privada,
			);
				$this->Collectionm_model->updatep($id_moneda,$data);
				redirect(base_url()."collectionm/list");

		}else{
			$this->session->set_flashdata("error_edit","No paso la Validación, intentalo de nuevo");
			$this->editp($id_moneda);
			
		}
}


public function edita($id_moneda)
{
	$data = [
		    'moneda' => $this->Collectionm_model->edita($id_moneda)
		];
	$this->layout->view("edita",$data);	
}



public function edita_moneda()
{
	    $id_moneda                          = $this->input->post("id_coleccion_personal_moneda");
	    $condicion_moneda        			= $this->input->post("condicion_moneda");
		$casa_certificadora      			= $this->input->post("casa_certificadora");
		$valor_certificacion     			= $this->input->post("valor_certificacion");
		$registro_certificacion  		    = $this->input->post("registro_certificacion");
		$tipo_registro           		    = $this->input->post("tipo_registro");
		$precio_moneda          		    = $this->input->post("precio_moneda");
		$mercado          		            = $this->input->post("mercado");
		$numero_moneda_add                  = $this->input->post("numero_moneda_add");	
		$foto_frente                        = $this->input->post("foto_frente");	
		$foto_detras                        = $this->input->post("foto_detras");		
		$lugar_moneda            			= $this->input->post("lugar_moneda");
		$descripcion_moneda      			= $this->input->post("descripcion_moneda");
		$descripcion_moneda_privada     	= $this->input->post("descripcion_moneda_privada");


		  /*CODIGO PARA SUBIR LA FOTO*/
		   	if (!empty($_FILES['foto_frente']["name"])) {


					    $config['upload_path']          =  './public/images_monedas';
						$config['allowed_types']        =  'gif|jpg|png|jpeg';
						$config['max_size']             =  100000;
						$config['max_width']            =  2000;
						$config['max_height']           =  2000;
						
						
						$this->load->library('upload', $config);
						$this->upload->do_upload('foto_frente');

						$imagen_1 = array("upload_data" => $this->upload->data());
						$data_frente = [
						    'foto_frente_moneda' => $imagen_1['upload_data']['file_name']
						];
						$this->Collectionm_model->updatea_frente($id_moneda,$data_frente);

						//$this->upload->do_upload('foto_detras_0');

			}	
			
				if (!empty($_FILES['foto_detras']["name"])) {


					    $config['upload_path']          =  './public/images_monedas';
						$config['allowed_types']        =  'gif|jpg|png|jpeg';
						$config['max_size']             =  100000;
						$config['max_width']            =  2000;
						$config['max_height']           =  2000;
						
						$this->load->library('upload', $config);
						$this->upload->do_upload('foto_detras');
						//$this->upload->do_upload('foto_detras_0');
						$imagen_2 = array("upload_data" => $this->upload->data());
						$data_detras = [
						    'foto_detras_moneda' => $imagen_2['upload_data']['file_name']
						];
						$this->Collectionm_model->updatea_detras($id_moneda,$data_detras);


			}	
		/*CODIGO PARA SUBIR LA FOTO*/


	/*	$this->form_validation->set_rules("condicion_moneda","Condicion del Moneda","required");
		$this->form_validation->set_rules("casa_certificadora","Casa Certificadora","required");
		$this->form_validation->set_rules("valor_certificacion","Valor de la Certificadora","required");
		$this->form_validation->set_rules("registro_certificacion","Numero de Registro","required");
		$this->form_validation->set_rules("tipo_registro","Tipo de Registro","required");
		$this->form_validation->set_rules("mercado","Ingreso al Mercado","required");
		$this->form_validation->set_rules("lugar_moneda","Lugar del Moneda","required");*/
		/*SECCION DE USUARIOS PAGOS*/
		
		/*SECCION DE USUARIOS PAGOS*/
		/*$this->form_validation->set_rules("descripcion_moneda","Descripcion","required");*/

		if ($this->form_validation->run()) {

				$data = array(
				'condicion_moneda'                 => $condicion_moneda, 
				'casa_certificadora'               => $casa_certificadora,
				'valor_certificacion'              => $valor_certificacion,
				'registro_certificacion'           => $registro_certificacion, 
				'tipo_registro'                    => $tipo_registro,
				'precio_moneda'                    => $precio_moneda,
				'mercado'                          => $mercado,
				'numero_moneda_add'                => $numero_moneda_add,
				'lugar_moneda'                     => $lugar_moneda,
				'descripcion_moneda'               => $descripcion_moneda,
				'descripcion_moneda_privada'       => $descripcion_moneda_privada,

			);
				$this->Collectionm_model->updatea($id_moneda,$data);
				redirect(base_url()."collectionm/list");

		}else{
			$this->session->set_flashdata("error_edit","No paso la Validación, intentalo de nuevo");
			$this->editp($id_moneda);
			
		}
}



/*EDICION DE LAS COLECCIONES*/
}



