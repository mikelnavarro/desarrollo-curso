<?php
require __DIR__ . '/../vendor/autoload.php';
session_start();
use Mikelnavarro\TiendaAplicacion\Producto;
// Para agregar al carrito
// Hay que obtener el ID del Producto a añadir
$id = $_POST['id'] ?? null;
$cantidad = (int)($_POST['cantidad'] ?? 1);

// Si no existe, la cantidad es menor que uno dara error
if (!$id || $cantidad < 1) {
    header("Location: productos.php?mensaje=Error al añadir");
    exit();
}

// Si ya existe, sumamos
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
} else {
    // Si no existe, lo añadimos
    $producto = Producto::buscarPorId($id);

    $_SESSION['carrito'][$id] = [
        'CodProd' => $producto['CodProd'],
        'Nombre'     => $producto['Nombre'],
        'Precio' => $precio['Precio'],
        'Peso' => $producto['Peso'],
        'cantidad'   => $cantidad
    ];
}

header("Location: carrito.php?mensaje=Producto añadido");
exit();