<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas_model extends CI_Model {

/*********************SECCION ATRIBUTOS******************************/	
	
	public function save_attr($data)
	{
		return $this->db->insert("atributos_m",$data);
	}


	public function listattr()
	{
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}

	public function update_state_attr($id,$data)
	{
		$this->db->where("id_atributo_m",$id);
		return $this->db->update("atributos_m",$data);
	}

	public function get_attr($id_atributo){
		$this->db->where("id_atributo_m",$id_atributo);
		$resultado = $this->db->get("atributos_m");
		return $resultado->row();
	}

	public function update_atribute($id_atributo,$data){
		$this->db->where("id_atributo_m",$id_atributo);
		return $this->db->update("atributos_m",$data);
	}
	

/*************************AGREGAR Y EDITAR FORMULARIO DE BILLETES*/
	public function listattr_form()
	{	
		$this->db->or_where_not_in('descripcion_atributo', 'Catalogo');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}

	

	public function listattr_cat()
	{
		$this->db->where('descripcion_atributo', 'Catalogo');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}


	public function listattr_form_edit($id)
	{

		$this->db->select("b.*,attr_billetes.atributo_billete as descripcionatributo,attr_b.nombre_atributo as nombreatributo,attr_b.id_atributo_m as id_atributo_m,attr_b.descripcion_atributo as descripcion_atributo,attr_billetes.id_billete as id_unico_atributo");
		$this->db->from("catalogo_billetes b");
		$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
		$this->db->join("atributos_m attr_b","attr_billetes.id_atributo = attr_b.id_atributo_m");
		$this->db->where("b.id_catalogo_billete",$id);
		$this->db->where_not_in('attr_b.descripcion_atributo', 'Catalogo');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
	public function listattr_form_not($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_billetes WHERE id_billete = '$id') AND NOT  descripcion_atributo = 'Catalogo'");
	 return $query->result();
	}

	public function listattr_cat_edit($id)
	{
/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
$this->db->select("b.*,attr_billetes.atributo_billete as descripcionatributo,attr_billetes.id_atributo as atributoid,attr_b.nombre_atributo as nombreatributo,attr_b.id_atributo_m as id_atributo_m,attr_b.descripcion_atributo as descripcion_atributo,attr_billetes.id_billete as id_unico_atributo,attr_billetes.id_atributo as id_atributo_edit");
		$this->db->from("catalogo_billetes b");
		$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
		$this->db->join("atributos_m attr_b","attr_billetes.id_atributo = attr_b.id_atributo_m");
		$this->db->where("b.id_catalogo_billete",$id);
		$this->db->where('attr_b.descripcion_atributo', 'Catalogo');
			$resultado = $this->db->get();
			return $resultado->result();
	}

	public function listattr_cat_pagos($id)
	{
		$this->db->select("b.*,attr_b.nombre_atributo as nombreatributo,precio_cb.*");
		$this->db->from("catalogo_billetes b");
		$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
		$this->db->join("atributos_m attr_b","attr_billetes.id_atributo = attr_b.id_atributo_m");
		$this->db->join("precios_catalogob precio_cb","attr_billetes.id_atributo = precio_cb.id_catalogo");
		$this->db->where("precio_cb.id_billete",$id);
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
	/********************SECCION EDITAR********************************/

	public function update_atributes($id_unico,$atributo_id,$data)
	{
		$this->db->where("id_billete",$id_unico);
		$this->db->where("id_atributo",$atributo_id);		
		return $this->db->update("atributo_billetes",$data);
	}

		public function update_atributes_image($id_unico_usuario_unico,$id_atributo,$datos)
		{
			$this->db->where("id_billete",$id_unico_usuario_unico);
		    $this->db->where("id_atributo",$id_atributo);		
		  return $this->db->update("atributo_billetes",$datos);

		}

	public function update_atributes_catalogo($id_unico,$id_atributo,$data_catalogo)
	{
		$this->db->where("id_billete",$id_unico);
		$this->db->where("id_atributo",$id_atributo);		
		return $this->db->update("atributo_billetes",$data_catalogo);
	}



	public function delete_precios_catalogo($id_unico,$id_atributo)
	{
		$this->db->where("id_billete",$id_unico);
		$this->db->where("id_catalogo",$id_atributo);
		return $this->db->delete("precios_catalogob");
	}

	public function delete_catalogo($id_unico,$id_atributo)
	{
		$this->db->where("id_billete",$id_unico);
		$this->db->where("id_atributo",$id_atributo);
		return $this->db->delete("atributo_billetes");
	}

	/********************SECCION EDITAR********************************/



/******************************AGREGAR Y EDITAR FORMULARIO DE BILLETES*/
	public function save_atributes($data)
	{
	   return $this->db->insert("atributo_billetes",$data);
	}

	public function save_atributes_image($data)
	{
	   return $this->db->insert("atributo_billetes",$data);
	}

	public function save_atributes_catalogo($data_catalogo)
	{
		 return $this->db->insert("atributo_billetes",$data_catalogo);
	}

	public function save_precios_catalogo($data_precio)
	{
		 return $this->db->insert("precios_catalogob",$data_precio);
	}

	

/*********************SECCION ATRIBUTOS******************************/	

/*****************************************************SECCION BILLETES*******************************/
public function add_moneda($data_usuario)
{
	 $this->db->insert("catalogo_billetes",$data_usuario);
	 $ultimo_id = $this->db->insert_id();
	 return $ultimo_id;
}

public function listbillete($id)
{	
	$this->db->select("b.*,attr_billetes.atributo_billete as descripcionatributo,attr_b.nombre_atributo as nombreatributo,attr_b.descripcion_atributo as palabraclave");
	$this->db->from("catalogo_billetes b");
	$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
	$this->db->join("atributos_m attr_b","attr_billetes.id_atributo = attr_b.id_atributo_m");
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
	$this->db->select("b.*,attr_billetes.atributo_billete as descripcionatributo,attr_b.nombre_atributo as nombreatributo");
	$this->db->from("catalogo_billetes b");
	$this->db->join("atributo_billetes attr_billetes","b.id_catalogo_billete = attr_billetes.id_billete");
	$this->db->join("atributos_m attr_b","attr_billetes.id_atributo = attr_b.id_atributo_m");
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
/**********************************************************SECCION BILLETES*******************************/

}



