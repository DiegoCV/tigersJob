<?php
include_once 'Render.php';
include_once substr(getcwd(), 0,26).'/controller/entradaController.php';
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
        $entradaController = new entradaController();
        $this->direccionarNoticia($entradaController->getEntradaByEnlace($router[2]));
      }else{
        if ($router[1]="imagen") {
          $this->controller = $router[1]."Controller"; 
          $this->action = $router[2];
          $this->direccionarImg($router[3]); 
        }else{
        $this->controller = $router[1]."Controller"; 
        $this->action = $router[2]; 
        $this->direccionar(); 
        }
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

     public function direccionarImg($id)
     {
       $ruta = getcwd();         
           $controllerLocation = $ruta . '\controller\imagenController.php'; 
           include_once $controllerLocation;
           $img = new imagenController();
           $img->getImagen(trim($id));
     }

     public function direccionarVista(){
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

     public function direccionarNoticia($entrada = null){     
          $render = new Render('news',$entrada); 
           $render->mostrar(); 
     }
   

}  




//pagina.com/index.php?controller=Clientes&action=verClientes