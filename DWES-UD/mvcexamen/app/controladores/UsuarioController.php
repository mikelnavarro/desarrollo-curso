<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Usuario;
use Mnl\Mvcexamen\Controlador;


class UsuarioController extends Controlador
{



    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    // Funciones

    public function index(){
        $user = $this->usuarioModelo->login();
        $this->vista("paginas/login", ["user" => $user]);
    }

}