<?php 

            include_once 'Mapper.php';

            include_once dirname(__FILE__,2).'\entity\entrada.php';

         class entradaMapper extends Mapper{  

            public function getEntradaByEnlace($enlace)
            {
                $sql = "SELECT e.`entrada_id` AS 'id',
                               e.`entrada_titulo` AS 'titulo',
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
                $entrada->setentrada_id($result['id']); 
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

			    	}  

            public function getEntradas($inicio,$fin)
            {
              $sql = "SELECT  e.`entrada_id` AS 'id', 
                              e.`entrada_titulo` AS 'titulo',
                              SUBSTRING(e.`entrada_contenido`,1,110) AS 'contenido',
                              e.`entrada_enlace` AS 'enlace',
                              e.`entrada_autor`AS'autor',
                              tm.`create_time` AS 'fechaCreacion'
                    FROM `entrada` e 
                    INNER JOIN `timestamps` tm
                    ON(tm.`entrada_entrada_id` = e.`entrada_id`)
                    ORDER by tm.`create_time` ASC
                    LIMIT $inicio,$fin";

                    $results = array();  

                foreach ($this->db->query($sql) as $result) { 
                  $entrada = new entrada();
                $entrada->setentrada_id($result['id']); 
                $entrada->setentrada_titulo($result['titulo']); 
                $entrada->setentrada_contenido($result['contenido']) ; 
                $entrada->setentrada_enlace($result['enlace']) ; 
                $entrada->setentrada_autor($result['autor']) ; 
                $entrada->setfecha($result['fechaCreacion']);

                    array_push($results, $entrada); 

                } 

                return $results; 
            }

public function getTotalEntradas()
  {
      $sql = "SELECT COUNT(*) AS total FROM entrada" ;    

                        foreach ($this->db->query($sql) as $fila) { 

                           return $fila['total']; 

                        } 
  return 0;
  }  




                    public function crearentrada(entrada $entrada) {

$sql = "INSERT INTO entrada (entrada_titulo,entrada_contenido,entrada_enlace,entrada_autor) VALUES (?,?,?,?)";

$stmt = $this->db->prepare($sql); 
    try { 
        $this->db->beginTransaction(); 
        $stmt->execute( array(
          $entrada->getentrada_titulo(),
          $entrada->getentrada_contenido(),
          $entrada->getentrada_enlace(),
          $entrada->getentrada_autor()
          )); 
        $R = $this->db->lastInsertId();
                   // echo("hijo de puta".$R);
        $this->db->commit();  
        
/**
                    $imagen = $entrada->getimagen();
                    $data = $imagen->getimagen();
                    $tipo =$imagen->getimagen_tipo();
                    
                    
    $sentencia = $this->db->prepare(" INSERT INTO imagen (imagen, imagen_tipo, entrada_entrada_id) VALUES ( ? , ? , ?) ");
            
        $sentencia->bindParam(1, $data, PDO::PARAM_LOB);
        $sentencia->bindParam(2, $tipo);
        $sentencia->bindParam(3,$R);

        $this->db->beginTransaction();
        $result = $sentencia->execute();
        $this->db->commit();


					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        return $result;

					    }
*/
                  } catch(PDOExecption $e) { 
        $this->db->rollback(); 
        print "Error!: " . $e->getMessage() . "</br>"; 
    } catch( PDOExecption $e ) { 
    print "Error!: " . $e->getMessage() . "</br>"; 
}

return $R; 

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