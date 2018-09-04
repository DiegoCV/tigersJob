<?php
include_once dirname(__FILE__).'\entity\tag.php';
include_once dirname(__FILE__).'\mapper\tagMapper.php';
include_once dirname(__FILE__).'\core\Render.php';

class tagController{

	/**
     * Permite guardar un objeto tipo tag.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$tag       = new tag($_POST['data']);
        $tagMapper = new tagMapper();
        var_dump($tagMapper->creartag($tag));
	}
	public function listar(){;
		$tagMapper = new tagMapper();
		$tag = $tagMapper->listartag();
		$render = new Render('listados/tagList',$tag);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $tag = new tag();

        $tag->settag_id($_POST['data']['tag_id']);

        $tagMapper = new tagMapper();
        $tagMapper->eliminar($tag);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/tagEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/tagform');
    $render->mostrar();
    }
}