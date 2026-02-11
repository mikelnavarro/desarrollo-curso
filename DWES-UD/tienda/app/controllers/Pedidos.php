<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Controlador;

class Pedidos extends Controlador
{


    // Constructores
    public function __construct() {
        $this->pedidoModelo = $this->modelo('Pedido');
    }


    public function confirma(){
        // Solo si hay sesión y carrito
        if (isset($_SESSION['usuario_id']) && !empty($_SESSION['carrito'])) {

            $pedidoModelo = $this->modelo('Pedido');

            // Pasamos el ID del restaurante (CodRes) y el array del carrito
            $exito = $pedidoModelo->guardarPedido($_SESSION['usuario_id'], $_SESSION['carrito']);
            if ($exito) {
                unset($_SESSION['carrito']);
                header('Location: ' . RUTA_URL . '/Categorias/inicio');
            } else {
                die("Algo salió mal");
            }
        } else {
            header('Location: ' . RUTA_URL . '/Categorias/inicio');
        }
    }
    public function index() {

    }


}