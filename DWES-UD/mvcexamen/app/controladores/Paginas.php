<?php
namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;

    class Paginas extends Controlador{

        public function __construct(){

        }
        public function login() {

            $datos = [
                'titulo' => NOMBRESITIO,
            ];
            $this->vista('paginas/login',$datos);
        }
        public function index(){

            $datos = [
                'titulo' => NOMBRESITIO,
            ];

            $this->vista('paginas/inicio', $datos);    
        }


    }