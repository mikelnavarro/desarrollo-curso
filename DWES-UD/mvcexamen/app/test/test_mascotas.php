<?php
require_once __DIR__ . '/app/iniciador.php';
use Mnl\Mvcexamen\Mascota;

$m = new Mascota();
$result = $m->todas();
header('Content-Type: text/plain; charset=UTF-8');
print_r($result);
