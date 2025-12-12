<?php
require "../src/Libro.php";
// Instancia la clase Libro
$libro = new Libro();
// Llama al método listar() para obtener los datos
$libros = $libro->listar();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabla_lectura.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Libros Recomendados</h1>
        <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <?php foreach ($libros as $row): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                    <div class="card card-custom w-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title title-custom"><?= $row["titulo"] ?></h5>
                            <p class="card-text small text-muted author-custom"><?= $row["autor"] ?></p>
                            <div class="badge badge-pages mt-2"><?= $row["n_paginas"] ?> páginas</div>
                            <div class="badge badge-date mt-2">Publicado: <?= $row["fecha_publicacion"] ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>