<?php
include_once substr(getcwd(), 0,26).'\entity\comentario.php';
include_once substr(getcwd(), 0,26).'\mapper\comentarioMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class comentarioController{

	/**
     * Permite guardar un objeto tipo comentario.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$comentario       = new comentario($_POST['data']);
        $comentarioMapper = new comentarioMapper();
        var_dump($comentarioMapper->crearcomentario($comentario));
	}
	public function listar(){;
		$comentarioMapper = new comentarioMapper();
		$comentario = $comentarioMapper->listarcomentario();
		$render = new Render('listados/comentarioList',$comentario);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $comentario = new comentario();

        $comentario->setcomentario_id($_POST['data']['comentario_id']);

        $comentarioMapper = new comentarioMapper();
        $comentarioMapper->eliminar($comentario);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/comentarioEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/comentarioform');
    $render->mostrar();
    }
}