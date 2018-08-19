<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\horario.php';

         class horarioMapper extends Mapper{  
  public function listarhorario() {  

						$sql = "SELECT dia_id, hora_id, materia_codigo, id, isClase, salon FROM horario" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new horario($fila)); 

				        } 

				        return $results; 

			    	}    public function crearhorario(horario $horario) {
$dia_id = $horario->getdia_id(); 
$hora_id = $horario->gethora_id(); 
$materia_codigo = $horario->getmateria_codigo(); 
$isClase = $horario->getisClase(); 
$salon = $horario->getsalon(); 
 

        			$sql = "INSERT INTO horario (dia_id,hora_id,materia_codigo,isClase,salon) VALUES ('$dia_id','$hora_id','$materia_codigo','$isClase','$salon')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(horario $horario) {
                    $id = $horario->getid();


                    $sql = "DELETE FROM horario WHERE id = $id ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }