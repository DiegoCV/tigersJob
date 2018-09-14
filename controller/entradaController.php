<?php
include_once dirname(__FILE__,2).'\entity\entrada.php';
include_once dirname(__FILE__,2).'\entity\imagen.php';
include_once dirname(__FILE__,2).'\mapper\entradaMapper.php';
include_once dirname(__FILE__,2).'\mapper\imagenMapper.php';
include_once dirname(__FILE__,2).'\core\Render.php';

class entradaController{

    private $cantPag;

	/**
     * Permite guardar un objeto tipo entrada.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */

    public function b($value='')
    {
        $imagenMapper = new imagenMapper();
        $imagenMapper->getImagen(2);
    }

	public function crear(){
        // Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
    echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {

        // Tipo de archivo
        $tipo = $_FILES['imagen']['type'];  
        $ruta = "tmp/" .$_POST['enlace'].".".explode("/", $tipo)[1];
        @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
        
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
       // $data = fopen($_FILES['imagen']['tmp_name'], 'rb');
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
/**
        //creamos un objeto tipo imagen
        $imagen = new imagen();
        $imagen->setimagen($data);
        $imagen->setimagen_tipo($tipo);*/

        //creamos un objeto tipo entrada
        $entrada = new entrada();
        //$entrada->setimagen($imagen);
        $entrada->setentrada_titulo($_POST['titulo']); 
        $entrada->setentrada_contenido($_POST['contenido']) ; 
        $entrada->setentrada_enlace($_POST['enlace']) ; 
        $entrada->setentrada_autor("DiegoCV") ; 

        //creamos objeto de persistencia y lo agregamos
        $entradaMapper = new entradaMapper();
        $resultado = $entradaMapper->crearentrada($entrada);

        if ($resultado > 0)
        {
            echo "El archivo ha sido copiado exitosamente.";
        }
        else
        {
            echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
	
	}

    /**
 * subir_fichero()
 *
 * Sube una imagen al servidor  al directorio especificado teniendo el Atributo 'Name' del campo archivo.
 *
 * @param string $directorio_destino Directorio de destino dónde queremos dejar el archivo
 * @param string $nombre_fichero Atributo 'Name' del campo archivo
 * @return boolean
 */
function subir_fichero($directorio_destino, $nombre_fichero)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        echo 1;
        // Si se trata de una imagen   
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
 strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            echo 2;
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
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

      public function getTotalEntradas()
    {
        $entradaMapper = new entradaMapper();
        return $entradaMapper->getTotalEntradas();
    }
    
    public function imprimirPaginacion()
    {
        $cont = 0;
        $aux = "";
        $cantPaginas = $this->getTotalEntradas();
        while ($cantPaginas > 0) {
            $cont++;
            $aux .= '<li class="page-item"><a class="page-link" href="javascript:cargarPagina('.$cont.')">'.$cont.'</a></li>';
            $cantPaginas = $cantPaginas - 6;
        }
        return $aux;
    }

    public function getCantPaginas()
    {
        if($this->cantPag == null){
            $cont = 0;
            $cantPaginas = $this->getTotalEntradas();
            while ($cantPaginas > 0) {
                $cont++;
                $cantPaginas = $cantPaginas - 6;
            }
            $this->cantPag = $cont;
            return $cont;
        }else{
            return $this->cantPag;
        }
        
    }

    public function siguiente()
    {
        session_start();
        if($_SESSION['pagAct'] < $this->getCantPaginas()){
            $_SESSION['pagAct'] = $_SESSION['pagAct'] + 1;
        }
          
    }

    public function anterior()
    {
        session_start();
        if($_SESSION['pagAct'] > 1){
            $_SESSION['pagAct'] = $_SESSION['pagAct'] - 1;
        }
    }

    public function cargarPagina()
    {
        session_start();
        $r = $_POST["pag"];
        $_SESSION['pagAct'] = $r;
 
    }
    
    public function getEntradas($value='')
    {
        
        $aux = $_SESSION['pagAct'];
        $entradaMapper = new entradaMapper();
        $entradas = $entradaMapper->getEntradas((($aux*6)-5),6);

        $res="";
        foreach ($entradas as $key => $value) {
            $res.='<div class="col-md-6 col-lg-4 py-0 mt-4 mt-lg-0">
                        <div class="background-white pb-4 h-100 radius-secondary"><img class="w-100 radius-tr-secondary radius-tl-secondary" src="tmp/'.$value->getentrada_enlace().'.jpg" alt="Featured Image" />
                            <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden"><a href="noticias/'.$value->getentrada_enlace().'">
                                    <h5 data-zanim=\'{"delay":0}\'>'.$value->getentrada_titulo().'</h5>
                                    </a></div>
                                <div class="overflow-hidden">
                                    <p class="color-7" data-zanim=\'{"delay":0.1}\'>Por '.$value->getentrada_autor().'</p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim=\'{"delay":0.2}\'>'.$value->getentrada_contenido().'</p>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-inline-block" data-zanim=\'{"delay":0.3}\'><a class="d-flex align-items-center" href="noticias/'.$value->getentrada_enlace().'">Mas informacion<div class="overflow-hidden ml-2" data-zanim=\'{"from":{"opacity":0,"x":-30},"to":{"opacity":1,"x":0},"delay":0.8}\'><span class="d-inline-block">&xrarr;</span></div></a></div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $res;
        
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