<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\usuario_has_materia.php';

         class usuario_has_materiaMapper extends Mapper{  
  public function listarusuario_has_materia() {  

						$sql = "SELECT usuario_codigo, materia_codigo FROM usuario_has_materia" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new usuario_has_materia($fila)); 

				        } 

				        return $results; 

			    	}    public function crearusuario_has_materia(usuario_has_materia $usuario_has_materia) {
$usuario_codigo = $usuario_has_materia->getusuario_codigo(); 
$materia_codigo = $usuario_has_materia->getmateria_codigo(); 
 

        			$sql = "INSERT INTO usuario_has_materia (usuario_codigo,materia_codigo) VALUES ('$usuario_codigo','$materia_codigo')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(usuario_has_materia $usuario_has_materia) {
                    $usuario_codigo = $usuario_has_materia->getusuario_codigo();
$materia_codigo = $usuario_has_materia->getmateria_codigo();


                    $sql = "DELETE FROM usuario_has_materia WHERE usuario_codigo = $usuario_codigo AND materia_codigo = $materia_codigo ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }