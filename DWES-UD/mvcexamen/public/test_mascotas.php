<?php
// Script de prueba público para renderizar la vista de mascotas
require_once __DIR__ . '/../app/iniciador.php';
use Mnl\Mvcexamen\Mascotas;
$ctrl = new Mascotas();
$ctrl->index();
