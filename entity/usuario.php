<?php 
  class usuario{  
 private $codigo ; 
 private $nombre ; 
 private $apellido ; 
 private $clave ; 
 private $correo ; 
 private $isProfesor ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->codigo = $data['codigo']; 
$this->nombre = $data['nombre']; 
$this->apellido = $data['apellido']; 
$this->clave = $data['clave']; 
$this->correo = $data['correo']; 
$this->isProfesor = $data['isProfesor']; 
 

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
public function setapellido($apellido){ 
 $this->apellido = $apellido; 
 return $this; 
}
public function setclave($clave){ 
 $this->clave = $clave; 
 return $this; 
}
public function setcorreo($correo){ 
 $this->correo = $correo; 
 return $this; 
}
public function setisProfesor($isProfesor){ 
 $this->isProfesor = $isProfesor; 
 return $this; 
}
public function getcodigo(){ 
 return $this->codigo; 
}
public function getnombre(){ 
 return $this->nombre; 
}
public function getapellido(){ 
 return $this->apellido; 
}
public function getclave(){ 
 return $this->clave; 
}
public function getcorreo(){ 
 return $this->correo; 
}
public function getisProfesor(){ 
 return $this->isProfesor; 
}
}