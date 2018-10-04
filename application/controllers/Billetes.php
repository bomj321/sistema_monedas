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
		     $nombre_atributo = $this->input->post("Época");
			 echo $nombre_atributo;
	}		

	

	
	
}
