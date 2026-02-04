<?php require_once RUTA_APP.'/vistas/inc/header.php';

var_dump($datos);

echo "<pre>";
print_r($datos);
echo "</pre>";
?>
<h1>Listado de Personas</h1>
<table>
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Teléfono</td>
        <td>Email</td>
    </tr>

    <?php
    ?>
    <?php if(!empty($personas)): ?>
        <?php foreach ($personas as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nombre'] ?></td>
        <td><?= $p['apellidos'] ?></td>
        <td><?= $p['telefono'] ?></td>
        <td><?= $p['email'] ?></td>
        <td class="acciones">
            <a href="<?= RUTA_URL ?>/personas/show/<?= $p['id'] ?>">Ver</a>
            <a href="<?= RUTA_URL ?>/personas/delete/<?= $p['id'] ?>" onclick="return confirm('¿Seguro que quieres eliminar esta persona?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <?php else: ?>
        <td>No se encontraron personas</td>
        <?php endif; ?>
    </tr>
</table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>

