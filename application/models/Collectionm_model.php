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
		$this->db->where_not_in('estado', '2');
		$this->db->where('id_usuario', $id_usuario_session);
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->result();
	}

/*Borrar Moneda*/	
	public function delete_state_moneda($id,$data)
{		

		$this->db->where("id_coleccion_personal_moneda",$id);
		return $this->db->update("coleccion_personal_monedas",$data);
}
/*Borrar Moneda*/
	
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



/*EDITAR MONEDA PRINCIPAL*/
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
/*EDITAR MONEDA PRINCIPAL*/

/*EDITAR MONEDA VARIANTES*/
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

/*EDITAR MONEDA VARIANTES*/

/*INFORMACION DEL DASHBOARD*/
public function get_collection_totales($id_usuario)
	{
		$this->db->where("id_usuario",$id_usuario);
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->num_rows();
	}

public function get_collection_intercambio($id_usuario)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("tipo_registro","Intercambio");
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->num_rows();
	}

public function get_collection_venta($id_usuario)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("tipo_registro","Venta");
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->num_rows();
	}

public function get_collection_personales($id_usuario)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->where("tipo_registro","Personal");
		$resultados = $this->db->get("coleccion_personal_monedas");
		return $resultados->num_rows();
	}

public function get_data_ano($ano_proyecto)
	{
		
		$this->db->select("MONTH(fecha_agregada) as mes, count(*) as total_registros");
		$this->db->from("coleccion_personal_monedas");
		$this->db->where("fecha_agregada >=",$ano_proyecto."-01-01");
		$this->db->where("fecha_agregada <=",$ano_proyecto."-12-31");
		$this->db->group_by("mes");
		$this->db->order_by("mes");
		$resultados = $this->db->get();
		return $resultados->result();
	}				


/*INFORMACION DEL DASHBOARD*/

}