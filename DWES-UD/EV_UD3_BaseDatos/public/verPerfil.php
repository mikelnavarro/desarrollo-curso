<?php
require "../vendor/autoload.php";
require "../src/Registro.php";


$user = new Registro();
$id = $user->getUsername();


?>