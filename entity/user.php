<?php 
  class user{  
 private $username ; 
 private $email ; 
 private $password ; 
 private $create_time ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->username = $data['username']; 
$this->email = $data['email']; 
$this->password = $data['password']; 
$this->create_time = $data['create_time']; 
 

				        }

    }
public function setusername($username){ 
 $this->username = $username; 
 return $this; 
}
public function setemail($email){ 
 $this->email = $email; 
 return $this; 
}
public function setpassword($password){ 
 $this->password = $password; 
 return $this; 
}
public function setcreate_time($create_time){ 
 $this->create_time = $create_time; 
 return $this; 
}
public function getusername(){ 
 return $this->username; 
}
public function getemail(){ 
 return $this->email; 
}
public function getpassword(){ 
 return $this->password; 
}
public function getcreate_time(){ 
 return $this->create_time; 
}
}