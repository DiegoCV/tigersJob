<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once dirname(__FILE__).'\entity\timestamps.php';

         class timestampsMapper extends Mapper{  
  public function listartimestamps() {  

						$sql = "SELECT create_time, update_time, entrada_entrada_id FROM timestamps" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new timestamps($fila)); 

				        } 

				        return $results; 

			    	}    public function creartimestamps(timestamps $timestamps) {
$create_time = $timestamps->getcreate_time(); 
$update_time = $timestamps->getupdate_time(); 
$entrada_entrada_id = $timestamps->getentrada_entrada_id(); 
 

        			$sql = "INSERT INTO timestamps (create_time,update_time,entrada_entrada_id) VALUES ('$create_time','$update_time','$entrada_entrada_id')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(timestamps $timestamps) {
                    $entrada_entrada_id = $timestamps->getentrada_entrada_id();


                    $sql = "DELETE FROM timestamps WHERE entrada_entrada_id = $entrada_entrada_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }