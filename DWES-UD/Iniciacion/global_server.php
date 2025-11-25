<?php
echo "<p>Ruta dentro de htdocs: ". $_SERVER['PHP_SELF'] . "</p>";
echo "<p>Nombre del servidor: ". $_SERVER['SERVER_NAME'] . "</p>";
echo "<p>Software del servidor: ". $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Protocolo: ". $_SERVER['SERVER_PROTOCOL'] . "</p>";
echo "<p>Metodo de la peticion: ". $_SERVER['REQUEST_METHOD'] . "</p>";
?>