<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sugerencias_model extends CI_Model {
	
	public function list()
	{
		$this->db->select("sug.*,user.nombre_usuario as nombreusuario,user.email_usuario as emailusuario");
		$this->db->from("sugerencias sug");
		$this->db->join("usuarios user","sug.id_usuario = user.id_usuario");
		$resultado = $this->db->get();
		return $resultado->result();	
	}	


	public function save($data)
	{
		return $this->db->insert("sugerencias",$data);
	} 



	public function get_sugerencia($id_sugerencia)
	{
		$this->db->where("id_sugerencia",$id_sugerencia);
		$resultado = $this->db->get("sugerencias");
		return $resultado->row();	
	} 


	public function update($id_sugerencia,$data)
	{
		$this->db->where("id_sugerencia",$id_sugerencia);
		return $this->db->update("sugerencias",$data);
	} 


/*SECCION PARA MONEDAS*/
public function listusuarios_filtro($filtros)
{	
	$this->db->select("cm.*,");
	$this->db->from("catalogo_monedas cm");
	$this->db->join("atributo_monedas attr_monedas","cm.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->where('attr_monedas.atributo_moneda', $filtros);
	$this->db->where("attr_monedas.tipo_moneda",'0');
	//$this->db->group_by("attr_monedas.atributo_moneda");
	$this->db->where_not_in('cm.estado', '0');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listusuarios_filtro_free($filtros)
{	

	$this->db->select("cm.*,");
	$this->db->from("catalogo_monedas cm");
	$this->db->join("atributo_monedas attr_monedas","cm.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->where('attr_monedas.atributo_moneda', $filtros);	
	$this->db->where("attr_monedas.tipo_moneda",'1');
	//$this->db->group_by("attr_monedas.atributo_moneda");
	$this->db->where('cm.estado','0');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listatributos()
{		

	    $this->db->group_by("categoria_atributom");
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
}

public function listatributos_opciones($id_atributo)
{		
		$this->db->group_by("atributo_monedas.atributo_moneda");
		$this->db->where("atributo_monedas.id_atributo",$id_atributo);
		$this->db->where("attr_monedas.tipo_moneda",'0');
		$resultados = $this->db->get("atributo_monedas");
		return $resultados->result();
}


public function listusuarios()
{
		$this->db->where_not_in('estado', '2');
		$resultados = $this->db->get("catalogo_monedas");
		return $resultados->result();
}

public function listusuarios_free()
{		
		$this->db->where('estado','1');
		$resultados = $this->db->get("catalogo_monedas");
		return $resultados->result();
}

public function listmoneda_general($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Información_general');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'DESC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos informacion general*/

/*Listado de atributos datos tecnicos*/


public function listmoneda_tecnico($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Datos_Técnicos');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos datos tecnicos*/


/*Listado de atributos Anverso*/


public function listmoneda_anverso($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Anverso');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos Anverso*/

/*Listado de atributos Reverso*/


public function listmoneda_reverso($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Reverso');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos Reverso*/


/*Listado de atributos Canto*/


public function listmoneda_canto($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Canto');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos Canto*/


/*Listado de atributos Variedades*/


public function listmoneda_variedades($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Variedades');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos Variedades*/


/*Listado de atributos Información_adicional*/


public function listmoneda_adicional($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.tipo_atributom as palabraclave,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
	$this->db->where_not_in('attr_m.tipo_atributom', 'Catalogos');
	$this->db->where('attr_m.categoria_atributom', 'Información_adicional');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}


/*Listado de atributos Información_adicional*/


public function listmonedaimage($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where('attr_m.tipo_atributom', 'Fotos');
	$this->db->where("attr_monedas.tipo_moneda",'0');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listmonedaimage_existentes($id)
{	
	$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_monedas.id_atributo_moneda as id_atributo,attr_m.nombre_atributo as nombreatributo,attr_m.estado as estado");
	$this->db->from("catalogo_monedas m");
	$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
	$this->db->where("m.id_catalogo_moneda",$id);
	$this->db->where('attr_m.tipo_atributom', 'Fotos');
	$this->db->where("attr_monedas.tipo_moneda",'1');
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

public function listattr_cat_edit($id)
	{
	    $this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_monedas.id_atributo as atributoid,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_m.estado as estado,attr_monedas.id_moneda as id_unico_atributo,attr_monedas.id_atributo as id_atributo_edit");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where('attr_m.tipo_atributom', 'Catalogos');
		$this->db->where("attr_monedas.tipo_moneda",'0');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();
	}

	public function listattr_cat_pagos($id)
	{
		$this->db->select("m.*,attr_m.nombre_atributo as nombreatributo,attr_m.estado as estado,precio_cm.*");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->join("precios_catalogom precio_cm","attr_monedas.id_atributo = precio_cm.id_catalogo");
		$this->db->where("precio_cm.id_moneda",$id);
		$this->db->where("m.id_catalogo_moneda",$id);	
		$this->db->where("attr_monedas.tipo_moneda",'0');
	    $this->db->where("precio_cm.tipo_moneda",'0');
		$this->db->where_not_in('attr_m.tipo_atributom', 'Fotos');
		$this->db->order_by('attr_m.orden', 'ASC');
		$resultados = $this->db->get();
			if ($resultados->num_rows() > 0) {
				return $resultados->result();
			}else
			{
				return false;
			}
	}


/***********ELIMINAR O ACEPTAR CAMBIOS*************/
public function delete_moneda($id_moneda)
{
	$this->db->where('id_moneda', $id_moneda);
	$this->db->where('tipo_moneda', '0');
	$this->db->delete('atributo_monedas');
}

public function delete_moneda_cat($id_moneda)
{
	$this->db->where('id_moneda', $id_moneda);
	$this->db->where('tipo_moneda', '0');
	$this->db->delete('precios_catalogom');
}

/*ACEPTAR CAMBIOS*/
public function delete_moneda_existente($id_moneda)
{
	$this->db->where('id_moneda', $id_moneda);
	$this->db->where('tipo_moneda', '1');
	$this->db->delete('atributo_monedas');
}

public function delete_moneda_cat_existente($id_moneda)
{
	$this->db->where('id_moneda', $id_moneda);
	$this->db->where('tipo_moneda', '1');
	$this->db->delete('precios_catalogom');
}

public function update_moneda_sugerida($id,$data)
{		

		$this->db->where("id_moneda",$id);
		return $this->db->update("atributo_monedas",$data);
}

public function update_moneda_sugerida_cat($id,$data)
{
		$this->db->where('id_moneda', $id_moneda);
		return $this->db->update("atributo_monedas",$data);
}

public function update_imagenes_existentes($id_atributo,$data)
{
		$this->db->where('id_atributo_moneda', $id_atributo);
		return $this->db->update("atributo_monedas",$data);
}
/*ACEPTAR CAMBIOS*/

/***********ELIMINAR O ACEPTAR CAMBIOS*************/





/*SECCION PARA MONEDAS*/



	
}
