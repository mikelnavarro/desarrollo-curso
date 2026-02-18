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
    public function registrarse() {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $pais = trim($_POST['pais']);
                $codigopostal = trim($_POST['codigopostal']);
                $ciudad = trim($_POST['ciudad']);
                $direccion = trim($_POST['direccion']);
                $usuarioIgual = $this->usuarioModelo->obtenerUsuarioPorEmail($email);
                if ($usuarioIgual) {
                    $datos = [ "error" => "El correo electrónico " . $email . " ya existe."];
                    $this->vista('pages/registrarse', $datos);
                }
                $usuarioRegistro = $this->usuarioModelo->registrarse($email, $password, $pais, $codigopostal, $ciudad, $direccion);
                $usuario = $this->usuarioModelo->obtenerUsuarioPorEmail($email);
                if ($usuarioRegistro) {
                    $_SESSION['usuario_id'] = $usuario->CodRes;
                    $_SESSION['usuario_nombre'] = $usuario->Correo;
                    $_SESSION['usuario_ciudad'] = $usuario->Ciudad;
                    $_SESSION['usuario_pass'] = $usuario->Clave;
                    header('Location: ' . RUTA_URL . "/Categorias");
                } else {
                    $datos = ["error" => 'No se ha podido registrar el usuario'];
                    $this->vista('pages/registrarse', $datos);
                }
            } else {
                $this->vista('pages/registrarse');
            }
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
                $_SESSION['usuario_pass'] = $usuario->Clave;

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


    public function detalle()
    {
        // Verificamos que esté logueado
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . RUTA_URL . '/Usuarios/login');
            exit;
        }

        $datos = [
            'titulo' => 'Perfil del Restaurante',
            // Pasamos los datos de la sesión al array de datos para la vista
            'id'     => $_SESSION['usuario_id'],
            'email'  => $_SESSION['usuario_nombre'],
            'ciudad' => $_SESSION['usuario_ciudad']
        ];

        $this->vista('pages/detalle', $datos);
    }
    public function logout() {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nombre']);
        session_destroy();
        header('Location: ' . RUTA_URL . '/Usuarios/login');
    }
}