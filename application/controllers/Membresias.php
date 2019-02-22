<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membresias extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//VERIFICAR SI EXISTE LA SESION
		if (!$this->session->userdata("login")) {
					redirect(base_url());
				}
				
		//VERIFICAR SI EXISTE LA SESION
		
		$this->load->model("Membresias_model");
	    $this->load->model("Usuarios_model");
	}

	public function list()
	{
		$data = [
		    'membresias' => $this->Membresias_model->list()
		];

		$this->layout->view("list",$data);

	}

public function inf()
	{
		$id_usuario_session = $this->session->userdata("id");
		$data = [
		    'membresia' => $this->Membresias_model->get_membresia($id_usuario_session)
		];

		$this->layout->view("inf",$data);

	}



	public function publicidad($estado_publicidad)
	{
		$id_usuario_session = $this->session->userdata("id");
		$publicidad         = $estado_publicidad;
		$data = [
		    'publicidad'   => $publicidad
		];

		$this->Membresias_model->update_publicidad($id_usuario_session,$data);
		redirect(base_url()."membresias/inf");

	}

/*******************SECCION DE ADMINISTRADORES******************/

/*LISTADO DE ADMINISTRADORES*/	
	public function list_users_admins()
	{
		$data = [
		    'administradores' => $this->Membresias_model->list_admin()
		];

		$this->layout->view("admins",$data);
	}
/*LISTADO DE ADMINISTRADORES*/


/*AGREGAR ADMINISTRADORES*/	
	public function add_admin()
	{
		
		$this->layout->view("add_admin");
	}

	public function add_admin_nuevo()
	{
		
			/*CODIGO DEL REGISTRO*/
					$nombre_registro              = $this->input->post("nombre_registro");
					$apellidop_registro           = $this->input->post("apellidop_registro");
					$apellidom_registro           = $this->input->post("apellidom_registro");


					$fecha_nacimiento_registro    = $this->input->post("fecha_nacimiento_registro");
					$nacimiento_estado            = $this->input->post("nacimiento_estado");
					$residencia_estado            = $this->input->post("residencia_estado");



					$nombre_usuario               = $this->input->post("nombre_usuario");
					$dni_usuario                  = $this->input->post("dni_usuario");
					$email_usuario                = $this->input->post("email_usuario");

					$this->form_validation->set_rules("nombre_registro","Primer Nombre","required");
					$this->form_validation->set_rules("apellidop_registro","Apellido Paterno","required");
					$this->form_validation->set_rules("apellidom_registro","Apellido Materno","required");

					$this->form_validation->set_rules("fecha_nacimiento_registro","Fecha de Nacimiento","required");
					$this->form_validation->set_rules("nacimiento_estado","Estado de Nacimiento","required");
					$this->form_validation->set_rules("residencia_estado","Residencia Actual","required");


					$this->form_validation->set_rules("nombre_usuario","Nombre de Usuario","required|is_unique[usuarios.nombre_usuario]");
					$this->form_validation->set_rules("dni_usuario","Dni","required");
					$this->form_validation->set_rules("email_usuario","Email","required");

					if ($this->form_validation->run()) {
						$data = [
						    'nombre_registro'           => $nombre_registro,
						    'apellidop_registro'        => $apellidop_registro,
						    'apellidom_registro'        => $apellidom_registro,

						    'fecha_nacimiento_registro' => $fecha_nacimiento_registro,
						    'nacimiento_estado'         => $nacimiento_estado,
						    'residencia_estado'         => $residencia_estado,

						    'nombre_usuario'            => $nombre_usuario,
						    'dni_usuario'               => $dni_usuario,
						    'email_usuario'             => $email_usuario,
						    'tipo_usuario'              => '1',
						    'verificacion_correo'       => '1',
						    'membresia'                 => '1',
						];

																			

						 if ($this->Usuarios_model->add_user($data)) {
						 	$this->session->set_flashdata("register_ok","Administrador Registrado");
						 	redirect(base_url()."membresias/add_admin");
						 }else{
						 	$this->session->set_flashdata("error_add","No se pudo guardar la información");
						 	redirect(base_url()."membresias/add_admin");
						 }

					}else {
						$this->add_admin();
					}	
					/*CODIGO DEL REGISTRO*/
	}


/*AGREGAR ADMINISTRADORES*/

/********EDITAR Y BUSCAR INFORMACION DE LOS ADMINISTRADORES*******/

public function delete($id_admin){
	 $data = array(
            'activo' => '0',
        );

        $this->Membresias_model->update_admin_activo($id_admin, $data);
        $this->list_users_admins();
}


public function vista_informacion_administrador($id_usuario){
	$data  = array(
				'informacion_admin'   => $this->Membresias_model->informacion_administrador($id_usuario), 
			);
		$this->load->view("membresias/respuesta_modal_informacion",$data);
}
/********EDITAR Y BUSCAR INFORMACION DE LOS ADMINISTRADORES*******/

/*******************SECCION DE ADMINISTRADORES******************/

}



