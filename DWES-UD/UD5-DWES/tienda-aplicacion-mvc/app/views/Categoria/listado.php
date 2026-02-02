<?php require __DIR__ . '/../inc/header.php'; ?>
<h2>Lista de categorias</h2>
<div class="categorias-lista">
    <?php if (!empty($categorias)): ?>
        <?php foreach ($categorias as $cat): ?>
            <div class="categoria-item">
                <a href="/Categoria/listar/<?= htmlspecialchars($cat['id']) ?>">
                    <?= htmlspecialchars($cat['nombre']) ?>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay categorías disponibles.</p>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/../inc/footer.php'; ?>