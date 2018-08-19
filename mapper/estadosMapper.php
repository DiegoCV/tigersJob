<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\estados.php';

         class estadosMapper extends Mapper{  
  public function listarestados() {  

						$sql = "SELECT id, nombre, descripcion FROM estados" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new estados($fila)); 

				        } 

				        return $results; 

			    	}    public function crearestados(estados $estados) {
$nombre = $estados->getnombre(); 
$descripcion = $estados->getdescripcion(); 
 

        			$sql = "INSERT INTO estados (nombre,descripcion) VALUES ('$nombre','$descripcion')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(estados $estados) {
                    $id = $estados->getid();


                    $sql = "DELETE FROM estados WHERE id = $id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }