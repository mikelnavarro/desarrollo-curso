<h1>Artículos</h1>
<ul>
<?php foreach($datos['articulos'] as $articulo): ?>
    <li>
        <strong><?php echo $articulo->titulo; ?></strong><br>
        <?php echo $articulo->contenido; ?>
    </li>
<?php endforeach; ?>
</ul>
