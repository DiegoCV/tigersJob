<?php

 /**
 * Asignador de recursos
 */
 class Way
 {
 	
 	public function ruta($recurso)
 	{
 		echo '"vista/'.$recurso.'"';
 	}

 	public function rutaImg($entrada_entrada_id)
 	{
 		echo '"/tigersJob/imagen/getImagen/'.$entrada_entrada_id.'"';
 	}
 		
 	public function rutaNoticias($recurso)
 	{
 		echo '"../vista/'.$recurso.'"';

 	}
 		

 }