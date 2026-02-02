<?php
class Articulos extends Controlador {

    public function
    () {
        $articuloModel = $this->modelo('Articulo');
        $articulos = $articuloModel->obtenerArticulos();

        
        $this->vista('articulos/index', ['articulos' => $articulos]);
    }
}

