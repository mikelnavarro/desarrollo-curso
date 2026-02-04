<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilos.css">
    <title><?php echo NOMBRESITIO; ?> </title>
    <nav>
        <div>
            <a href="<?= RUTA_URL ?>">Inicio</a>

            <?php if (isset($_SESSION['usuario'])): ?>

                <a href="<?= RUTA_URL ?>/personas">Personas</a>
                <a href="<?= RUTA_URL ?>login/logout">Cerrar sesión (<?= $_SESSION['usuario'] ?>)</a>

            <?php else: ?>

                <a href="<?= RUTA_URL ?>/paginas/login">Login</a>

            <?php endif; ?>
        </div>
    </nav>
    <hr>

</head>
<body>