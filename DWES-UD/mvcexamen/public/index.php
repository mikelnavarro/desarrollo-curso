<?php

declare(strict_types=1);
// Cargar Composer Autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Cargando el iniciador para index
require_once __DIR__ . '/../app/iniciador.php';
use Mnl\Mvcexamen\Core;
// Instanciamos el controlador
$iniciar = new Core();