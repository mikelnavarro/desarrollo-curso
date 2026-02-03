<?php

namespace Acme\IntranetRestaurante\Controllers;

use Mnl\tools\Controlador;

class CategoriaController extends Controlador
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = $this->modelo('Categoria');
    }

    // Mostrar listado de categorias
    public function index()
    {
        $categorias = $this->categoriaModel->getTodas();
        $this->vista('Categoria/listado', ['categorias' => $categorias]);
    }

    // Alias para index
    public function categorias()
    {
        $this->index();
    }

    // Listar productos por categoría
    public function listar(int $id)
    {
        $productos = $this->categoriaModel->getProductosPorCategoria($id);
        $this->vista('Producto/productos', ['productos' => $productos]);
    }
}
