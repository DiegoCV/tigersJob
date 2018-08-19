<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\entrada.php';

         class entradaMapper extends Mapper{  
  public function listarentrada() {  

						$sql = "SELECT entrada_id, entrada_titulo, entrada_contenido, entrada_enlace, entrada_autor FROM entrada" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new entrada($fila)); 

				        } 

				        return $results; 

			    	}    public function crearentrada(entrada $entrada) {
$entrada_titulo = $entrada->getentrada_titulo(); 
$entrada_contenido = $entrada->getentrada_contenido(); 
$entrada_enlace = $entrada->getentrada_enlace(); 
$entrada_autor = $entrada->getentrada_autor(); 
 

        			$sql = "INSERT INTO entrada (entrada_titulo,entrada_contenido,entrada_enlace,entrada_autor) VALUES ('$entrada_titulo','$entrada_contenido','$entrada_enlace','$entrada_autor')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(entrada $entrada) {
                    $entrada_id = $entrada->getentrada_id();


                    $sql = "DELETE FROM entrada WHERE entrada_id = $entrada_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }