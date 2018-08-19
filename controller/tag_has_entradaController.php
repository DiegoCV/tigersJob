<?php
include_once substr(getcwd(), 0,26).'\entity\tag_has_entrada.php';
include_once substr(getcwd(), 0,26).'\mapper\tag_has_entradaMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class tag_has_entradaController{

	/**
     * Permite guardar un objeto tipo tag_has_entrada.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$tag_has_entrada       = new tag_has_entrada($_POST['data']);
        $tag_has_entradaMapper = new tag_has_entradaMapper();
        var_dump($tag_has_entradaMapper->creartag_has_entrada($tag_has_entrada));
	}
	public function listar(){;
		$tag_has_entradaMapper = new tag_has_entradaMapper();
		$tag_has_entrada = $tag_has_entradaMapper->listartag_has_entrada();
		$render = new Render('listados/tag_has_entradaList',$tag_has_entrada);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $tag_has_entrada = new tag_has_entrada();

        $tag_has_entrada->settag_tag_id($_POST['data']['tag_tag_id']);
$tag_has_entrada->setentrada_entrada_id($_POST['data']['entrada_entrada_id']);

        $tag_has_entradaMapper = new tag_has_entradaMapper();
        $tag_has_entradaMapper->eliminar($tag_has_entrada);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/tag_has_entradaEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/tag_has_entradaform');
    $render->mostrar();
    }
}