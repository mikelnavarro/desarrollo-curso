<?php
// Importamos
require_once '../src/Conexion.php';
require_once '../src/Registro.php';
$registro = new Registro();
// Recibe datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"])) {
        $usu = $registro->registrarUsuario($_POST["username"],$_POST["clave"]);
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
    <style>
            /* --- VARIABLES DE COLOR (Tema Mascotas) --- */
        :root {
            --color-primario: #4CAF50;
            /* Verde de la naturaleza */
            --color-secundario: #FFD700;
            /* Dorado brillante (juguetes) */
            --color-fondo: #F0F4F8;
            /* Gris claro suave */
            --color-texto: #333;
            --color-sombra: rgba(0, 0, 0, 0.15);
        }
        /* --- ESTILOS GENERALES Y FONDO --- */
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--color-fondo);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--color-texto);
            flex-direction: column;
        }
        /* ------------------------------------------- */
        /* --- FORMULARIO (Sección Central) --- */
        /* ------------------------------------------- */
        /* --- TUS ESTILOS BASE MEJORADOS --- */
        form {
            /* Manteniendo tu estructura base */
            display: flex;
            flex-direction: column;
            gap: 1.5em;
            /* Aumentado ligeramente para mejor espacio */
            padding: 0;
            align-items: center;
            margin: 0;
            width: 100%;
            /* Eliminamos box-shadow del formulario y lo dejamos en el contenedor principal */
            box-shadow: none;
        }

        label {
            width: 100%;
            text-align: left;
            font-weight: bold;
        }

        label #username,
        #clave {
            padding: 0;
            /* Se quita el padding/margin de los labels */
            font-weight: bold;
            margin: 0;
            align-items: left;
        }

        form input[type="text"],
        form input[type="password"] {
            padding: 12px 15px;
            width: calc(100% - 30px);
            /* Ajuste por el padding */
            margin-top: 5px;
            /* Pequeño margen superior */
            height: auto;
            box-sizing: border-box;
            /* Fundamental para que el padding no desborde el ancho */
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="password"]:focus {
            border-color: var(--color-secundario);
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            outline: none;
        }

        /* Botón de ENVIAR DATOS (Login) */
        #registrar {
            padding: 15px 30px;
            border-radius: 50px;
            border-style: none;
            color: white;
            background-color: var(--color-primario);
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
            margin-top: 10px;
        }

        #registrar:hover {
            background-color: #388E3C;
            transform: translateY(-2px);
        }

        /* ---
OTRAS FUNCIONALIDADES
---
*/
        #botonRegistrarse {
            background: none;
            border: none;
            color: var(--color-texto);
            text-decoration: underline;
            cursor: pointer;
            font-size: 0.9em;
            margin-top: 15px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        #botonRegistrarse:hover {
            opacity: 1;
            color: var(--color-primario);
        }
        main {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px var(--color-sombra);
            padding: 40px;
            max-width: 400px;
            width: 90%;
            margin-top: 80px;
            /* Espacio para el menú fijo */
            text-align: center;
        }

        main h2 {
            color: var(--color-primario);
            margin-bottom: 25px;
            font-size: 2em;
            border-bottom: 2px solid var(--color-secundario);
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <main>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="username">Usuario: </label>
        <input type="text" id="username" name="username">
        <label for="clave">Contraseña: </label>
        <input type="password" id="clave" name="clave">
        <input type="submit" id="registrar" value="Registrar">
    </form>
    </main>
</body>

</html>