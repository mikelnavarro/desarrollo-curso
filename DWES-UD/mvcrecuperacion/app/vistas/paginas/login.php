<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Veterinarios</title>
</head>
<body>
<?php if (!empty($mensaje)): ?>
    <p style="color:red"><?= htmlspecialchars($mensaje) ?></p>
<?php endif; ?>
<h1>Login</h1>

<form method="POST" action="<?= RUTA_URL . '/Paginas/index.php' ?>">
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Clave:</label><br>
    <input type="password" name="clave"><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>
