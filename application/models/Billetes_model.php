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

	public function save_atributes($data)
	{
	   $this->db->insert("atributo_billetes",$data);
	}

/*********************SECCION ATRIBUTOS******************************/	

/*********************SECCION BILLETES*******************************/
public function add_moneda($data_usuario)
{
	 $this->db->insert("catalogo_billetes",$data_usuario);
	 $ultimo_id = $this->db->insert_id();
	 return $ultimo_id;
}
/*********************SECCION BILLETES*******************************/

}
