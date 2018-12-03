<!--SUB CONSULTA FACIAL-->
                    <?php 
                            $sql_facial_letra ="SELECT m.*,attr_m.nombre_atributo AS nombreatributo_facial_letra,attr_monedas.atributo_moneda as descripcionatributo FROM catalogo_monedas AS m INNER JOIN atributo_monedas AS attr_monedas ON m.id_catalogo_moneda = attr_monedas.id_moneda INNER JOIN atributos_m AS attr_m ON attr_monedas.id_atributo = attr_m.id_atributo_m WHERE m.id_catalogo_moneda = '$moneda->id_moneda' AND attr_m.nombre_atributo LIKE '%facial (letras)%'";
                                 $query_facial_letra = $this->db->query($sql_facial_letra);
                            
                            if ($query_facial_letra->num_rows() > 0) {
                                foreach ($query_facial_letra->result() as $row) {
                                        $valor_facial = $row->descripcionatributo; 
                                }
                            }else{
                                 $valor_facial = 'N/A';
                            }                                               

                      ?>

                                                   
 <!--SUB CONSULTA FACIAL--> 

<!--SUB CONSULTA AÑO DE ACUÑACION-->
                    <?php 
                            $sql_ano_acunacion ="SELECT m.*,attr_m.nombre_atributo AS nombreatributo_ano_acunacion,attr_monedas.atributo_moneda as descripcionatributo FROM catalogo_monedas AS m INNER JOIN atributo_monedas AS attr_monedas ON m.id_catalogo_moneda = attr_monedas.id_moneda INNER JOIN atributos_m AS attr_m ON attr_monedas.id_atributo = attr_m.id_atributo_m WHERE m.id_catalogo_moneda = '$moneda->id_moneda' AND attr_m.nombre_atributo LIKE '%Año acuñación%'";
                                 $query_ano_acunacion = $this->db->query($sql_ano_acunacion);
                            
                            if ($query_ano_acunacion->num_rows() > 0) {
                                 foreach ($query_ano_acunacion->result() as $row) {
                                      $ano_acunacion = $row->descripcionatributo; 
                                    }
                            }else{
                                 $ano_acunacion = 'N/A';
                            }                                               

                      ?>

                                                   
 <!--SUB CONSULTA AÑO DE ACUÑACION-->

<!--SUB CONSULTA ENSAYADOR-->
                    <?php 
                            $sql_ensayador ="SELECT m.*,attr_m.nombre_atributo AS nombreatributo_ensayador,attr_monedas.atributo_moneda as descripcionatributo FROM catalogo_monedas AS m INNER JOIN atributo_monedas AS attr_monedas ON m.id_catalogo_moneda = attr_monedas.id_moneda INNER JOIN atributos_m AS attr_m ON attr_monedas.id_atributo = attr_m.id_atributo_m WHERE m.id_catalogo_moneda = '$moneda->id_moneda' AND attr_m.nombre_atributo LIKE '%Ensayador%'";
                                 $query_ensayador = $this->db->query($sql_ensayador);
                            
                            if ($query_ensayador->num_rows() > 0) {
                                foreach ($query_ensayador->result() as $row) {
                                      $ensayador = $row->descripcionatributo; 
                                    }   

                            }else{
                                 $ensayador = 'N/A';
                            }                                               

                      ?>

                                                   
 <!--SUB CONSULTA ENSAYADOR-->

 <!--SUB CONSULTA CECA-->
                    <?php 
                            $sql_ceca ="SELECT m.*,attr_m.nombre_atributo AS nombreatributo_ceca,attr_monedas.atributo_moneda as descripcionatributo FROM catalogo_monedas AS m INNER JOIN atributo_monedas AS attr_monedas ON m.id_catalogo_moneda = attr_monedas.id_moneda INNER JOIN atributos_m AS attr_m ON attr_monedas.id_atributo = attr_m.id_atributo_m WHERE m.id_catalogo_moneda = '$moneda->id_moneda' AND attr_m.nombre_atributo LIKE '%Ceca%'";
                                 $query_ceca = $this->db->query($sql_ceca);
                            
                            if ($query_ceca->num_rows() > 0) {
                                foreach ($query_ceca->result() as $row) {
                                     $ceca = $row->descripcionatributo;
                                  }       
                            }else{
                                 $ceca = 'N/A';
                            }                                               

                      ?>

                                                   
 <!--SUB CONSULTA CECA-->

<!--SUB CONSULTA Gobernante-->
                    <?php 
                            $sql_gobernante ="SELECT m.*,attr_m.nombre_atributo AS nombreatributo_gobernante,attr_monedas.atributo_moneda as descripcionatributo FROM catalogo_monedas AS m INNER JOIN atributo_monedas AS attr_monedas ON m.id_catalogo_moneda = attr_monedas.id_moneda INNER JOIN atributos_m AS attr_m ON attr_monedas.id_atributo = attr_m.id_atributo_m WHERE m.id_catalogo_moneda = '$moneda->id_moneda' AND attr_m.nombre_atributo LIKE '%Gobernante%'";
                                 $query_gobernante = $this->db->query($sql_gobernante);
                            
                            if ($query_gobernante->num_rows() > 0) {
                                 foreach ($query_gobernante->result() as $row) {
                                      $gobernante = $row->descripcionatributo; 
                                   }    
                            }else{
                                 $gobernante = 'N/A';
                            }                                               

                      ?>

                                                   
 <!--SUB CONSULTA Gobernante--> 


