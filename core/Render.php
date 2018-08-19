<?php
//include_once '../vista/';
class Render {
    private $vista;
    private $datos;

    public function __construct($vista, array $datos = null) {
        $this->vista = $vista;
        $this->datos = $datos;
    }

    public function mostrar() {
        $ruta = getcwd();
        $controllerLocation = $ruta . '\vista\\' . $this->vista . '.php';
        if (file_exists($controllerLocation)) {
           include_once $controllerLocation;
        } else {
            $controllerLocation = $ruta . '\vista\404.php';
            include_once $controllerLocation;
        }
    }

    
}