<?php
$mascota = $datos['mascota'];


// Verifica que sea un array
if (!is_array($mascota)) {
    $mascota = [];
}


// Recibe los datos y verifica que existan
$id = $mascota['id'] ?? null;
$nombre = $mascota['nombre'] ?? '';
$tipo = $mascota['tipo'] ?? '';
$fecha = $mascota['fecha_nacimiento'] ?? ($mascota['fecha_nac'] ?? '');
$fotoUrl = $mascota['foto_url'] ?? '';
$responsable = $mascota['responsable'] ?? ($mascota['id_persona'] ?? '');
$titulo = $datos['titulo'] ?? 'Ver Mascota';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .wrapper { max-width: 900px; margin: 20px auto; font-family: Arial, sans-serif; }
        .card { border: 1px solid #ddd; padding: 16px; border-radius: 8px; }
        .row { display: flex; gap: 16px; flex-wrap: wrap; }
        .col { flex: 1 1 320px; }
        .muted { color: #666; }
        .foto { max-width: 100%; height: auto; border: 1px solid #eee; border-radius: 6px; }
        .actions a { margin-right: 12px; }
        dt { font-weight: bold; }
        dd { margin: 0 0 10px 0; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="actions">
        <a href="/mascota/index">Volver al listado</a>
        <?php if ($id !== null): ?>
            <a href="/mascota/edit/<?= urlencode((string)$id) ?>">Editar</a>
            <a href="/mascota/delete/<?= urlencode((string)$id) ?>"
               onclick="return confirm('¿Seguro que quieres eliminar esta mascota?')">Eliminar</a>
        <?php endif; ?>
    </div>

    <h1><?= htmlspecialchars($titulo) ?></h1>

    <div class="card">
        <?php if ($id === null && $nombre === '' && $tipo === '' && $fecha === '' && $fotoUrl === ''): ?>
            <p class="muted">No se ha encontrado la mascota o faltan datos para mostrarla.</p>
        <?php else: ?>
            <div class="row">
                <div class="col">
                    <dl>
                        <?php if ($id !== null): ?>
                            <dt>ID</dt>
                            <dd><?= htmlspecialchars((string)$id) ?></dd>
                        <?php endif; ?>

                        <dt>Nombre</dt>
                        <dd><?= htmlspecialchars($nombre) ?></dd>

                        <dt>Tipo</dt>
                        <dd><?= htmlspecialchars($tipo) ?></dd>

                        <dt>Fecha de nacimiento</dt>
                        <dd><?= htmlspecialchars($fecha) ?></dd>

                        <?php if ($responsable !== ''): ?>
                            <dt>Responsable</dt>
                            <dd><?= htmlspecialchars((string)$responsable) ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>

                <div class="col">
                    <dt>Foto</dt>
                    <?php if ($fotoUrl !== ''): ?>
                        <img class="foto"
                             src="<?= htmlspecialchars($fotoUrl) ?>"
                             alt="Foto de <?= htmlspecialchars($nombre) ?>">
                    <?php else: ?>
                        <p class="muted">Sin foto</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
