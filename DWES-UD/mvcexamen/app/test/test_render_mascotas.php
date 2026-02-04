<?php
require_once __DIR__ . '/app/iniciador.php';
use Mnl\Mvcexamen\Mascotas;

// Instanciar controlador y llamar index para renderizar vista
$ctrl = new Mascotas();
$ctrl->index();
