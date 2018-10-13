<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collectionb_model extends CI_Model {
	
	public function save($data)
	{
		return $this->db->insert("coleccion_personal_billetes",$data);
	}

	public function list($id_usuario_session)
	{
		$this->db->where('id_usuario', $id_usuario_session);
		$resultados = $this->db->get("coleccion_personal_billetes");
		return $resultados->result();
	}

	public function get_collectionb($id_coleccion)
	{
		$this->db->where("id_coleccion_personal_billete",$id_coleccion);
		$resultado = $this->db->get("coleccion_personal_billetes");
		return $resultado->row();
	}

	
}
