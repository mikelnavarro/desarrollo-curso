<?php
require_once "classes/Usuario.php";

$usuario = new Usuario();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

echo $usuario->registrar($nombre, $email, $password);
?>
