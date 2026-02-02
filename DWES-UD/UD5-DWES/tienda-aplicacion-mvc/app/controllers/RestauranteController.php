<?php

namespace Acme\IntranetRestaurante\Controllers;
use Acme\IntranetRestaurante\Models\Usuario;
use Mnl\tools\Controlador;



class RestauranteController extends Controlador {

    public function login() {
        $correo = $_POST['correo'] ?? '';
        $clave  = $_POST['clave'] ?? '';

        $usuario = Usuario::login($correo, $clave);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header("Location: /Categoria/categorias");
            exit;
        }

        $this->vista('Paginas/login', ['error' => 'Credenciales incorrectas']);
    }

    public function loginForm() {
        $this->vista('Paginas/login');
    }
    public function logout() {
        unset($_SESSION['usuario']);
        session_destroy();
        $this->vista('Paginas/login', ['msg' => 'Sesión cerrada']);
    }
}
