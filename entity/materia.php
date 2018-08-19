<?php 
  class materia{  
  	
 private $codigo ; 
 private $nombre ; 


  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->codigo = $data['codigo']; 
$this->nombre = $data['nombre']; 
 

				        }

    }
public function setcodigo($codigo){ 
 $this->codigo = $codigo; 
 return $this; 
}
public function setnombre($nombre){ 
 $this->nombre = $nombre; 
 return $this; 
}
public function getcodigo(){ 
 return $this->codigo; 
}
public function getnombre(){ 
 return $this->nombre; 
}
}