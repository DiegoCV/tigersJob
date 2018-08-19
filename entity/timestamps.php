<?php 
  class timestamps{  
 private $create_time ; 
 private $update_time ; 
 private $entrada_entrada_id ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->create_time = $data['create_time']; 
$this->update_time = $data['update_time']; 
$this->entrada_entrada_id = $data['entrada_entrada_id']; 
 

				        }

    }
public function setcreate_time($create_time){ 
 $this->create_time = $create_time; 
 return $this; 
}
public function setupdate_time($update_time){ 
 $this->update_time = $update_time; 
 return $this; 
}
public function setentrada_entrada_id($entrada_entrada_id){ 
 $this->entrada_entrada_id = $entrada_entrada_id; 
 return $this; 
}
public function getcreate_time(){ 
 return $this->create_time; 
}
public function getupdate_time(){ 
 return $this->update_time; 
}
public function getentrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
}
}