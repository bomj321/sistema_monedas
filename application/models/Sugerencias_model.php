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
	
}
