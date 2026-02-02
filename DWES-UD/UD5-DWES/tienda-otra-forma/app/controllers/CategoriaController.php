<?php
namespace Acme\IntranetRestaurante\Controllers;

use Mnl\Tools\Controlador;

class CategoriaController extends Controlador {
    public function categorias() {
        $categorias = $this->modelo('Categoria')->todas();
        $this->vista('Categoria/categorias',['categorias'=>$categorias]);
    }



    public function listar($codCat) {
        $categoria = $this->modelo('Categoria')->buscarPorId($codCat);
        $productos = $this->modelo('Producto')->productosDeCategoria($codCat);
        $this->vista('Categoria/listar',['categoria'=>$categoria,'productos'=>$productos]);
    }
}
