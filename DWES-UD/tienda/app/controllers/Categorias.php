<?php
namespace Mikelnavarro\App;
use Mikelnavarro\App\Controlador;
class Categorias extends Controlador
{


    // Atributos
    private $categoriaModelo;

    public function __construct() {
        $this->productoModelo = $this->modelo('Producto');
        $this->categoriaModelo = $this->modelo('Categoria');
    }
    // Funciones Índice
    public function index() {
        $categorias = $this->categoriaModelo->obtenerCategorias();
        // 2. Preparamos los datos para la vista
        $datos = [
            'titulo' => 'Listado de Categorías',
            'categorias' => $categorias
        ];

        $this->vista('categorias/inicio', $datos);
    }
    // El ID llega aquí gracias al core
    public function productos($id) {
        if ($id == null) {
            header('Location: ' . RUTA_URL);
            exit;
        }

        // Buscamos productos filtrados por esa categoría
        $productos = $this->productoModelo->obtenerPorCategoria($id);
        $categoria = $this->categoriaModelo->getNombre($id);

        $datos = [
            'titulo' => ($categoria) ? 'Productos de ' . $categoria['Nombre'] : 'Categoría no encontrada',
            'productos' => $productos
        ];

        $this->vista('categorias/productos', $datos);
    }
}