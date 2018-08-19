<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\materia.php';

         class materiaMapper extends Mapper{  
  public function listarmateria() {  

						$sql = "SELECT codigo, nombre FROM materia" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new materia($fila)); 

				        } 

				        return $results; 

			    	}    public function crearmateria(materia $materia) {
$codigo = $materia->getcodigo(); 
$nombre = $materia->getnombre(); 
 

        			$sql = "INSERT INTO materia (codigo,nombre) VALUES ('$codigo','$nombre')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(materia $materia) {
                    $codigo = $materia->getcodigo();


                    $sql = "DELETE FROM materia WHERE codigo = $codigo ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }