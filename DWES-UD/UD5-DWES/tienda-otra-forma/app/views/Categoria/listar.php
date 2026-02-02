<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Productos de <?=$categoria->nombre?></h2>
<table border="1">
    <tr><th>Nombre</th><th>Descripcion</th><th>Peso</th><th>Stock</th><th>Agregar</th></tr>
    <?php foreach($productos as $p): ?>
        <tr>
            <td><?=$p->nombre?></td>
            <td><?=$p->descripcion?></td>
            <td><?=$p->peso?></td>
            <td><?=$p->stock?></td>
            <td>
                <form method="post" action="<?=BASE_URL?>Carrito/agregar">
                    <input type="hidden" name="codProd" value="<?=$p->codProd?>">
                    <input type="number" name="unidades" value="1" min="1">
                    <button type="submit">Agregar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>

