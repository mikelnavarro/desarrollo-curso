<?php

namespace Mnl\Mvcexamen;

use Mnl\Mvcexamen\Controlador;

class UsuarioController extends Controlador
{

    // Funciones

    public function index(){
        $user = $this->modelo('Usuario')->login();
        $this->vista("login", ["user" => $user]);
    }

}