
<?php require RUTA_APP . '/views/inc/header.php'; ?>
<h1>Iniciar Sesión</h1>
<?php if(isset($datos['error'])): ?>
    <div style="color: red;"><?php echo $datos['error']; ?></div>
<?php endif; ?>

<form action="<?= RUTA_URL ?>/Usuarios/login" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit">Entrar</button>
</form>