<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\tag_has_entrada.php';

         class tag_has_entradaMapper extends Mapper{  
  public function listartag_has_entrada() {  

						$sql = "SELECT tag_tag_id, entrada_entrada_id FROM tag_has_entrada" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new tag_has_entrada($fila)); 

				        } 

				        return $results; 

			    	}    public function creartag_has_entrada(tag_has_entrada $tag_has_entrada) {
$tag_tag_id = $tag_has_entrada->gettag_tag_id(); 
$entrada_entrada_id = $tag_has_entrada->getentrada_entrada_id(); 
 

        			$sql = "INSERT INTO tag_has_entrada (tag_tag_id,entrada_entrada_id) VALUES ('$tag_tag_id','$entrada_entrada_id')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(tag_has_entrada $tag_has_entrada) {
                    $tag_tag_id = $tag_has_entrada->gettag_tag_id();
$entrada_entrada_id = $tag_has_entrada->getentrada_entrada_id();


                    $sql = "DELETE FROM tag_has_entrada WHERE tag_tag_id = $tag_tag_id AND entrada_entrada_id = $entrada_entrada_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }