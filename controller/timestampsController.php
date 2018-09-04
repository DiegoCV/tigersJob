<?php
include_once dirname(__FILE__).'\entity\timestamps.php';
include_once dirname(__FILE__).'\mapper\timestampsMapper.php';
include_once dirname(__FILE__).'\core\Render.php';

class timestampsController{

	/**
     * Permite guardar un objeto tipo timestamps.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$timestamps       = new timestamps($_POST['data']);
        $timestampsMapper = new timestampsMapper();
        var_dump($timestampsMapper->creartimestamps($timestamps));
	}
	public function listar(){;
		$timestampsMapper = new timestampsMapper();
		$timestamps = $timestampsMapper->listartimestamps();
		$render = new Render('listados/timestampsList',$timestamps);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $timestamps = new timestamps();

        $timestamps->setentrada_entrada_id($_POST['data']['entrada_entrada_id']);

        $timestampsMapper = new timestampsMapper();
        $timestampsMapper->eliminar($timestamps);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/timestampsEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/timestampsform');
    $render->mostrar();
    }
}