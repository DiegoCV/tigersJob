<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once dirname(__FILE__).'\entity\tag.php';

         class tagMapper extends Mapper{  
  public function listartag() {  

						$sql = "SELECT tag_id, tag_nombre FROM tag" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new tag($fila)); 

				        } 

				        return $results; 

			    	}    public function creartag(tag $tag) {
$tag_nombre = $tag->gettag_nombre(); 
 

        			$sql = "INSERT INTO tag (tag_nombre) VALUES ('$tag_nombre')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(tag $tag) {
                    $tag_id = $tag->gettag_id();


                    $sql = "DELETE FROM tag WHERE tag_id = $tag_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }