<?php

namespace Acme\IntranetRestaurante\controllers;

use Acme\IntranetRestaurante\Models\Producto;
use Mnl\tools\Controlador;

class ProductoController extends Controlador
{

    private Producto $productoModel;

    // Constructor
    public function __construct(){
        $this->productoModel = new Producto();
    }

    public function index(){
        $productoModel = $this->modelo("Producto");
        $productoModel->productosPorCategoria();

        $this->vista('productos/index', ['productos' => $productos]);
    }
}