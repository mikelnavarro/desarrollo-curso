<?php

namespace Usuario\Mvcrecuperacion;

use Usuario\Mvcrecuperacion\Controlador;

class Veterinarios extends Controlador
{
    protected $veterinarioModel;
    public function __construct() {
        $this->veterinarioModel = $this->modelo("Veterinario");
    }


    // Muestra el formulario de login
    public function login() {
        // Si el metodo es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $clave = $_POST['clave'];
            $usuario = $this->usuarioModelo->verificarCredenciales($email, $clave);

            if ($usuario) {
                // Guardar la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['logueado'] = true;

                // Redirigir
                header('Location: ' . RUTA_URL . '/paginas/personas');
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