<?php 
  class estados{  
 private $id ; 
 private $nombre ; 
 private $descripcion ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->id = $data['id']; 
 

				            }

				            $this->nombre = $data['nombre']; 
$this->descripcion = $data['descripcion']; 
 

				        }

    }
public function setid($id){ 
 $this->id = $id; 
 return $this; 
}
public function setnombre($nombre){ 
 $this->nombre = $nombre; 
 return $this; 
}
public function setdescripcion($descripcion){ 
 $this->descripcion = $descripcion; 
 return $this; 
}
public function getid(){ 
 return $this->id; 
}
public function getnombre(){ 
 return $this->nombre; 
}
public function getdescripcion(){ 
 return $this->descripcion; 
}
}