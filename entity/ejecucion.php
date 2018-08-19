<?php 
  class ejecucion{  
 private $id ; 
 private $comentario ; 
 private $salon_id ; 
 private $fecha ; 
 private $estado_id ; 
 private $horario_id ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->id = $data['id']; 
 

				            }

				            $this->comentario = $data['comentario']; 
$this->salon_id = $data['salon_id']; 
$this->fecha = $data['fecha']; 
$this->estado_id = $data['estado_id']; 
$this->horario_id = $data['horario_id']; 
 

				        }

    }
public function setid($id){ 
 $this->id = $id; 
 return $this; 
}
public function setcomentario($comentario){ 
 $this->comentario = $comentario; 
 return $this; 
}
public function setsalon_id($salon_id){ 
 $this->salon_id = $salon_id; 
 return $this; 
}
public function setfecha($fecha){ 
 $this->fecha = $fecha; 
 return $this; 
}
public function setestado_id($estado_id){ 
 $this->estado_id = $estado_id; 
 return $this; 
}
public function sethorario_id($horario_id){ 
 $this->horario_id = $horario_id; 
 return $this; 
}
public function getid(){ 
 return $this->id; 
}
public function getcomentario(){ 
 return $this->comentario; 
}
public function getsalon_id(){ 
 return $this->salon_id; 
}
public function getfecha(){ 
 return $this->fecha; 
}
public function getestado_id(){ 
 return $this->estado_id; 
}
public function gethorario_id(){ 
 return $this->horario_id; 
}
}