<?php
include_once 'Way.php';
class Render {
    private $vista;
    private $datos;
    private $way;

    public function __construct($vista, array $datos = null) {
        $this->vista = $vista;
        $this->datos = $datos;
        $this->way = new Way();
    }

    public function mostrar() {
        $ruta = getcwd();
        $controllerLocation = $ruta . '/vista/' . $this->vista . '.php';
        if (file_exists($controllerLocation)) {
          include_once $controllerLocation;
        } else {
            $controllerLocation = $ruta . '/vista/404.php';
            include_once $controllerLocation;
        }
    }

    
}