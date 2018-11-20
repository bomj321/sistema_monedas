<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas_model extends CI_Model {

/*********************SECCION ATRIBUTOS******************************/	

/**************************************************PARTE DE SUBIR REGISTROS*************************************/
	/*******VALOR DE ORDEN MAS ALTO*********/
	public function max_orden($categoria)
	{
		$this->db->where("categoria_atributom",$categoria);
		$this->db->select_max('orden','orden_max');
        $orden_maximo = $this->db->get('atributos_m');
	    return $orden_maximo->row();
	}

	/*******VALOR DE ORDEN MAS ALTO*********/

	/*******SELECCIONA REGISTRO CON VALOR SUPERIOR*********/
	public function row_up_orden($orden,$categoria)
	{	
		$this->db->where("categoria_atributom",$categoria);
		$this->db->where("orden",$orden);
		$resultado = $this->db->get("atributos_m");
		return $resultado->row();
	}

	/*******SELECCIONA REGISTRO CON VALOR SUPERIOR*********/

	/*******ACTUALIZA REGISTRO CON VALORES*********/
	public function update_orden_superior($orden_id,$orden,$categoria)
	{	
		$this->db->where("categoria_atributom",$categoria);
		$this->db->where("id_atributo_m",$orden_id);
		return $this->db->update("atributos_m",$orden);
	}

	/*******ACTUALIZA REGISTRO CON VALORES*********/
/**************************************************PARTE DE SUBIR REGISTROS*************************************/


/**************************************************PARTE DE BAJAR REGISTROS*************************************/


	/*******VALOR DE ORDEN MAS BAJO*********/
	public function min_orden($categoria)
	{
		$this->db->where("categoria_atributom",$categoria);
		$this->db->select_min('orden','orden_min');
        $orden_minimo = $this->db->get('atributos_m');
	    return $orden_minimo->row();
	}

	/*******VALOR DE ORDEN MAS BAJO*********/


	/*******SELECCIONA REGISTRO CON VALOR MENOR*********/
	public function row_down_orden($orden,$categoria)
	{	
		$this->db->where("categoria_atributom",$categoria);
		$this->db->where("orden",$orden);
		$resultado = $this->db->get("atributos_m");
		return $resultado->row();
	}

	/*******SELECCIONA REGISTRO CON VALOR MENOR*********/

	/*******ACTUALIZA REGISTRO CON VALORES*********/
	public function update_orden_inferior($orden_id,$orden,$categoria)
	{	
		$this->db->where("categoria_atributom",$categoria);
		$this->db->where("id_atributo_m",$orden_id);
		return $this->db->update("atributos_m",$orden);
	}

	/*******ACTUALIZA REGISTRO CON VALORES*********/

/**************************************************PARTE DE BAJAR REGISTROS*************************************/



	public function save_attr($data)
	{
		$this->db->insert("atributos_m",$data);
		$ultimo_id_attr = $this->db->insert_id();
	     return $ultimo_id_attr;
	}

	public function atributos_especiales_m($data)
	{
		return $this->db->insert("atributos_especiales_m",$data);		
	}


	public function listattr($categoria)
	{
		$this->db->where("categoria_atributom",$categoria);
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

/*****************************ATRIBUTOS ESPECIALES*/
	public function get_attr_especiales($id_atributo){
		$this->db->where("id_atributom",$id_atributo);
		$resultado = $this->db->get("atributos_especiales_m");
		return $resultado->result();
	}

	public function atributos_especiales_m_delete($id){
			$this->db->where('id_atributom', $id);
			$this->db->delete('atributos_especiales_m');
		}

	public function delete_opcion_es($id){
			$this->db->where('id_atributos_especiales_m', $id);
			$this->db->delete('atributos_especiales_m');
		}			
/*****************************ATRIBUTOS ESPECIALES*/

    public function get_attr_exist($id_atributo){
		$this->db->where("id_atributo",$id_atributo);
		$resultado = $this->db->get("atributo_monedas");
		return $resultado->result();
	}


	public function update_atribute($id_atributo,$data){
		$this->db->where("id_atributo_m",$id_atributo);
		return $this->db->update("atributos_m",$data);
	}

	
		public function delete($id){
		$this->db->where('id_atributo_m', $id);
		$this->db->delete('atributos_m');
	}
	

/*************************AGREGAR Y EDITAR FORMULARIO DE MONEDAS*/
/******************AGREGAR MONEDAS*******************/
/************Información_general***********/
	public function listattr_form_generales()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Información_general');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Información_general**********/

/************Datos_Técnicos***********/
	public function listattr_form_tecnicos()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Datos_Técnicos');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Datos_Técnicos**********/

/************Anverso***********/
	public function listattr_form_anverso()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Anverso');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Anverso**********/

/************Reverso***********/
	public function listattr_form_reverso()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Reverso');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Reverso**********/

/************Canto***********/
	public function listattr_form_canto()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Canto');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Canto**********/

/************Variedades***********/
	public function listattr_form_variedades()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Variedades');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Variedades**********/

/************Información_adicional***********/
	public function listattr_form_adicional()
	{	
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Información_adicional');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}
/*************Información_adicional**********/

/******************AGREGAR MONEDAS*******************/	

/***********BUSCAR CATALOGOS*********/	
/***************************************************EDITAR BILLETES******************************/
	public function listattr_cat()
	{
		$this->db->order_by('orden', 'ASC');
		$this->db->where('categoria_atributom', 'Catalogos');
		$resultados = $this->db->get("atributos_m");
		return $resultados->result();
	}

/**************GENERALES**************/
	public function listattr_form_edit_generales($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Información_general');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();
}
/**************GENERALES**************/

/**************TECNICOS**************/
	public function listattr_form_edit_tecnicos($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Datos_Técnicos');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/**************TECNICOS**************/

/**************ANVERSO**************/
	public function listattr_form_edit_anverso($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Anverso');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();
	}
/**************ANVERSO**************/

/**************REVERSO**************/
	public function listattr_form_edit_reverso($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Reverso');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/**************REVERSO**************/

/**************CANTO**************/
	public function listattr_form_edit_canto($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Canto');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();
	}
/**************CANTO**************/

/**************VARIANTES**************/
	public function listattr_form_edit_variedades($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Variedades');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/**************VARIANTES**************/





/**************ADICIONAL**************/
	public function listattr_form_edit_adicional($id)
	{

		$this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_monedas.id_moneda as id_unico_atributo,attr_m.estado as estado,attr_m.tipo_atributom as tipo_atributom");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("attr_m.categoria_atributom",'Información_adicional');
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where_not_in('attr_m.categoria_atributom', 'Catalogos');
		$this->db->order_by('attr_m.orden', 'ASC');
			$resultado = $this->db->get();
			return $resultado->result();

	}
/**************ADICIONAL**************/


/***************************************************EDITAR BILLETES******************************/

/***********BUSCAR CATALOGOS*********/
	
/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
/************Información_general***********/

	public function listattr_form_not_generales($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Información_general' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Información_general***********/

/************Datos_Técnicos***********/

	public function listattr_form_not_tecnicos($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Datos_Técnicos' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Datos_Técnicos***********/

/************Anverso***********/

	public function listattr_form_not_anverso($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Anverso' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Anverso***********/


/************Reverso***********/

	public function listattr_form_not_reverso($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Reverso' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Reverso***********/

/************Canto***********/

	public function listattr_form_not_canto($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Canto' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Canto***********/

/************Variedades***********/

	public function listattr_form_not_variedades($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Variedades' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Variedades***********/


/************Información_adicional***********/

	public function listattr_form_not_adicional($id)
	{	

	 $query = $this->db->query("SELECT * FROM atributos_m WHERE id_atributo_m NOT IN (SELECT id_atributo FROM atributo_monedas WHERE id_moneda = '$id') AND categoria_atributom = 'Información_adicional' AND NOT  tipo_atributom = 'Catalogos' ORDER BY orden ASC");
	 return $query->result();
	}

/************Información_adicional***********/


/*******************************************GENERA FORMULARIO DE ATRIBUTOS NO AGREGADOS******************************************/
/***********************LISTADO DE CATALOGOS PARA EDITAR************************/
	public function listattr_cat_edit($id)
	{
	    $this->db->select("m.*,attr_monedas.atributo_moneda as descripcionatributo,attr_monedas.id_atributo as atributoid,attr_m.nombre_atributo as nombreatributo,attr_m.id_atributo_m as id_atributo_m,attr_m.descripcion_atributo as descripcion_atributo,attr_m.estado as estado,attr_monedas.id_moneda as id_unico_atributo,attr_monedas.id_atributo as id_atributo_edit");
		$this->db->from("catalogo_monedas m");
		$this->db->join("atributo_monedas attr_monedas","m.id_catalogo_moneda = attr_monedas.id_moneda");
		$this->db->join("atributos_m attr_m","attr_monedas.id_atributo = attr_m.id_atributo_m");
		$this->db->where("m.id_catalogo_moneda",$id);
		$this->db->where('attr_m.tipo_atributom', 'Catalogos');
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
/***********************LISTADO DE CATALOGOS PARA EDITAR************************/	
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

/*Listado de atributos informacion general*/


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
	$this->db->order_by('attr_m.orden', 'ASC');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}

/************CONSULTAS PARA LA PAGINA LIST**********/

public function listusuarios()
{
		$this->db->where_not_in('estado', '2');
		$resultados = $this->db->get("catalogo_monedas");
		return $resultados->result();
}

public function listusuarios_filtro($filtros)
{	
	$this->db->select("cm.*,");
	$this->db->from("catalogo_monedas cm");
	$this->db->join("atributo_monedas attr_monedas","cm.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->where('attr_monedas.atributo_moneda', $filtros);
	$this->db->where_not_in('cm.estado', '2');
	$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
}



public function listusuarios_free()
{		
		$this->db->where('estado','1');
		$resultados = $this->db->get("catalogo_monedas");
		return $resultados->result();
}

public function listusuarios_filtro_free($filtros)
{	

	$this->db->select("cm.*,");
	$this->db->from("catalogo_monedas cm");
	$this->db->join("atributo_monedas attr_monedas","cm.id_catalogo_moneda = attr_monedas.id_moneda");
	$this->db->where('attr_monedas.atributo_moneda', $filtros);	
	$this->db->where('cm.estado','1');
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

		$this->db->where("atributo_monedas.id_atributo",$id_atributo);
		$resultados = $this->db->get("atributo_monedas");
		return $resultados->result();
}


public function update_state_moneda($id,$data)
{		

		$this->db->where("id_catalogo_moneda",$id);
		return $this->db->update("catalogo_monedas",$data);
}

public function delete_state_moneda($id,$data)
{		

		$this->db->where("id_catalogo_moneda",$id);
		return $this->db->update("catalogo_monedas",$data);
}
/************CONSULTAS PARA LA PAGINA LIST**********/

/**********************************************************SECCION MONEDAS*******************************/

}



