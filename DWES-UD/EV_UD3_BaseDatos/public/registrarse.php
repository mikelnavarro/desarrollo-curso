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
    <style>
        /* Estilos básicos para que el formulario se vea ordenado */
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            gap: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <main>
        <h3>Registrar Usuario</h3>
        <!-- Formulario de Registro de Usuario -->
        <form id="formRegistro" action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">

            <!-- Nombre de Usuario (NOT NULL) -->
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <!-- Contraseña (NOT NULL) -->
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Registrarse" id="enviarDatos">
            <!-- Botón de Registrarse -->
            <a href="index.php" id="botonRegistrarse">Ya tengo cuenta. Inciar Sesión.</a>
        </form>
    </main>
</body>

</html>