<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Categorías</h2>
<table border="1">
    <tr><th>Nombre</th><th>Descripción</th><th>Acción</th></tr>
    <?php foreach($categorias as $c): ?>
        <tr>
            <td><?=$c->nombre?></td>
            <td><?=$c->descripcion?></td>
            <td><a href="<?=BASE_URL?>Categoria/listar/<?=$c->codCat?>">Ver Productos</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>