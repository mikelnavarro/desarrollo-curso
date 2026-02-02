<?php
namespace Acme\IntranetRestaurante\Controllers;

use Mnl\Tools\Controlador;

class PaginasController extends Controlador {
    public function login() {
        $this->vista('Paginas/login');
    }
}
