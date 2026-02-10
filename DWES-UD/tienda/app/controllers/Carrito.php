<?php

namespace Mikelnavarro\App;

use Mikelnavarro\App\Controlador;

class Carrito extends Controlador
{


    // Constructor
    public function __construct() {
    }

    public function agregar($idProducto) {
        // Si el carrito no existe en la sesión, lo creamos
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si el producto ya está, aumentamos cantidad, si no, lo añadimos
        if (isset($_SESSION['carrito'][$idProducto])) {
            $_SESSION['carrito'][$idProducto]++;
        } else {
            $_SESSION['carrito'][$idProducto] = 1;
        }

        // Redirigimos atrás para seguir comprando
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function ver() {
        $productoModelo = $this->modelo('Producto');
        $productos_en_carrito = [];

        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            // Sacamos solo los IDs de los productos que hay en el carrito
            $ids = array_keys($_SESSION['carrito']);
            $productos_en_carrito = $productoModelo->obtenerVariosPorId($ids);
        }
        $datos = [
            'titulo' => 'Mi Carrito',
            'productos_carrito' => $productos_en_carrito
        ];
        $this->vista('categorias/carrito');
    }
}