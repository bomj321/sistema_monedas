<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billetes_model extends CI_Model {

/*********************SECCION ATRIBUTOS******************************/	
	
	public function save_attr($data)
	{
		return $this->db->insert("atributos_b",$data);
	}


	public function listattr()
	{
		$resultados = $this->db->get("atributos_b");
		return $resultados->result();
	}

	public function update_attr($id,$data)
	{
		$this->db->where("id_atributo_b",$id);
		return $this->db->update("atributos_b",$data);
	}

	public function listattr_form()
	{	
		$this->db->or_where_not_in('descripcion_atributo', 'Catalogo');
		$resultados = $this->db->get("atributos_b");
		return $resultados->result();
	}

	public function listattr_cat()
	{
		$this->db->where('descripcion_atributo', 'Catalogo');
		$resultados = $this->db->get("atributos_b");
		return $resultados->result();
	}

/*********************SECCION ATRIBUTOS******************************/	

/*********************SECCION BILLETES*******************************/
/*********************SECCION BILLETES*******************************/

}
