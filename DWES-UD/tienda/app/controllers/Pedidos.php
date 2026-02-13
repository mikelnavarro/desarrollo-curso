<?php

namespace Mikelnavarro\App;

use Mikelnavarro\App\Mailer;
use Mikelnavarro\App\Controlador;

class Pedidos extends Controlador
{

    protected $pedidoModelo;
    // Constructores
    public function __construct() {
        $this->pedidoModelo = $this->modelo('Pedido');
    }


    public function crear(){

        // Obtenemos de la propia sesión o de datos que están ocultos en formulario
        // Solo si hay sesión y carrito
        if (isset($_SESSION['usuario_id']) && !empty($_SESSION['carrito'])) {

            $email = $_POST['usuario_nombre'];
            $title = $_POST['titulo'];
            // Pasamos el ID del restaurante (CodRes) y el array del carrito
            $exito = $this->pedidoModelo->guardarPedido($_SESSION['usuario_id'], $_SESSION['carrito']);
            if ($exito) {
                // unset($_SESSION['carrito']);
                // Método Mailer -> enviar correos
                // Mailer::send($_SESSION['usuario_email'], $this->pedidoModelo->getNombr,$_SESSION['carrito']);
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