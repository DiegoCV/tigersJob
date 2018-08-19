<?php 
  class salon{  
 private $id ; 
 private $codigo ; 
  public function __construct(array $data = null) { 
if (!is_null($data)) { 
$this->id = $data['id']; 
$this->codigo = $data['codigo']; 
}

    }
public function setid($id){ 
 $this->id = $id; 
 return $this; 
}
public function setcodigo($codigo){ 
 $this->codigo = $codigo; 
 return $this; 
}
public function getid(){ 
 return $this->id; 
}
public function getcodigo(){ 
 return $this->codigo; 
}
}