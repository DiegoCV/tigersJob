<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\ejecucion.php';

         class ejecucionMapper extends Mapper{  
  public function listarejecucion() {  

						$sql = "SELECT id, comentario, salon_id, fecha, estado_id, horario_id FROM ejecucion" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new ejecucion($fila)); 

				        } 

				        return $results; 

			    	}    public function crearejecucion(ejecucion $ejecucion) {
$comentario = $ejecucion->getcomentario(); 
$salon_id = $ejecucion->getsalon_id(); 
$fecha = $ejecucion->getfecha(); 
$estado_id = $ejecucion->getestado_id(); 
$horario_id = $ejecucion->gethorario_id(); 
 

        			$sql = "INSERT INTO ejecucion (comentario,salon_id,fecha,estado_id,horario_id) VALUES ('$comentario','$salon_id','$fecha','$estado_id','$horario_id')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(ejecucion $ejecucion) {
                    $id = $ejecucion->getid();


                    $sql = "DELETE FROM ejecucion WHERE id = $id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }