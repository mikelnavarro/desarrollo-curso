<?php
// public/iniciador.php

require_once __DIR__ . '/../vendor/autoload.php';
use Mnl\BooklibApi\Controllers\BookController;

// Obtener la ruta solicitada (sin query string)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Eliminar el prefijo del proyecto para obtener la ruta relativa
$basePath = '/curso/DWES-UD/booklib-api/';
$path = trim(str_replace($basePath, '', $requestUri), '/');

// Dividir en segmentos
$segments = explode('/', $path);

// Rutas soportadas: /books y /books/{id}
if ($segments[0] === 'books') {
    $controller = new BookController();

    if (isset($segments[1]) && is_numeric($segments[1])) {
        // Acceso por ID: /books/123
        $id = (int)$segments[1];
        $controller->show($id);
    } else {
        // Listado: /books
        $controller->index();
    }
} else {
    http_response_code(404);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['error' => 'Ruta no encontrada']);
}