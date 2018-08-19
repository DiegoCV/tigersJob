<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\usuario.php';

         class usuarioMapper extends Mapper{  
  public function listarusuario() {  

						$sql = "SELECT codigo, nombre, apellido, clave, correo, isProfesor FROM usuario" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new usuario($fila)); 

				        } 

				        return $results; 

			    	}    public function crearusuario(usuario $usuario) {
$codigo = $usuario->getcodigo(); 
$nombre = $usuario->getnombre(); 
$apellido = $usuario->getapellido(); 
$clave = $usuario->getclave(); 
$correo = $usuario->getcorreo(); 
$isProfesor = $usuario->getisProfesor(); 
 

        			$sql = "INSERT INTO usuario (codigo,nombre,apellido,clave,correo,isProfesor) VALUES ('$codigo','$nombre','$apellido','$clave','$correo','$isProfesor')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(usuario $usuario) {
                    $codigo = $usuario->getcodigo();


                    $sql = "DELETE FROM usuario WHERE codigo = $codigo ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }