<!-- app/views/mascotas/inicio.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Mascotas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background: #eee;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        .acciones a {
            margin-right: 10px;
        }
        .top-bar {
            width: 70%;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <div>
        <a href="/paginas/registro">Nueva Mascota</a> |
        <a href="/usuarios/logout">Cerrar sesión</a>
    </div>
</div>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Edad</th>
        <th>Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php if (!empty($mascotas)): ?>
    <h2><?= $mascotas['titulo'] ?></h2>
        <?php foreach ($mascotas as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['id']) ?></td>
                <td><?= htmlspecialchars($m['nombre']) ?></td>
                <td><?= htmlspecialchars($m['tipo']) ?></td>
                <td><?= htmlspecialchars($m['fecha_nacimiento']) ?>)</td>
                <td><img src="<?= $m['foto_url'] ?>"></td>
                <td class="acciones">
                    <a href="/mascotas/show/<?= $m['id'] ?>">Ver</a>
                    <a href="/mascotas/edit/<?= $m['id'] ?>">Editar</a>
                    <a href="/mascotas/delete/<?= $m['id'] ?>"
                       onclick="return confirm('¿Seguro que quieres eliminar esta mascota?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No hay mascotas registradas.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>