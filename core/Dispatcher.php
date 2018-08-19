<?php
include_once 'Render.php';
class Dispatcher { 
      private $controller;
      private $action;
      private $vista;

     public function __construct($router) {
      $this->controller = 'default'; 
      $this->action = 'error'; 

  if(empty($router[0]) && empty($router[1])){
    header('location:vista/index.php');
    }else if(empty($router[0]) && !empty($router[1]) && empty($router[2])){ 
      //$this->vista = substr($router[1],0,strlen($router[1])-4);  
      $this->vista = $router[1];  
      $this->direccionarVista();
    }else{
      if($router[1] == 'noticias'){
        print_r($router[2]);
      }else{
      $this->controller = $router[1]."Controller"; 
      $this->action = $router[2]; 
      $this->direccionar(); 
      }
    }
  } 

     public function direccionar()
     {
       $ruta = getcwd();
           
           $controllerLocation = $ruta . '\controller\\' . $this->controller . '.php'; 

           if( file_exists( $controllerLocation ) ) { 
                 include_once( $controllerLocation ); 
           } else { 
                 throw new Exception("No se encuentra el controlador $controllerLocation"); 
           } 

           if( class_exists( $this->controller, false ) ) { 
                  $cont = new $this->controller(); 
           } else { 
                  throw new Exception( "Controller Class not found $controller" ); 
           } 

           if( method_exists ( $cont, $this->action ) ) { 
                  $algo = $this->action;                 
                  $cont->$algo(); 
           } else { 
                   throw new Exception( "Action not callable $action" ); 
           } 
     }

     public function direccionarVista(){
      $ruta = getcwd();
      switch ($this->vista) {
        case 'noticias':
          $render = new Render('newsroom'); 
          break;

        case 'news':
          $render = new Render('error'); 
          break;
        
        default:
          $render = new Render($this->vista); 
          break;
      }

       $render->mostrar(); 
     }
   

}  




//pagina.com/index.php?controller=Clientes&action=verClientes