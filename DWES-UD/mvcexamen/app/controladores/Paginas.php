<?php
namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;

    class Paginas extends Controlador{

        public function __construct(){

        }

        // Esto coge el título de datos, y puedes agregarlo a las vistas
        // Qué se podrá hacer
        public function index(){

            $datos = [
                'titulo' => NOMBRESITIO,
            ];

            $this->vista('paginas/inicio', $datos);    
        }


    }