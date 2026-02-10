<?php require RUTA_APP . '/views/inc/header.php'; ?>
<?php echo $datos['titulo']; ?></h1>

<ul>
    <?php foreach($datos['categorias'] as $categoria) : ?>
        <li><a href="<?= RUTA_URL ?>/Categorias/productos/<?= $categoria['CodCat']; ?>"><?= $categoria['Nombre']; ?></a>
        </li>
    <?php endforeach; ?>
</ul
</body>
</html>