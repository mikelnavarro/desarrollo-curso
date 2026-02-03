<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Página de inicio del Framework php MVC</h2>
<?php echo $mascotas; ?>
<a href="<?=RUTA_URL; ?>">Inicio</a>
<a href="<?=RUTA_URL . "";?>">Artículos</a>
<a href="<?=RUTA_URL . "/Articulos/index";?>">Artículos</a>
<a href="<?=RUTA_URL . "/Articulos/index";?>">Iniciar sesión</a>
<h1>Listado de Mascotas</h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Fecha nacimiento</th>
        <th>Foto</th>
    </tr>

<?php foreach($mascotas as $mascota): ?>
<tr>
    <td><?= $mascota['nombre']; ?></td>
    <td><?= $mascota['tipo']; ?></td>
    <td><?= $mascota['fecha_nacimiento'];?></td>
    <td><img src="<?= $mascota["foto_url"]; ?> alt="Foto de Mascota"></td>-->
</tr>
</table>
<?php endforeach; ?>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>
