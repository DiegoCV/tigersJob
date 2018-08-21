<?php 
  class imagen{  
 private $imagen_id ; 
 private $imagen ; 
 private $imagen_tipo ; 
 private $entrada_entrada_id; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->imagen_id = $data['imagen_id']; 
 

				            }

				            $this->imagen = $data['imagen']; 
$this->imagen_tipo = $data['imagen_tipo']; 
$this->entrada_entrada_id = $data['entrada_entrada_id']; 
 

				        }

    }
public function setimagen_id($imagen_id){ 
 $this->imagen_id = $imagen_id; 
 return $this; 
}
public function setimagen($imagen){ 
 $this->imagen = $imagen; 
 return $this; 
}
public function setimagen_tipo($imagen_tipo){ 
 $this->imagen_tipo = $imagen_tipo; 
 return $this; 
}
public function setentrada_entrada_id($entrada_entrada_id){ 
 $this->entrada_entrada_id = $entrada_entrada_id; 
 return $this; 
}
public function getimagen_id(){ 
 return $this->imagen_id; 
}
public function getimagen(){ 
 return $this->imagen; 
}
public function getimagen_tipo(){ 
 return $this->imagen_tipo; 
}
public function getentrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
}
}