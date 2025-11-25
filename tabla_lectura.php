<?php
// Incluye el archivo de la clase
require_once "Libro.php";
// Instancia la clase Libro
$libro = new Libro();


// Llama al método listar() para obtener los datos
$listaMascotas = $mascota->listar();
// Llama al método borrar() para eliminar
if (isset($_GET["action"]) && $_GET["action"] === "borrar" && isset($_GET["id"])) {
    if (is_numeric($_GET["id"])) {
        $libro->borrar($_GET["id"]);
        header("Location: principal.php?mensaje=Libro eliminado");
        exit();
    }
}
// Opcional: Manejo de Mensaje
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <style>
    </style>
</head>
<body>

    <div class="container">
<?php
        foreach($listaMascotas as $row){
            echo "        <div class="card">
            <div class="card-content">
                <img src="img/gato.jpeg" alt="Foto de Bernabe" class="img-fluid" style="max-width: 200px;">
                <div class="card-text">
                    <strong>Responsable:</strong><br>
                    <strong>Nombre:</strong><br>
                    <strong>Tipo:</strong><br>
                    <strong>Fecha de Nacimiento:</strong>
                </div>
            echo "</div>";
            echo "<div>"
            echo "<a href='cambiar.php?action=cambiar&id=".htmlspecialchars($row["id"]).' 
              class="btn btn-primary">Cambiar Foto</a>";
            echo "<a href='principal.php?action=borrar&id=".htmlspecialchars($row["id"]).'
              class="btn btn-danger">Eliminar</a>";
            </div>
        </div>"
        }
    </div>
    <a href="agregar.php">Agregar Libro</a>
</body>
</html>
