<?php
// Recarga el autoload de Composer
session_start();
require_once dirname(__DIR__) . "/vendor/autoload.php";
// Punto de arranque de la app: centraliza la carga de configuracion y clases.
// Carga las constantes de configuracion (DB_* y RUTA_URL).
require_once "config/config.php";
