<?php

namespace Acme\IntranetRestaurante\Controllers;

use Mnl\tools\Controlador;

class ProductoController extends Controlador
{

    private $productoModel;

    public function __construct()
    {
        $this->productoModel = $this->modelo('Producto');
    }

    public function index()
    {
        $productos = $this->productoModel->listar();
        $this->vista('Producto/productos', ['productos' => $productos]);
    }
}