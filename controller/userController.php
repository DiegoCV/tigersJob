<?php
include_once substr(getcwd(), 0,26).'\entity\user.php';
include_once substr(getcwd(), 0,26).'\mapper\userMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class userController{

	/**
     * Permite guardar un objeto tipo user.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$user       = new user($_POST['data']);
        $userMapper = new userMapper();
        var_dump($userMapper->crearuser($user));
	}
	public function listar(){;
		$userMapper = new userMapper();
		$user = $userMapper->listaruser();
		$render = new Render('listados/userList',$user);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $user = new user();

        $user->setusername($_POST['data']['username']);

        $userMapper = new userMapper();
        $userMapper->eliminar($user);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/userEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/userform');
    $render->mostrar();
    }
}