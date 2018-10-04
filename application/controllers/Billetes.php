<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billetes extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
	{
		     $atributo_id  = $this->input->post("atributo_id");
		     $catalogo     = $this->input->post("catalogo");

		    if($this->session->userdata("tipo_usuario")==1 )
		    {
		    	$usuario   = 'Administrador';
		    }

		    $data_usuario = array(
		     'usuario'     => $usuario, 
			);

			$ultimo_id= $this->Billetes_model->add_moneda($data_usuario);

		    for ($i=0; $i < count($atributo_id); $i++) { 
						$data  = array(
							'id_billete'            => $ultimo_id, 
							'id_atributo'           => $atributo_id[$i],
							'atributo_billete'      => $catalogo[$i],
							
						);
						$this->Billetes_model->save_atributes($data);
					}
			}
	
}
