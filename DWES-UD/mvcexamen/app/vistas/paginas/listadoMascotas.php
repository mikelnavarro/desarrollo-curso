<?php
require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<h1>Listado de Mascotas</h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Fecha nacimiento</th>0
        <th>Foto</th>
    </tr>
<?php foreach ($mascota as $mascota): ?>
<td><?= $mascota['nombre'] ?></td>
<td><?= $mascota['tipo'] ?></td>
<td><?= $mascota['fecha_nacimiento'] ?></td>
<td><img src="<?= $mascota['foto_url'] ?>" alt="Foto de Mascota"></td>
<a href="VerDetalles?<?= $mascota['id'] ?>">Ver detalles</a>
</tr>
</table>
<?php endforeach; ?>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>

