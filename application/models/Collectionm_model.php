<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collectionm_model extends CI_Model {
	
	public function save($data)
	{
		return $this->db->insert("coleccion_personal_monedas",$data);
	}
	public function save_monedas_variantes($data)
	{
		return $this->db->insert("coleccion_personal_monedas",$data);
	}
	public function list($id_usuario_session)
	{
		$this->db->where('tipo_moneda_registro','principal');
		$this->db->where('id_usuario', $id_usuario_session);
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->result();
	}

	
/*DATOS PARA EL MODAL DE MONEDAS*/
	public function get_collectionmp($id_usuario,$id_moneda)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_moneda",$id_moneda);
		$this->db->where("tipo_moneda_registro",'principal');
		$resultado = $this->db->get("coleccion_personal_monedas");
		return $resultado->row();
	}
	public function get_collectionma($id_usuario,$id_moneda)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("id_moneda",$id_moneda);
		$this->db->where("tipo_moneda_registro",'add');
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->result();
	}
/*DATOS PARA EL MODAL DE MONEDAS*/



/*PRINCIPAL*/
	public function editp($id_moneda)
	{
		$this->db->where("id_coleccion_personal_moneda",$id_moneda);
		$resultado = $this->db->get("coleccion_personal_monedas");
		return $resultado->row();
	}

	public function updatep($id_moneda,$data)
	{
		$this->db->where("id_coleccion_personal_moneda",$id_moneda);
		return $this->db->update("coleccion_personal_monedas",$data);		
	}
/*PRINCIPAL*/

/*VARIANTES*/
	public function edita($id_moneda)
	{
		$this->db->where("id_coleccion_personal_moneda",$id_moneda);
		$resultado = $this->db->get("coleccion_personal_monedas");
		return $resultado->row();
	}

	/*IMAGENES*/
		public function updatea_frente($id_moneda,$data)
		{
			$this->db->where("id_coleccion_personal_moneda",$id_moneda);
			return $this->db->update("coleccion_personal_monedas",$data);		
		}

		public function updatea_detras($id_moneda,$data)
		{
			$this->db->where("id_coleccion_personal_moneda",$id_moneda);
			return $this->db->update("coleccion_personal_monedas",$data);		
		}
	/*IMAGENES*/

	public function updatea($id_moneda,$data)
	{
		$this->db->where("id_coleccion_personal_moneda",$id_moneda);
		return $this->db->update("coleccion_personal_monedas",$data);		
	}	

/*VARIANTES*/	
}