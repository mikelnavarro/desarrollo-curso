<?php
require_once 'Libro.php';
$libro = new Libro();
$id = $_GET['id'];
$libro_actual = null;
// Comprobamos el id
if ($id) {
    $libro_actual = $libro->listar();
    if (!$libro_actual[$id]) {
        echo "Libro No encontrado";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "modificar") {
        $datos = [
            "id" => $_POST['id'],
            "titulo" => $_POST["titulo"],
            "autor" => $_POST["autor"],
            "n_paginas" => $_POST["n_paginas"],
            "fecha_publicacion" => $_POST["fecha_publicacion"],
            "terminado" => $_POST["terminado"]
        ];
        $libro->modificar($datos);
        header("Location: principal.php?mensaje=Libro ha sido modificado");
        exit();
    } else {
        echo "ID no válido.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>

<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <label for="id">Id: </label>
        <input type="number" id="id" name="id" value="<?= $libro_actual["id"] ?>"><br>
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" value="<?= $libro_actual["titulo"] ?>"><br>
        <label for="autor">Autor: </label>
        <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($libro["autor"]) ?>"><br>
        <label for="n_paginas">Número de Paginas: </label>
        <input type="number" id="n_paginas" name="n_paginas" value="<?= $libro["n_paginas"] ?>"><br>
        <label for="fecha_publicacion">Fecha de publicacion: </label>
        <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="<?php echo $libro_actual["fecha_publicacion"] ?>"><br>
        <label for="terminado">¿Se lo ha terminado?</label>
        <input type="checkbox" id="terminado" name="terminado" value="<?php $libro_actual["terminado"] ? "checked" : "" ?>"><br>
        <input type="hidden" name="action" value="modificar">
        <input type="hidden" name="id" value="<?php echo isset($_GET["id"]) ? htmlspecialchars($_GET["id"]) : ""; ?>">
        <input type="submit" value="Editar">

    </form>
    <a href="principal.php">Volver al listado</a>
</body>

</html>