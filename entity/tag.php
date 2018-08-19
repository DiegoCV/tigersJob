<?php 
  class tag{  
 private $tag_id ; 
 private $tag_nombre ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                $this->tag_id = $data['tag_id']; 
 

				            }

				            $this->tag_nombre = $data['tag_nombre']; 
 

				        }

    }
public function settag_id($tag_id){ 
 $this->tag_id = $tag_id; 
 return $this; 
}
public function settag_nombre($tag_nombre){ 
 $this->tag_nombre = $tag_nombre; 
 return $this; 
}
public function gettag_id(){ 
 return $this->tag_id; 
}
public function gettag_nombre(){ 
 return $this->tag_nombre; 
}
}