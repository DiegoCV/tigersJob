<?php
include_once substr(getcwd(), 0,26).'\entity\entrada.php';
include_once substr(getcwd(), 0,26).'\mapper\entradaMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class entradaController{

	/**
     * Permite guardar un objeto tipo entrada.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$entrada       = new entrada($_POST['data']);
        $entradaMapper = new entradaMapper();
        var_dump($entradaMapper->crearentrada($entrada));
	}

	public function listar(){;
		$entradaMapper = new entradaMapper();
		$entrada = $entradaMapper->listarentrada();
		$render = new Render('listados/entradaList',$entrada);
        $render->mostrar();
	}

    public function getEntradaByEnlace($enlace)
    {
        $entradaMapper = new entradaMapper();
        return $entradaMapper->getEntradaByEnlace($enlace);
    }
    

	public function actualizar(){

	}

	 public function eliminar(){
        $entrada = new entrada();

        $entrada->setentrada_id($_POST['data']['entrada_id']);

        $entradaMapper = new entradaMapper();
        $entradaMapper->eliminar($entrada);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/entradaEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/entradaform');
    $render->mostrar();
    }
}