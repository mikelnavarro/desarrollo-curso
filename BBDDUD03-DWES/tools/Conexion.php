<?php
/**
 * aquí debes definir tu clase para conectarte a la base de datos.
 * Lo más profesional es leer los datos de un archivo "config.ini"
 * o "config.json" los parámetros necesarios para la conexión.
 */

$servername = "localhost";
$username = "dweb";
$password = "12345";
$dbname = "desarollowebentornoservidor";




try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
 ?>