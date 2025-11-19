<?php
require_once '../src/GestorLectura.php';
require "../vendor/autoload.php";

$gestor = new GestorLectura();
// 1. El array asociativo con los datos a insertar
$datos = [
    'titulo_lectura' => 'Juan',
    'autor' => 'Pérez',
    'paginas' => 'juan.perez@example.com',
    'fecha_lectura' => 2000-01-01
];
if ($gestor->insertar($datos)) {
    echo "¡Usuario insertado exitosamente usando POO!";
} else {
    echo "No se ha podido insertar.";
}
while ($row = $gestor->listar()) {
    "<br>" . $row["titulo_lectura"] . "<br>".
    "<br>" . $row["autor"] . "<br>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualización de datos</title>
</head>

<body>
    <h1> Visualziación de datos de tu hobby</h1>

    <?php
// Asignamos el resultado de fetch() a la variable $row en cada iteración
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

echo "<tr>
            <td>" . htmlspecialchars($row["id"]) . "</td>
            <td>" . htmlspecialchars($row["titulo_lectura"]) . "</td>
            <td>" . htmlspecialchars($row['autor']) . "</td>
            <td>" . htmlspecialchars($row["paginas"]) . "</td>
            <td>" . htmlspecialchars($row["fecha_lectura"]) . "<td>
    </tr>";
    }


?>
</body>

</html>