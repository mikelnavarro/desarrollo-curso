
<?php require RUTA_APP . '/views/inc/header.php'; ?>
<h1>Iniciar Sesión</h1>
<?php if(isset($datos['error'])): ?>
    <div style="color: red;"><?php echo $datos['error']; ?></div>
<?php endif; ?>
<a href="<?= RUTA_URL ?>/Usuarios/registrarse">¿No tienes cuenta? Regístrate</a>
<form action="<?= RUTA_URL ?>/Usuarios/login" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit">Entrar</button>
</form>
<style>
    a{
        color: blue;
    }
    a:hover{
        color: red;
    }
    body{
        background-color: #ffff;
    }
    .error{
        color: red;
        font-weight: bold;
    }
    form {
        margin-top: 2rem;
        width: 30%;
    }
    label{
        padding: 10px;
        width: 100%;
        display: block;
    }
    input{
        padding: 10px;
        width: 100%;
        border-radius: 2%;
        border-style: none;
    }
    button{
        background-color: #aacc;
        color: white;
        padding: 10px;
        border-radius: 2%;
        margin-top: 1rem;
    }
</style>