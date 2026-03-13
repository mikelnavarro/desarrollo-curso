<?php

// Cargamos todas las clases del proyecto automáticamente (Composer)
require_once __DIR__ . '/../vendor/autoload.php';

// Leemos la URL para saber qué controlador y método ejecutar
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

// Separamos la URI en partes: ['animales', 'lista']
$partes = explode('/', $uri);

// Primera parte → nombre del controlador (por defecto 'home')
$nombreControlador = $partes[0] ?? 'home';

// Segunda parte → método a llamar (por defecto 'index')
$accion = $partes[1] ?? 'index';

// Construimos el nombre completo de la clase con namespace
// Asume que tus controladores están en App\Controladores\
$clase = 'App\\Controladores\\' . ucfirst($nombreControlador) . 'Controlador';

// Comprobamos que la clase y el método existen antes de llamarlos
if (class_exists($clase) && method_exists($clase, $accion)) {
    $controlador = new $clase();
    $controlador->$accion();
} else {
    // Si no se encuentra, devolvemos un 404 simple
    http_response_code(404);
    echo '404 - Página no encontrada';
}
