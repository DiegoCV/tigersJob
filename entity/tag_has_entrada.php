<?php 
  class tag_has_entrada{  
 private $tag_tag_id ; 
 private $entrada_entrada_id ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->tag_tag_id = $data['tag_tag_id']; 
$this->entrada_entrada_id = $data['entrada_entrada_id']; 
 

				        }

    }
public function settag_tag_id($tag_tag_id){ 
 $this->tag_tag_id = $tag_tag_id; 
 return $this; 
}
public function setentrada_entrada_id($entrada_entrada_id){ 
 $this->entrada_entrada_id = $entrada_entrada_id; 
 return $this; 
}
public function gettag_tag_id(){ 
 return $this->tag_tag_id; 
}
public function getentrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
}
}