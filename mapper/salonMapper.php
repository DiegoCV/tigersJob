<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\salon.php';

         class salonMapper extends Mapper{  
  public function listarsalon() {  

						$sql = "SELECT id, codigo FROM salon" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new salon($fila)); 

				        } 

				        return $results; 

			    	}    public function crearsalon(salon $salon) {
$id = $salon->getid(); 
$codigo = $salon->getcodigo(); 
 

        			$sql = "INSERT INTO salon (id,codigo) VALUES ('$id','$codigo')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(salon $salon) {
                    $id = $salon->getid();


                    $sql = "DELETE FROM salon WHERE id = $id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }