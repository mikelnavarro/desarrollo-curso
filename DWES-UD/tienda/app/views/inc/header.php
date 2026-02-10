<?php
$totalProductos = 0;
if (isset($_SESSION['carrito'])) {
    $totalProductos = array_sum($_SESSION['carrito']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NOMBRESITIO; ?></title>
    <link rel="stylesheet" href="<?php echo RUTA_URL; ?>/css/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="<?php echo RUTA_URL; ?>/Categorias">Categorias</a></li>

            <?php if(isset($_SESSION['usuario_id'])) : ?>
                <li>Bienvenido, <strong><?php echo $_SESSION['usuario_nombre']; ?></strong></li>
                <li>
                    <a href="<?= RUTA_URL ?>/Carrito/ver" style="position: relative;">
                        🛒 Carrito
                        <?php if($totalProductos > 0): ?>
                            <span style="background: var(--acentuado); color: white; border-radius: 50%; padding: 2px 6px; font-size: 10px;">
                <?= $totalProductos ?>
            </span>
                        <?php endif; ?>
                    </a>
                </li>
                <li><a href="<?php echo RUTA_URL; ?>/Usuarios/logout">Cerrar Sesión</a></li>
            <?php else : ?>
                <li><a href="<?php echo RUTA_URL; ?>/Usuarios/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main class="contenedor">
