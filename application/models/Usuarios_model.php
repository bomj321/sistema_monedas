<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	
	public function login($usuario, $contraseña)
	{
		$this->db->where("nombre_usuario", $usuario);
		$this->db->where("dni_usuario", $contraseña);
		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}


	public function add_user($data)
	{
	   return $this->db->insert("usuarios",$data);
	}

/*SECCION VERIFICAR CORREO*/
public function update_verificacion($data,$id_verificacion){
	    $this->db->where('verificacion_correo', $id_verificacion);
		return $this->db->update('usuarios', $data);
}
/*SECCION VERIFICAR CORREO*/
	
}
