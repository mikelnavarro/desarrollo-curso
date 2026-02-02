<?php

namespace Acme\IntranetRestaurante\Controllers;
use Acme\IntranetRestaurante\Models\Categoria;
use Mnl\tools\Controlador;


class CategoriaController extends Controlador
{

    public function __construct()
    {
        $this->categoriaModel = new Categoria();
    }
    public function index() {
        $categoriaModel = $this->modelo('Articulo');
        $categorias = $categoriaModel->getTodas();


        $this->vista('categoria/index', ['categorias' => $articulos]);
    }
    /**
     * Muestra la lista de todas las categorías.
     */
    public function categorias()
    {
        $categorias = $this->categoriaModel->getTodas();
        $this->vista('Categoria/listado', ['categorias' => $categorias]);
    }

    /**
     * Muestra los productos de una categoría específica.
     *
    * @param int $id ID de la categoría
    */
    public function listar(int $id)
    {
        $productos = $this->categoriaModel->getProductosPorCategoria($id);
        $this->vista('categoria/listar', [
            'productos' => $productos,
            'categoriaId' => $id
        ]);
    }
}
