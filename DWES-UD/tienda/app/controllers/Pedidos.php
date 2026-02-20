<?php

namespace Mikelnavarro\App;

use Mikelnavarro\App\Mailer;
use Mikelnavarro\App\Controlador;

class Pedidos extends Controlador
{
    protected $productoModelo;
    protected $pedidoModelo;
    // Constructores
    public function __construct() {
        $this->productoModelo = $this->modelo('Producto');
        $this->pedidoModelo = $this->modelo('Pedido');
    }


    public function crear(){


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtenemos de la propia sesión o de datos que están ocultos en formulario
            $CodRes = $_SESSION['usuario_id'];
            $email = $_SESSION['usuario_nombre'];

            $productosCarrito = $_SESSION['carrito']; // Array de productos del carrito
            $resumen = $_SESSION['resumen'];

            // Sacamos solo los IDs de los productos que hay en el carrito
            $ids = array_keys($_SESSION['carrito']);
            $productos_en_carrito = $this->productoModelo->obtenerVariosPorId($ids);
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
            $exito = $this->pedidoModelo->guardarPedido($CodRes, $_SESSION['carrito']);
            if ($exito) {
                echo "<pre>";
                echo print_r($productos_en_carrito);
                echo print_r($_SESSION['carrito']);
                echo print_r($resumen);
                echo "</pre>";
                echo "pedido creado con exito";
                // Llamamos al modelo de producto para restar unidades
                foreach ($productosCarrito as $idProd => $cantidad) {
                    $this->pedidoModelo->guardarLinea($exito, $idProd, $cantidad);
                    $this->productoModelo->cambiarStock($idProd, $productosCarrito);
                }
                // $cambiarStockP = $this->productoModelo->cambiarStock($productos_en_carrito['CodProd'], $_SESSION['carrito']);
                // Método Mailer -> enviar correos
                $enviado = Mailer::send($email,$exito,$productos_en_carrito,$resumen,$envio);
                if ($enviado) {
                    $this->pedidoModelo->marcarComoEnviado($exito);
                    $datos = [
                        "mensaje" => "Pedido realizado correctamente",
                        'resumen' => $resumen
                    ];
                    $this->vista('categorias/pedido', $datos);
                }
                unset($_SESSION['resumen']);
                unset($_SESSION['carrito']);
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