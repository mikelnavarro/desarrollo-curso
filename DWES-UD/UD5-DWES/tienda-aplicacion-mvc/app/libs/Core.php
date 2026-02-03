<?php
/*
Mapear URL desde el navegador
1- controlador
2- método
3- parámetro

formato de la url: BASE_DIR/controlador/metodo/parametro

*/
namespace Acme\IntranetRestaurante\libs;
class Core
{
    //controlador base o por defecto
    protected $controladorActual = 'CategoriaController';
    protected $metodoActual = 'categorias';
    protected $parametros = [];
    public $url = '';

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();

        // Buscar controlador: se espera que los archivos de controladores terminen en "Controller.php"
        if (isset($url) && file_exists(__DIR__ . '/../controllers/' . ucwords($url[0]) . 'Controller.php')) {
            $this->controladorActual = ucwords($url[0]) . 'Controller';
            unset($url[0]);
        }

        // Requerir el archivo del controlador y crear la instancia
        $controladorPath = __DIR__ . '/../controllers/' . $this->controladorActual . '.php';
        require_once $controladorPath;
        $this->controladorActual = new $this->controladorActual;

        //comprobar la segunda parte de la url: el metodo
        if (isset($url[1])) {
            if (method_exists($this->controladorActual, $url[1])) {
                //Comprobar el método
                $this->metodoActual = $url[1];
                //unset indice
                unset($url[1]);
            }
        }

        //Probando el método
        //echo $this->metodoActual;

        //Obtener parámetros
        $this->parametros = $url ? array_values($url) : [];

        // Llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getUrl(): ?array
    {
        //echo $_GET['url'];

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return null;
    }
}