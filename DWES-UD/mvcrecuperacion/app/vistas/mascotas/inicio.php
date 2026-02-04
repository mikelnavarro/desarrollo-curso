<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h2>Listado de Mascotas</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Fecha nacimiento</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($mascotas)): ?>
        <?php foreach ($mascotas as $m): ?>
                <tr>
                    <td><?= htmlspecialchars($m['id']) ?></td>
                    <td><?= htmlspecialchars($m['nombre']) ?></td>
                    <td><?= htmlspecialchars($m['tipo']) ?></td>
                    <td><?= htmlspecialchars($m['fecha_nacimiento']) ?></td>
                    <td><?php if(!empty($m['foto_url'])): ?><img src="<?= htmlspecialchars(RUTA_URL . ltrim($m['foto_url'], '/')) ?>" alt="<?= htmlspecialchars($m['nombre']) ?>" style="max-width:80px"><?php endif; ?></td>
                    <td class="acciones">
                        <a href="<?= RUTA_URL ?>mascotas/show/<?= $m['id'] ?>">Ver</a>
                        <a href="<?= RUTA_URL ?>mascotas/edit/<?= $m['id'] ?>">Editar</a>
                        <a href="<?= RUTA_URL ?>mascotas/delete/<?= $m['id'] ?>" onclick="return confirm('¿Seguro que quieres eliminar esta mascota?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay mascotas registradas</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>