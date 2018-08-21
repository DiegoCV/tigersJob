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
 		
 			public function rutaNoticias($recurso)
 	{
 		echo '"../vista/'.$recurso.'"';

 	}
 		

 }