<?php require_once __DIR__ . '/../inc/header.php'; ?>


    <h2>Iniciar sesión</h2>

<?php if (!empty($mensaje)): ?>
    <p style="color:red"><?= htmlspecialchars($mensaje) ?></p>
<?php endif; ?>

    <form method="POST" action="/Usuarios/login">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Contraseña: <input type="password" name="password" required></label><br>
        <button type="submit">Entrar</button>
    </form>

<?php include __DIR__ . '/../inc/footer.php'; ?>
<?php require_once __DIR__ . '/../inc/footer.php'; ?><?php
