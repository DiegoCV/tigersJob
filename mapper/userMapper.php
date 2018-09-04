<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once dirname(__FILE__).'\entity\user.php';

         class userMapper extends Mapper{  
  public function listaruser() {  

						$sql = "SELECT username, email, password, create_time FROM user" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new user($fila)); 

				        } 

				        return $results; 

			    	}    public function crearuser(user $user) {
$username = $user->getusername(); 
$email = $user->getemail(); 
$password = $user->getpassword(); 
$create_time = $user->getcreate_time(); 
 

        			$sql = "INSERT INTO user (username,email,password,create_time) VALUES ('$username','$email','$password','$create_time')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(user $user) {
                    $username = $user->getusername();


                    $sql = "DELETE FROM user WHERE username = $username ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }