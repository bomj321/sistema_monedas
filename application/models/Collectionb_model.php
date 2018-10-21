<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionb_model extends CI_Model {
	
	public function save($data)
	{
		return $this->db->insert("coleccion_personal_billetes",$data);
	}
	public function save_billetes_variantes($data)
	{
		return $this->db->insert("coleccion_personal_billetes",$data);
	}
	public function list($id_usuario_session)
	{
		$this->db->where('tipo_billete_registro','principal');
		$this->db->where('id_usuario', $id_usuario_session);
		$resultados = $this->db->get("coleccion_personal_billetes");
		return $resultados->result();
	}
	public function get_collectionbp($id_usuario,$id_billete)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_billete",$id_billete);
		$this->db->where("tipo_billete_registro",'principal');
		$resultado = $this->db->get("coleccion_personal_billetes");
		return $resultado->row();
	}
	public function get_collectionba($id_usuario,$id_billete)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_billete",$id_billete);
		$this->db->where("tipo_billete_registro",'add');
		$resultados = $this->db->get("coleccion_personal_billetes");
		return $resultados->result();
	}
/*PRINCIPAL*/
	public function editp($id_billete)
	{
		$this->db->where("id_coleccion_personal_billete",$id_billete);
		$resultado = $this->db->get("coleccion_personal_billetes");
		return $resultado->row();
	}

	public function updatep($id_billete,$data)
	{
		$this->db->where("id_coleccion_personal_billete",$id_billete);
		return $this->db->update("coleccion_personal_billetes",$data);		
	}
/*PRINCIPAL*/

/*VARIANTES*/
	public function edita($id_billete)
	{
		$this->db->where("id_coleccion_personal_billete",$id_billete);
		$resultado = $this->db->get("coleccion_personal_billetes");
		return $resultado->row();
	}

	/*IMAGENES*/
		public function updatea_frente($id_billete,$data)
		{
			$this->db->where("id_coleccion_personal_billete",$id_billete);
			return $this->db->update("coleccion_personal_billetes",$data);		
		}

		public function updatea_detras($id_billete,$data)
		{
			$this->db->where("id_coleccion_personal_billete",$id_billete);
			return $this->db->update("coleccion_personal_billetes",$data);		
		}
	/*IMAGENES*/

	public function updatea($id_billete,$data)
	{
		$this->db->where("id_coleccion_personal_billete",$id_billete);
		return $this->db->update("coleccion_personal_billetes",$data);		
	}	

/*VARIANTES*/	
}