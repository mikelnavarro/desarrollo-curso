<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;

class Mascotas extends Controlador
{


    protected string $mascotaModelo;
    // Constructores
    public function __construct(){
        $this->mascotaModelo = $this->modelo('Mascota');
        $this->vista = 'inicio';
        $this->datos = [
            "titulo" => "MASCOTAS"
        ];
        // echo 'Controlador páginas cargado'.'<br>';
    }
    public function index(): void {
        $mascotas = $this->mascotaModelo->todas();
        $this->datos = [
            "mascotas" => $mascotas
        ];
        $this->vista("mascotas/inicio", $this->datos);

    }


    // Mascota
    /*public function registrarMascota(): void {
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