<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Mnl\BooklibApi\Controllers\BookController;


$controller = new BookController();
$id = 4;
$controller->show($id);
// Obtener la ruta solicitada (sin el query string)
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Eliminar la parte del script (index.php) para obtener la ruta limpia
$path = trim(str_replace($scriptName, '', $requestUri), '/');

// Dividir la ruta en segmentos
$segments = explode('/', $path);
?>