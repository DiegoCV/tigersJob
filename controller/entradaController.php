<?php
include_once substr(getcwd(), 0,26).'\entity\entrada.php';
include_once substr(getcwd(), 0,26).'\entity\imagen.php';
include_once substr(getcwd(), 0,26).'\mapper\entradaMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class entradaController{

	/**
     * Permite guardar un objeto tipo entrada.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
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
        
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        $data = fopen($_FILES['imagen']['tmp_name'], 'rb');
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.

        //creamos un objeto tipo imagen
        $imagen = new imagen();
        $imagen->setimagen($data);
        $imagen->setimagen_tipo($tipo);

        //creamos un objeto tipo entrada
        $entrada = new entrada();
        $entrada->setimagen($imagen);

        //creamos objeto de persistencia y lo agregamos
        $entradaMapper = new entradaMapper();
        $resultado = $entradaMapper->crearentrada($entrada);

        if ($resultado)
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