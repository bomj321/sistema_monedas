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
	

/*************************AGREGAR Y EDITAR FORMULARIO DE MONEDAS*/
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

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.descripcion_atributo', 'Catalogo');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
	public function listattr_form_not($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND NOT  descripcion_atributo = 'Catalogo'");
	 return $query->result();
	}

	public function listattr_cat_edit($id)
	{
/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_monedas.id_atributo as atributoid,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_monedas.id_atributo as id_atributo_edit");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where('attr_m.descripcion_atributo', 'Catalogo');
			$resultado = $this->db->get();
			return $resultado->result();
	}

	public function listattr_cat_pagos($id)
	{
		$this->db->select("m.*,attr_m.nombre_atributo as nombreatributo,precio_cm.*");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->join("precios_catalogom precio_cm","attr_monedas.id_atributo = precio_cm.id_catalogo");
		$this->db->where("precio_cm.id_moneda",$id);
		$this->db->where("m.id_catalogo_moneda",$id);		
		$this->db->where_not_in('attr_m.descripcion_atributo', 'Foto');
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
		$this->db->where("id_moneda",$id_unico);
		$this->db->where("id_atributo",$atributo_id);		
		return $this->db->update("atributo_monedas",$data);
	}

		public function update_atributes_image($id_unico_usuario_unico,$id_atributo,$datos)
		{
			$this->db->where("id_moneda",$id_unico_usuario_unico);
		    $this->db->where("id_atributo",$id_atributo);		
		  return $this->db->update("atributo_monedas",$datos);

		}

	public function update_atributes_catalogo($id_unico,$id_atributo,$data_catalogo)
	{
		$this->db->where("id_moneda",$id_unico);
		$this->db->where("id_atributo",$id_atributo);		
		return $this->db->update("atributo_monedas",$data_catalogo);
	}



	public function delete_precios_catalogo($id_unico,$id_atributo)
	{
		$this->db->where("id_moneda",$id_unico);
		$this->db->where("id_catalogo",$id_atributo);
		return $this->db->delete("precios_catalogom");
	}

	public function delete_catalogo($id_unico,$id_atributo)
	{
		$this->db->where("id_moneda",$id_unico);
		$this->db->where("id_atributo",$id_atributo);
		return $this->db->delete("atributo_monedas");
	}

	/********************SECCION EDITAR********************************/



/******************************AGREGAR Y EDITAR FORMULARIO DE MONEDAS*/
	public function save_atributes($data)
	{
	   return $this->db->insert("atributo_monedas",$data);
	}

	public function save_atributes_image($data)
	{
	   return $this->db->insert("atributo_monedas",$data);
	}

	public function save_atributes_catalogo($data_catalogo)
	{
		 return $this->db->insert("atributo_monedas",$data_catalogo);
	}

	public function save_precios_catalogo($data_precio)
	{
		 return $this->db->insert("precios_catalogom",$data_precio);
	}

	

/*********************SECCION ATRIBUTOS******************************/	

/*****************************************************SECCION MONEDAS*******************************/
public function add_moneda($data_usuario)
{
	 $this->db->insert("catalogo_monedas",$data_usuario);
	 $ultimo_id = $this->db->insert_id();
	 return $ultimo_id;
}

public function listmoneda($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.descripcion_atributo as palabraclave");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.descripcion_atributo', 'Foto');
	$this->db->where_not_in('attr_m.descripcion_atributo', 'Catalogo');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listmonedaimage($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where('attr_m.descripcion_atributo', 'Foto');
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
		$resultados = $this->db->get("catalogo_monedas");
		return $resultados->result();
}
/**********************************************************SECCION MONEDAS*******************************/

}


