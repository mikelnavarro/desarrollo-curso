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


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtenemos de la propia sesión o de datos que están ocultos en formulario
            $CodRes = $_SESSION['usuario_id'];
            $email = $_SESSION['usuario_nombre'];

            $productosCarrito = $_SESSION['carrito']; // Array de productos del carrito
            $resumen = $_SESSION['resumen'];
            // Obtener datos del formulario
            $envio = [
                'direccion' => $_POST['direccion'],
                'metodo'    => $_POST['metodo_pago'],
            ];
        }
        // Solo si hay sesión y carrito
        if ($_SESSION["usuario_id"] && !empty($productosCarrito)) {

            // Pasamos el ID del restaurante (CodRes) y el array del carrito
            // Lógica de negocio: Guardar en DB
            $exito = $this->pedidoModelo->guardarPedido($CodRes, $productosCarrito);
            if ($exito) {
                echo "pedido creado con exito";
                // Método Mailer -> enviar correos
                Mailer::send($email,$exito,$_SESSION["carrito"],$resumen,$envio);
                // unset($_SESSION['carrito']);

                header('Location: ' . RUTA_URL . '/Categorias/inicio');
            } else {
                die("Algo salió mal");
            }
        }
    }
    public function index() {

    }


}