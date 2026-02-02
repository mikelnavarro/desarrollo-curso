<?php
namespace Mnl\Tools;

class Core
{
    private string $controlador = 'PaginasController';
    private string $metodo = 'login';
    private ?string $parametro = null;
    private array $url = [];

    public function __construct() {
        $this->procesarUrl();
        $this->resolverControlador();
        $this->resolverMetodo();
    }

    private function procesarUrl() {
        if(isset($_GET['url'])) {
            $this->url = explode('/', rtrim($_GET['url'], '/'));
        }
    }

    private function resolverControlador() {
        if(!empty($this->url[0])) {
            $archivo = __DIR__ . '/../controllers/' . ucfirst($this->url[0]) . 'Controlador.php';
            if(file_exists($archivo)) {
                $this->controlador = ucfirst($this->url[0]) . 'Controller';
                unset($this->url[0]);
            }
        }
        $this->controlador = "Acme\\IntranetRestaurante\\Controllers\\" . $this->controlador;
    }

    private function resolverMetodo() {
        if(!empty($this->url)) {
            $this->url = array_values($this->url);
            if(isset($this->url[1])) {
                $metodo = $this->url[1];
                if(method_exists($this->controlador, $metodo)) {
                    $this->metodo = $metodo;
                    unset($this->url[1]);
                }
            }
        }
        $this->parametros = !empty($this->url) ? array_values($this->url) : [];
    }
    public function ejecutar() {
        $controlador = new $this->controlador();
        call_user_func_array([$controlador, $this->metodo], $this->parametros);
    }
}
