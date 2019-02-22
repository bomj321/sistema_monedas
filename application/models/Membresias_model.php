<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membresias_model extends CI_Model {
	
	public function list()
	{
		$resultados = $this->db->get("usuarios");
		return $resultados->result();
	}	


	public function get_membresia($id_usuario_session)
	{
		$this->db->where("id_usuario",$id_usuario_session);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();	
	} 



	public function update_publicidad($id_usuario_session,$data)
	{
		$this->db->where("id_usuario",$id_usuario_session);
		return $this->db->update("usuarios",$data);
	} 	


	public function list_admin()
	{
		$this->db->where("tipo_usuario",'1');
		$this->db->where("activo",'1');
		$resultados = $this->db->get("usuarios");
		return $resultados->result();
	}

	public function update_admin_activo($id_admin,$data)
	{
		$this->db->where("id_usuario",$id_admin);
		return $this->db->update("usuarios",$data);
	} 

	public function informacion_administrador($id_usuario)
	{
		$this->db->where("id_usuario",$id_usuario);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();	
	} 	
	
	
}
