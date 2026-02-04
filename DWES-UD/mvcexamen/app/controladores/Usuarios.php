<?php

namespace Mnl\Mvcexamen;

use Mnl\Mvcexamen\Controlador;

class Usuarios extends Controlador
{

    protected $usuarioModelo;
    // Constructores
    public function __construct(){
        $this->usuarioModelo = $this->modelo('Usuario');
    }

    // Muestra el formulario de login
    public function login() {
        // Si el metodo es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $usuario = $this->usuarioModelo->verificarCredenciales($email, $password);
            if ($usuario) {
                // ¡Login correcto!
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['logueado'] = true;

                // Redirigir
                header('Location: ' . RUTA_URL . 'paginas/inicio');
                exit;
            } else {
                $datos = ['mensaje' => 'Email o contraseña incorrectos'];
                $this->vista('paginas/login', $datos);
                return;
            }
            $this->vista('paginas/login', $datos);
        }
    }

    // Función para destruir sesion
    public function logout()
    {
        session_destroy();
        header('Location: ' . RUTA_URL . '/paginas/login');
        exit;
    }
}