<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercadob_model extends CI_Model {
	
	public function list($id_usuario_session)
	{		
		

		$this->db->select("cpb.*,user.nombre_usuario as nombreusuario,user.email_usuario as emailusuario");
		$this->db->from("coleccion_personal_billetes cpb");
		$this->db->join("usuarios user","cpb.id_usuario = user.id_usuario");
		$this->db->where("cpb.mercado",'1');
		$this->db->where_not_in("cpb.id_usuario",$id_usuario_session);
		$resultado = $this->db->get();
		return $resultado->result();	
	}

	public function get_collectionbp_mercado($id_billete)
	{
		$this->db->where("id_coleccion_personal_billete",$id_billete);
		$resultado = $this->db->get("coleccion_personal_billetes");
		return $resultado->row();
	}

	
}
