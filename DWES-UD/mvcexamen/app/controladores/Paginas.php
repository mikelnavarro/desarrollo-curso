<?php
namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;

    class Paginas extends Controlador{

        public function __construct(){

        }

        // Esto coge el título de datos, y puedes agregarlo a las vistas
        // Qué se podrá hacer
        public function index() {


            // Si ya está logueado
            if (isset($_SESSION['usuario'])) {
                header("Location: " . RUTA_URL . "mascotas/inicio");
                exit;
            }


            // Si no
            $datos = [
                "titulo" => "Iniciar sesión"
            ];

            $this->vista("paginas/login", $datos);
        }


    }