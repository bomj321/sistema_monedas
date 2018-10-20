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
		$precio_billete           = $this->input->post("precio_billete");
		$serie_billete            = $this->input->post("serie_billete");		
		$precio_referencia        = $this->input->post("precio_referencia");
		$lugar_billete            = $this->input->post("lugar_billete"); //INPUT PARA USUARIOS PAGOS
		$cantidad_billete         = $this->input->post("cantidad_billete");
		$descripcion_billete      = $this->input->post("descripcion_billete");


		/*VARIANTES DE LA MISMA MONEDA*/
		 
if (!empty($cantidad_billete) AND $cantidad_billete!= 0) {
	

		    for ($i = 0; $i < intval($cantidad_billete); $i++) {

		    	$tipo_registro_billete_add           = $this->input->post("tipo_registro_billete_add_$i");

		    	$condicion_billete_add               = $this->input->post("condicion_billete_add_$i");
		    	$serie_billete_add                   = $this->input->post("serie_billete_add_$i");
		    	$subserie_billete_add                = $this->input->post("subserie_billete_add_$i");
		    	$numero_billete_add                  = $this->input->post("numero_billete_add_$i");
		    	$foto_frente                         = $this->input->post("foto_frente_$i");
		    	$foto_detras                         = $this->input->post("foto_detras_$i");
		    	$tipo_registro_add                   = $this->input->post("tipo_registro_add_$i");



		    
			    $precio_billete_add                  = $this->input->post("precio_billete_add_$i");




			    echo $tipo_registro_billete_add. '<br>';

			    echo $condicion_billete_add. '<br>';
			    echo $serie_billete_add. '<br>';
			    echo $subserie_billete_add. '<br>';
			    echo $numero_billete_add. '<br>';
			    echo $foto_frente. '<br>';
			    echo $foto_detras. '<br>';
			    echo $tipo_registro_add. '<br>';		
			    



		        echo $precio_billete_add. '<br><br><br><br><br>';  

		    }
}

		/*VARIANTES DE LA MISMA MONEDA*/	


	/*	if ($tipo_registro =='Personal') {
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
		if (!empty($cantidad_billete)) {
			$this->form_validation->set_rules("precio_billete","Precio del Billete","required");
		 }
		$this->form_validation->set_rules("serie_billete","Serie del Billete","required");
		//$this->form_validation->set_rules("precio_referencia","Precio de Referencia","required");
		$this->form_validation->set_rules("lugar_billete","Lugar del Billete","required");
		/*SECCION DE USUARIOS PAGOS*/
		/*if (!empty($cantidad_billete)) {
			$this->form_validation->set_rules("cantidad_billete","Cantidad que posee","required");			
		}
		/*SECCION DE USUARIOS PAGOS*/
		/*$this->form_validation->set_rules("descripcion_billete","Descripcion","required");

		if ($this->form_validation->run()) {
			$data = array(
				'id_usuario'               => $id_usuario,
				'id_billete'               => $id_billete,
				'condicion_billete'        => $condicion_billete, 
				'casa_certificadora'       => $casa_certificadora,
				'valor_certificacion'      => $valor_certificacion,
				'registro_certificacion'   => $registro_certificacion, 
				'tipo_registro'            => $tipo_registro,
				'precio_billete'           => $precio_billete,
				'mercado'                  => $mercado,
				'serie_billete'            => $serie_billete, 
				'precio_referencia'        => $precio_referencia,
				'lugar_billete'            => $lugar_billete,
				'cantidad_billete'         => $cantidad_billete, 
				'descripcion_billete'      => $descripcion_billete,
			);

			if ($this->Collectionb_model->save($data)) 
			{
				$this->list($id_usuario);
			}else
			{
				$this->session->set_flashdata("error_add","No se pudo guardar la informacion");
				$this->add_collection($id_billete);
			}


		}else{
			$this->session->set_flashdata("error_add","No paso la Validación, intentalo de nuevo");
			$this->add_collection($id_billete);
		}*/
}		

/*FORMULARIO RENDERIZADO CON AJAX*/
public function form_billete()
{	    
	$this->load->view("collectionb/form_billete");
}
/*FORMULARIO RENDERIZADO CON AJAX*/		
/*MODAL AGREGADO*/
public function view($id_coleccion)
{
	$data  = array(
			'coleccionesb'   => $this->Collectionb_model->get_collectionb($id_coleccion), 			
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

	


}



