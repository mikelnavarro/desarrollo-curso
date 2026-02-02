<?php
require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<h1>Listado de Mascotas</h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Fecha nacimiento</th>
        <th>Foto</th>
    </tr>
</table>
<?php foreach ($datos['mascotas'] as $mascota) : ?>
<tr>
<td><?= $mascota['nombre'] ?></td>
<td><?= $mascota['tipo'] ?></td>
<td><?= $mascota['fecha_nacimiento'] ?></td>
<td><img src="<?= $mascota['foto_url'] ?>" alt="Foto de Mascota"></td>
<a href="VerDetalles?<?= $mascota['id'] ?>">Ver detalles</a>
</tr>
<?php endforeach; ?>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>

