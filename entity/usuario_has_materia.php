<?php 
  class usuario_has_materia{  
 private $usuario_codigo ; 
 private $materia_codigo ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->usuario_codigo = $data['usuario_codigo']; 
$this->materia_codigo = $data['materia_codigo']; 
 

				        }

    }
public function setusuario_codigo($usuario_codigo){ 
 $this->usuario_codigo = $usuario_codigo; 
 return $this; 
}
public function setmateria_codigo($materia_codigo){ 
 $this->materia_codigo = $materia_codigo; 
 return $this; 
}
public function getusuario_codigo(){ 
 return $this->usuario_codigo; 
}
public function getmateria_codigo(){ 
 return $this->materia_codigo; 
}
}