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
    public function autenticar() {
        // Si el metodo es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $clave = $_POST['clave'];
            $usuario = $this->usuarioModelo->verificarCredenciales($email, $clave);
            if ($usuario) {
                // Guardar la sesión
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['logueado'] = true;

                // Redirigir
                header('Location: ' . RUTA_URL . 'mascotas/inicio');
                exit;
            } else {
                $datos = ['mensaje' => 'Email o contraseña incorrectos'];
                $this->vista('paginas/login', $datos);
                return;
            }
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