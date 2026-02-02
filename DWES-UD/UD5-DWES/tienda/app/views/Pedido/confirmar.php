<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Pedido realizado correctamente</h2>
<p>Pedido #: <?=$pedido->codPed?></p>
<p>Se ha enviado un email a su correo.</p>
<a href="<?=BASE_URL?>Categoria/categorias">Volver a Categorías</a>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>