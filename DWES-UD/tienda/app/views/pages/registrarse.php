
<?php require RUTA_APP . '/views/inc/header.php'; ?>
<h1>Registrar</h1>
<?php if(isset($datos['error'])): ?>
    <div style="color: red;"><?php echo $datos['error']; ?></div>
<?php endif; ?>
<a href="<?= RUTA_URL ?>/Usuarios/login">Inciar Sesión</a>
<form action="<?= RUTA_URL ?>/Usuarios/registrarse" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <label>País: </label>
    <input type="text" name="pais" required>

    <label>Código Postal: </label>
    <input type="number" name="codigopostal" required min="0" max="99999">

    <label>Ciudad: </label>
    <input type="text" name="ciudad" required>

    <label>Dirección: </label>
    <input type="text" name="direccion" required>
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
