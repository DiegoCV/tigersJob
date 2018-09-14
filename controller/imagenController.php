<?php
include_once dirname(__FILE__).'\..\entity\imagen.php';
include_once dirname(__FILE__).'\..\mapper\imagenMapper.php';
include_once dirname(__FILE__).'\..\core\Render.php';

class imagenController{

	/**
     * Permite guardar un objeto tipo imagen.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$imagen       = new imagen($_POST['data']);
        $imagenMapper = new imagenMapper();
        var_dump($imagenMapper->crearimagen($imagen));
	}

    public function getImagen($entrada_entrada_id){ 
        $imagenMapper = new imagenMapper();
        $imagenMapper->getImagen($entrada_entrada_id);
    }
	public function listar(){;
		$imagenMapper = new imagenMapper();
		$imagen = $imagenMapper->listarimagen();
		$render = new Render('listados/imagenList',$imagen);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $imagen = new imagen();

        $imagen->setimagen_id($_POST['data']['imagen_id']);
$imagen->setentrada_entrada_id($_POST['data']['entrada_entrada_id']);

        $imagenMapper = new imagenMapper();
        $imagenMapper->eliminar($imagen);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/imagenEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/imagenform');
    $render->mostrar();
    }
}