<?php

namespace Mikelnavarro\App;

use Mikelnavarro\App\Controlador;

class Usuarios extends Controlador
{
    protected $usuarioModelo;
    // Constructor
    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar el formulario
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $usuarioLogueado = $this->usuarioModelo->iniciarSesion($email, $password);
            $usuario = $this->usuarioModelo->obtenerUsuarioPorEmail($email);
            if ($usuarioLogueado) {
                // CREAR SESIÓN con los datos reales de tu tabla Restaurantes
                $_SESSION['usuario_id']     = $usuario->CodRes;
                $_SESSION['usuario_nombre']  = $usuario->Correo;
                $_SESSION['usuario_ciudad'] = $usuario->Ciudad;

                header('Location: ' . RUTA_URL . '/Categorias');
            } else {
                $datos = ['error' => 'Email o contraseña incorrectos'];
                $this->vista('pages/login', $datos);
            }
        } else {
            // Cargar la vista del formulario
            $this->vista('pages/login');
        }
    }

    public function logout() {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nombre']);
        session_destroy();
        header('Location: ' . RUTA_URL . '/Usuarios/login');
    }
}