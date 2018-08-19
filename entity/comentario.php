<?php 
  class comentario{  
 private $comentario_id ; 
 private $comentario_autor ; 
 private $comentario_email ; 
 private $comentario_contenido ; 
 private $comentario_create_date ; 
 private $entrada_entrada_id ; 
 private $comentario_padre ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->comentario_id = $data['comentario_id']; 
 

				            }

				            $this->comentario_autor = $data['comentario_autor']; 
$this->comentario_email = $data['comentario_email']; 
$this->comentario_contenido = $data['comentario_contenido']; 
$this->comentario_create_date = $data['comentario_create_date']; 
$this->entrada_entrada_id = $data['entrada_entrada_id']; 
$this->comentario_padre = $data['comentario_padre']; 
 

				        }

    }
public function setcomentario_id($comentario_id){ 
 $this->comentario_id = $comentario_id; 
 return $this; 
}
public function setcomentario_autor($comentario_autor){ 
 $this->comentario_autor = $comentario_autor; 
 return $this; 
}
public function setcomentario_email($comentario_email){ 
 $this->comentario_email = $comentario_email; 
 return $this; 
}
public function setcomentario_contenido($comentario_contenido){ 
 $this->comentario_contenido = $comentario_contenido; 
 return $this; 
}
public function setcomentario_create_date($comentario_create_date){ 
 $this->comentario_create_date = $comentario_create_date; 
 return $this; 
}
public function setentrada_entrada_id($entrada_entrada_id){ 
 $this->entrada_entrada_id = $entrada_entrada_id; 
 return $this; 
}
public function setcomentario_padre($comentario_padre){ 
 $this->comentario_padre = $comentario_padre; 
 return $this; 
}
public function getcomentario_id(){ 
 return $this->comentario_id; 
}
public function getcomentario_autor(){ 
 return $this->comentario_autor; 
}
public function getcomentario_email(){ 
 return $this->comentario_email; 
}
public function getcomentario_contenido(){ 
 return $this->comentario_contenido; 
}
public function getcomentario_create_date(){ 
 return $this->comentario_create_date; 
}
public function getentrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
}
public function getcomentario_padre(){ 
 return $this->comentario_padre; 
}
}