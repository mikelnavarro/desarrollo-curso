<?php require_once __DIR__ . '/../inc/header.php'; ?>
<?php if (!empty($datos)): ?>
<h1><?php echo $datos['titulo']; ?></h1>
<?php endif; ?>
<h2>Página de inicio del Framework php MVC</h2>
<a href="<?= htmlspecialchars(RUTA_URL . 'mascotas/inicio') ?>">Mascotas</a>
<a href="<?= htmlspecialchars(RUTA_URL . 'paginas/login') ?>">Iniciar sesión</a>

<?php
?>
<h1>Listado de Mascotas</h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Fecha nacimiento</th>
        <th>Foto</th>
    </tr>
    <?php if (!empty($listaMascotas)): ?>
    <?php foreach($listaMascotas as $mascota): ?>
<tr>
    <td><?= $mascota['nombre'] ?></td>
    <td><?= $mascota['tipo'] ?></td>
    <td><?= $mascota['fecha_nacimiento'] ?></td>
    <td>
        <img src="<?= htmlspecialchars($mascota['foto_url']) ?>"  alt="Foto de <?= htmlspecialchars($mascota['nombre']) ?>"
            style="max-width: 120px; height: auto;">
    </td>
</tr>

        <?php endforeach; ?>
    <td>
        <?php else: ?>
    <tr>
        <td colspan="5">No hay mascotas registradas.</td>
    </tr>
    <?php endif; ?>
</table>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>
