<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\imagen.php';

         class imagenMapper extends Mapper{  
  public function listarimagen() {  

						$sql = "SELECT imagen_id, imagen, imagen_tipo, entrada_entrada_id FROM imagen" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new imagen($fila)); 

				        } 

				        return $results; 

			    	}    public function crearimagen(imagen $imagen) {
$imagen = $imagen->getimagen(); 
$imagen_tipo = $imagen->getimagen_tipo(); 
$entrada_entrada_id = $imagen->getentrada_entrada_id(); 
 

        			$sql = "INSERT INTO imagen (imagen,imagen_tipo,entrada_entrada_id) VALUES ('$imagen','$imagen_tipo','$entrada_entrada_id')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(imagen $imagen) {
                    $imagen_id = $imagen->getimagen_id();
$entrada_entrada_id = $imagen->getentrada_entrada_id();


                    $sql = "DELETE FROM imagen WHERE imagen_id = $imagen_id AND entrada_entrada_id = $entrada_entrada_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }