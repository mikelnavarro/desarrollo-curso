<?php
// index.php


// 1. Incluir clases necesarias (Database y Usuario)
require 'src/GestorTareas.php';



// 3. Instanciar la clase Usuario
$GestorTareas = new GestorTareas();

// 4. Obtener los datos (El método listar() nos devuelve el PDOStatement)

$stmt = $GestorTareas->listar(); 
// $stmt ahora contiene el conjunto de resultados de la consulta SELECT
// 5. Incluir el archivo de vista (tabla.php) para mostrar los datos

include 'tabla.php'; 
?>