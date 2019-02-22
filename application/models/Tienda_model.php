<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tienda_model extends CI_Model
{
  
    /*SECCION DE LA CONFIGURACION*/
    public function obtener_configuracion(){
            $this->db->where("id_configuracion",'1');
            $resultados = $this->db->get('configuracion');
            return $resultados->row();
    }

    public function update_configuracion($data,$id_configuracion){
            $this->db->where('id_configuracion', $id_configuracion);
            return $this->db->update('configuracion', $data);
    }
/*SECCION DE LA CONFIGURACION*/

}
