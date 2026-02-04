
<nav>
    <div>
    <a href="<?= RUTA_URL ?>">Inicio</a>

    <?php if (isset($_SESSION['usuario'])): ?>

        <a href="<?= RUTA_URL ?>mascotas">Mascotas</a>
        <a href="<?= RUTA_URL ?>login/logout">Cerrar sesión (<?= $_SESSION['usuario'] ?>)</a>

    <?php else: ?>

        <a href="<?= RUTA_URL ?>">Login</a>

    <?php endif; ?>
    </div>
</nav>
<hr>
