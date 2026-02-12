<?php require RUTA_APP . '/views/inc/header.php'; ?>
<h1><?php echo $datos['titulo']; ?></h1>

<?php if(empty($datos['productos'])): ?>
    <p>No hay productos en esta categoría.</p>
<?php else: ?>
    <?php foreach($datos['productos'] as $prod) : ?>
        <div class="producto-card">
            <p><strong><?php echo $prod['Nombre']; ?></strong></p>
            <p>Precio: <?php echo $prod['Precio']; ?>€</p>

            <a href="<?= RUTA_URL ?>/Carrito/agregar/<?= $prod['CodProd']; ?>" class="btn-comprar">
                Añadir al carrito
            </a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($datos['productos'] as $prod) : ?>
    <tr>
            <td><?= $prod['Nombre']; ?></td>
            <td><?= $prod['Precio']; ?></td>
            <td><a href="<?= RUTA_URL ?>/Carrito/agregar/<?= $prod['CodProd']; ?>" class="btn-comprar">Añadir al carrito</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<style>
    body {
        background-color: #f1f1f1;
    }
    table {
        margin: auto;
        border-collapse: collapse;
        width: 50%;
    }
    thead tr {
        background-color: #000000;
        color: #ffffff;
        padding: 1rem;
        font-weight: bold;
        text-align: center;
    }
    tbody tr td {
        background-color: #ffffff;
        padding: 1rem;
    }
</style>
<a href="<?= RUTA_URL ?>/Categorias">Volver atrás</a>