<?php
// Importamos
require '../src/Usuario.php';
$usuario = new Usuario();

// Recibe datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"])) {
        $usu = $usuario->registrarUsuario($_POST["username"], $_POST["clave"]);
    }

    // Comprobamos en el caso que sea falso
    if ($usu == FALSE) {
        $err = TRUE;
        $username = $_POST["username"];
    } else {
        session_start();
        $_SESSION["usuario"] = $_POST["username"];
        header("Location: principal.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosForm.css">
</head>

<body>
    <main>
        <h3>Registrar Usuario</h3>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <label for="username">Usuario: </label>
            <input type="text" id="username" name="username">
            <label for="clave">Contraseña: </label>
            <input type="password" id="clave" name="clave">
            <input type="submit" id="registrar" value="Registrar">
            <a href="index.php" id="botonRegistrarse">¿No
                tienes cuenta? Regístrate aquí
        </form>
    </main>
</body>

</html>