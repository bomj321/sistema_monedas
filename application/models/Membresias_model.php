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



	
	
}
