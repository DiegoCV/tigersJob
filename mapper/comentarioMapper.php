<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\comentario.php';

         class comentarioMapper extends Mapper{  
  public function listarcomentario() {  

						$sql = "SELECT comentario_id, comentario_autor, comentario_email, comentario_contenido, comentario_create_date, entrada_entrada_id, comentario_padre FROM comentario" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new comentario($fila)); 

				        } 

				        return $results; 

			    	}    public function crearcomentario(comentario $comentario) {
$comentario_autor = $comentario->getcomentario_autor(); 
$comentario_email = $comentario->getcomentario_email(); 
$comentario_contenido = $comentario->getcomentario_contenido(); 
$comentario_create_date = $comentario->getcomentario_create_date(); 
$entrada_entrada_id = $comentario->getentrada_entrada_id(); 
$comentario_padre = $comentario->getcomentario_padre(); 
 

        			$sql = "INSERT INTO comentario (comentario_autor,comentario_email,comentario_contenido,comentario_create_date,entrada_entrada_id,comentario_padre) VALUES ('$comentario_autor','$comentario_email','$comentario_contenido','$comentario_create_date','$entrada_entrada_id','$comentario_padre')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(comentario $comentario) {
                    $comentario_id = $comentario->getcomentario_id();


                    $sql = "DELETE FROM comentario WHERE comentario_id = $comentario_id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }