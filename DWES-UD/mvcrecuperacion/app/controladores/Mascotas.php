<?php


namespace Usuario\Mvcrecuperacion;
use Usuario\Mvcrecuperacion\Controlador;

class Mascotas extends Controlador {

    // Atributos
    protected $mascotaModel;
    public function __construct(){
        $this->mascotaModel->modelo('Mascota');
    }

    public function index(){
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . RUTA_URL);
            exit;
        }
    }

}