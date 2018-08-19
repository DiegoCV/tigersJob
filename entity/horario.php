<?php 
  class horario{  
 private $dia_id ; 
 private $hora_id ; 
 private $materia_codigo ; 
 private $id ; 
 private $isClase ; 
 private $salon ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->id = $data['id']; 
 

				            }

				            $this->dia_id = $data['dia_id']; 
$this->hora_id = $data['hora_id']; 
$this->materia_codigo = $data['materia_codigo']; 
$this->isClase = $data['isClase']; 
$this->salon = $data['salon']; 
 

				        }

    }
public function setdia_id($dia_id){ 
 $this->dia_id = $dia_id; 
 return $this; 
}
public function sethora_id($hora_id){ 
 $this->hora_id = $hora_id; 
 return $this; 
}
public function setmateria_codigo($materia_codigo){ 
 $this->materia_codigo = $materia_codigo; 
 return $this; 
}
public function setid($id){ 
 $this->id = $id; 
 return $this; 
}
public function setisClase($isClase){ 
 $this->isClase = $isClase; 
 return $this; 
}
public function setsalon($salon){ 
 $this->salon = $salon; 
 return $this; 
}
public function getdia_id(){ 
 return $this->dia_id; 
}
public function gethora_id(){ 
 return $this->hora_id; 
}
public function getmateria_codigo(){ 
 return $this->materia_codigo; 
}
public function getid(){ 
 return $this->id; 
}
public function getisClase(){ 
 return $this->isClase; 
}
public function getsalon(){ 
 return $this->salon; 
}
}