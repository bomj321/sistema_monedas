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
	   return $this->db->insert("atributo_billetes",$data);
	}

	public function save_atributes_image($data)
	{
	   return $this->db->insert("atributo_billetes",$data);
	}

/*********************SECCION ATRIBUTOS******************************/	

/*********************SECCION BILLETES*******************************/
public function add_moneda($data_usuario)
{
	 $this->db->insert("catalogo_billetes",$data_usuario);
	 $ultimo_id = $this->db->insert_id();
	 return $ultimo_id;
}

public function listbillete($id)
{	
	$this->db->select("b.*,attr_billetes.atributo_billete as descripcionarticulo,attr_b.nombre_atributo as nombreatributo");
	$this->db->from("catalogo_billetes b");
	$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
	$this->db->join("atributos_b attr_b","attr_billetes.id_atributo = attr_b.id_atributo_b");
	$this->db->where("b.id_catalogo_billete",$id);
	$this->db->where_not_in('attr_b.descripcion_atributo', 'Foto');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listbilleteimage($id)
{	
	$this->db->select("b.*,attr_billetes.atributo_billete as descripcionarticulo,attr_b.nombre_atributo as nombreatributo");
	$this->db->from("catalogo_billetes b");
	$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
	$this->db->join("atributos_b attr_b","attr_billetes.id_atributo = attr_b.id_atributo_b");
	$this->db->where("b.id_catalogo_billete",$id);
	$this->db->where('attr_b.descripcion_atributo', 'Foto');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listusuarios()
{	
		$resultados = $this->db->get("catalogo_billetes");
		return $resultados->result();
}
/*********************SECCION BILLETES*******************************/

}



