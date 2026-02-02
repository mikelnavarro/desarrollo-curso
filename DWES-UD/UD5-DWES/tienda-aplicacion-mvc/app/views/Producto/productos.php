<h1>Productos</h1>
<?php foreach ($productos as $p): ?>
    <p><?= $p->getNombre() ?></p>
<?php endforeach; ?>