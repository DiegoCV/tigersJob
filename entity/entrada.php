<?php 
  class entrada{   
 private $entrada_id ; 
 private $entrada_titulo ; 
 private $entrada_contenido ; 
 private $entrada_enlace ; 
 private $entrada_autor ; 
 private $fecha;
 private $imagen;
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->entrada_id = $data['entrada_id']; 
 

				            }

				            $this->entrada_titulo = $data['entrada_titulo']; 
$this->entrada_contenido = $data['entrada_contenido']; 
$this->entrada_enlace = $data['entrada_enlace']; 
$this->entrada_autor = $data['entrada_autor']; 
 

				        }

    }
public function setentrada_id($entrada_id){ 
 $this->entrada_id = $entrada_id; 
 return $this; 
}
public function setentrada_titulo($entrada_titulo){ 
 $this->entrada_titulo = $entrada_titulo; 
 return $this; 
}
public function setentrada_contenido($entrada_contenido){ 
 $this->entrada_contenido = $entrada_contenido; 
 return $this; 
}
public function setentrada_enlace($entrada_enlace){ 
 $this->entrada_enlace = $entrada_enlace; 
 return $this; 
}
public function setentrada_autor($entrada_autor){ 
 $this->entrada_autor = $entrada_autor; 
 return $this; 
}
public function getentrada_id(){ 
 return $this->entrada_id; 
}
public function getentrada_titulo(){ 
 return $this->entrada_titulo; 
}
public function getentrada_contenido(){ 
 return $this->entrada_contenido; 
}
public function getentrada_enlace(){ 
 return $this->entrada_enlace; 
}
public function getentrada_autor(){ 
 return $this->entrada_autor; 
}

public function setfecha($fecha){ 
 $this->fecha = $fecha; 
 return $this; 
}

 public function getfecha(){ 
 return $this->fecha; 
}

public function setimagen($imagen){ 
 $this->imagen = $imagen; 
 return $this; 
}

 public function getimagen(){ 
 return $this->imagen; 
}

}