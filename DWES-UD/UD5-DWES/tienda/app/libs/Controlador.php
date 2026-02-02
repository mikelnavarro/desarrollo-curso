<?php
namespace Mnl\Tools;


class Controlador {
    protected $datos = [];

    protected function vista($ruta, $datos = []) {
        $this->datos = $datos;
        extract($datos);
        require_once __DIR__ . '/../views/' . $ruta . '.php';
    }

    protected function modelo($nombre) {
        $class = "Acme\\IntranetRestaurante\\Models\\$nombre";
        return new $class();
    }
}
