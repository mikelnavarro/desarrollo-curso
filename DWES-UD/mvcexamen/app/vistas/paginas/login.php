<?php require_once __DIR__ . '/../inc/header.php'; ?>
    <h2>LOGIN</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="<?=BASE_URL?>Restaurante/login">
        Correo: <input type="email" name="correo" required><br>
        Clave: <input type="password" name="clave" required><br>
        <button type="submit">Entrar</button>
    </form>
<?php require_once __DIR__ . '/../inc/footer.php'; ?><?php
