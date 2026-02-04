<?php
namespace Usuario\Mvcrecuperacion;

use Usuario\Mvcrecuperacion\Controlador;

class Paginas extends Controlador{

        public function __construct() {
        }

        public function index(){
            // Si ya está logueado
            if (isset($_SESSION['usuario'])) {
                header("Location: " . RUTA_URL . "/paginas/personas");
                exit;
            }
            // Si no
            $datos = [
                "titulo" => "Iniciar sesión"
            ];

            $this->vista("paginas/personas", $datos);
        }


    }