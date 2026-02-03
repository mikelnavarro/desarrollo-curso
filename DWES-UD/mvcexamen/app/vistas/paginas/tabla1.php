<?php
require RUTA_APP . '/vistas/inc/header.php'; ?>
<table>
    <tr>
        <td>Nombre</td>
        <td>Tipo</td>
        <td>Fecha nacimiento</td>
        <td>Foto</td>
    </tr>
    <tr>
        <?php foreach ($mascota["mascotas"] as $mascota): ?>
    <tr>
        <td><?= $mascota->getNombre(); ?></td>
        <td><?= $mascota->getTipo(); ?></td>
        <td><?= $mascota->getFechaNacimiento(); ?></td>
        <td><img src="<?= $mascota->getFoto(); ?>"></td>
        <a href="VerDetalles?<?= $mascota->getId(); ?>">Ver detalles</a>
    </tr>
</table>
<?php endforeach; ?>


<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>