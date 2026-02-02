<?php

// ===============================
// CONFIGURACIÓN DE BASE DE DATOS
// ===============================

// Tipo de base de datos + host + nombre de la BD + charset
define('DB_HOST', 'localhost');
define('DB_NAME', 'tienda');
define('DB_CHARSET', 'utf8mb4');

// Usuario y contraseña
define('DB_USER', 'dweb');
define('DB_PASS', '12345');

// Construcción del DSN
define('DB_DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET);


// Ruta base
define('BASE_URL', 'http://localhost/desarrollo-curso/DWES-UD/UD5-DWES/tienda/');


// Email del departamento de pedidos
define('EMAIL_PEDIDOS', 'pedidos@empresa.com');
