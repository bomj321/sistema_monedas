<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mercadom_model extends CI_Model {
	
	public function list($id_usuario_session)
	{		
		

		$this->db->select("cpm.*,user.nombre_usuario as nombreusuario,user.email_usuario as emailusuario");
		$this->db->from("coleccion_personal_monedas cpm");
		$this->db->join("usuarios user","cpm.id_usuario = user.id_usuario");
		$this->db->where("cpm.mercado",'1');
		$this->db->where_not_in("cpm.id_usuario",$id_usuario_session);
		$resultado = $this->db->get();
		return $resultado->result();	
	}

	/*****************MONEDAS DE BUSQUEDA*****************/
	public function listb($id_usuario_session)
	{		
		

		$this->db->select("cpm.*,user.nombre_usuario as nombreusuario,user.email_usuario as emailusuario");
		$this->db->from("coleccion_personal_monedas cpm");
		$this->db->join("usuarios user","cpm.id_usuario = user.id_usuario");
		$this->db->where("cpm.mercado",'2');
		$this->db->where_not_in("cpm.id_usuario",$id_usuario_session);
		$resultado = $this->db->get();
		return $resultado->result();	
	}

/*****************MONEDAS DE BUSQUEDA*****************/



	public function get_collectionbm_mercado($id_moneda)
	{
		$this->db->where("id_coleccion_personal_moneda",$id_moneda);
		$resultado = $this->db->get("coleccion_personal_monedas");
		return $resultado->row();
	}

	
}
