<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;

class Mascotas extends Controlador
{


    protected string $mascotaModelo;
    // Constructores
    public function __construct(){
        $this->mascotaModelo = $this->modelo('Mascota');
        // echo 'Controlador páginas cargado'.'<br>';
    }
    public function index(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . RUTA_URL);
            exit;
        }
            $mascotas = $this->mascotaModelo->todas();
            $datos = [
                "titulo" => "Listado de Mascotas",
                "mascotas" => $mascotas
            ];
            $this->vista("mascotas/inicio", $datos);
    }


    // Mascota
    /*public function registrarMascota(): void {
         if (!isset($_SESSION['user'])) {
            header('Location: /LoginController');
            exit;
        }
        $mascotaNueva = $this->mascotaModelo->registrar();
        $datos = [
            "nombre" => $mascotaNueva['nombre'],
            "tipo" => $mascotaNueva['tipo'],
            "fecha_nacimiento" => $mascotaNueva['fecha_nacimiento'],
            "foto_url" => $mascotaNueva['foto_url'],
            "id_persona" => $mascotaNueva['id_persona']
        ];
        $this->vista("mascotas/registro", ['mascotaNueva' => $datos]);
    }*/
}