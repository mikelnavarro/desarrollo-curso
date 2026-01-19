<?php require_once RUTA_APP.'/views/inc/header.php';?>
<p><?php echo $datos['titulo'];?></p>
<p><?php echo RUTA_APP;?></p>
<ul>
    <?php foreach($datos['articulos'] as $articulo): ?>
        <li><?php echo $articulo->titulo; ?>
    <?php endforeach; ?>
</ul>
<?php require_once RUTA_APP.'/views/inc/footer.php';?>