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
        $granTotal = 0;
        $itemsCarrito = [];
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            // Sacamos solo los IDs de los productos que hay en el carrito
            $ids = array_keys($_SESSION['carrito']);
            $productos_en_carrito = $productoModelo->obtenerVariosPorId($ids);

            // Procesamos los datos aquí para que la vista no tenga que calcular nada
            foreach ($productos_en_carrito as $p) {
                $cantidad = $_SESSION['carrito'][$p->CodProd];
                $subtotal = $p->Precio * $cantidad;
                $granTotal += $subtotal;
                // Creamos un array limpio
                $itemsCarrito[] = [
                    'CodProd'  => $p->CodProd,
                    'Nombre'   => $p->Nombre,
                    'Precio'   => $p->Precio,
                    'Cantidad' => $cantidad,
                    'Subtotal' => $subtotal
                ];
                $_SESSION['resumen'] = [
                    'total' => $subtotal,
                    'cantidad_articulos' => $cantidad,
                ];
            }
        }

        $datos = [
            'titulo' => 'Mi Carrito',
            'granTotal' => $granTotal,
            'productos_carrito' => $itemsCarrito,
        ];
        $this->vista('categorias/carrito', $datos);
    }

    // MÉTODO PARA ELIMINAR UN PRODUCTO
    public function eliminar($idProducto) {
        if (isset($_SESSION['carrito'][$idProducto])) {
            unset($_SESSION['carrito'][$idProducto]);
        }
        header('Location: ' . RUTA_URL . '/Carrito/ver');
    }
}