<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Controlador;


class MascotaController extends Controlador
{

    // Constructores
    public function __construct(){
        $this->mascotaModelo = $this->modelo('Mascota');
        //echo 'Controlador páginas cargado'.'<br>';
    }
    public function index() {
        // $mascotas = $this->modelo('Mascota')->todas();
        $mascotas = $this->mascotaModelo->todas();
        $datos = [
            'titulo' => NOMBRESITIO,
            'mascotas' => $mascotas
        ];
        $this->vista("paginas/inicio", $mascotas);
    }


    // Mascota
    public function registrarMascota() {
        $mascotaNueva = $this->mascotaModelo->registrar();
        $datos = [
            "nombre" => $mascotaNueva['nombre'],
            "tipo" => $mascotaNueva['tipo'],
            "fecha_nacimiento" => $mascotaNueva['fecha_nacimiento'],
            "foto_url" => $mascotaNueva['foto_url'],
        ];
        $this->vista("paginas/registro", ['mascotaNueva' => $datos]);
    }
}