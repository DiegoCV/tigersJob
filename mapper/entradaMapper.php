<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\entrada.php';

         class entradaMapper extends Mapper{  

            public function getEntradaByEnlace($enlace)
            {
                $sql = "SELECT e.`entrada_titulo` AS 'titulo',
                               e.`entrada_contenido` AS 'contenido',
                               e.`entrada_enlace` AS 'enlace',
                               u.`username` AS 'autor',
                               t.`update_time` AS 'fecha' 
                        FROM entrada e 
                        INNER JOIN `user` u 
                        ON (e.entrada_autor = u.`username`) 
                        INNER JOIN `timestamps` t 
                        ON (e.entrada_id = t.`entrada_entrada_id`) 
                        WHERE e.entrada_enlace = '$enlace'";

                foreach ($this->db->query($sql) as $row) {
                     $result = $row;
                     break;
                }
               

                
                $entrada = new entrada();
                $entrada->setentrada_titulo($result['titulo']); 
                $entrada->setentrada_contenido($result['contenido']) ; 
                $entrada->setentrada_enlace($result['enlace']) ; 
                $entrada->setentrada_autor($result['autor']) ; 
                $entrada->setfecha($result['fecha']);
                $array = array(
                "entrada" => $entrada,
                );
                return $array;
            }

  public function listarentrada() {  

						$sql = "SELECT entrada_id, entrada_titulo, entrada_contenido, entrada_enlace, entrada_autor FROM entrada" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new entrada($fila)); 

				        } 

				        return $results; 

			    	}    public function crearentrada(entrada $entrada) {
/**$entrada_titulo = $entrada->getentrada_titulo(); 
$entrada_contenido = $entrada->getentrada_contenido(); 
$entrada_enlace = $entrada->getentrada_enlace(); 
$entrada_autor = $entrada->getentrada_autor(); 
 

        			$sql = "INSERT INTO entrada (entrada_titulo,entrada_contenido,entrada_enlace,entrada_autor) VALUES ('$entrada_titulo','$entrada_contenido','$entrada_enlace','$entrada_autor')"; **/
                    $imagen = $entrada->getimagen();
                    $data = $imagen->getimagen();
                    $tipo =$imagen->getimagen_tipo();
                    $r = 3;
                    //echo $tipo.$data;
    $sentencia = $this->db->prepare(" INSERT INTO imagen (imagen, imagen_tipo, entrada_entrada_id) VALUES ( ? , ? , ?) ");
            
        $sentencia->bindParam(1, $data, PDO::PARAM_LOB);
        $sentencia->bindParam(2, $tipo);
        $sentencia->bindParam(3,$r);

        $this->db->beginTransaction();
        $result = $sentencia->execute();
        $this->db->commit();


					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        return $result;

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