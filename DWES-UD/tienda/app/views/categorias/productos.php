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


<a href="<?= RUTA_URL ?>/Categorias">Volver atrás</a>

