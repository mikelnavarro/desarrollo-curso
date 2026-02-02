<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Página de inicio del Framework php MVC</h2>

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
</table>
<?php foreach($datos["mascotas"] as $mascota): ?>
<tr>
    <td><?php echo $mascota['nombre']; ?></td>
    <td><?php echo $mascota['tipo']; ?></td>
    <td><?php echo $mascota['fecha_nacimiento'];?></td>
    <!-- <td><img src="<?= $mascota["foto_url"] ?> alt="Foto de Mascota"></td>-->
</tr>
<?php endforeach; ?>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>
