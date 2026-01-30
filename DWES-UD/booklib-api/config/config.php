<?php
//Configuración acceso a base de datos
define('DB_HOST', 'localhost'); //tu servidor de BD.
define('DB_USUARIO', 'dweb');
define('DB_PASSWORD', '12345');
define('DB_NOMBRE', 'booklib_db');



//Ruta de la aplicación. /app o /src
define('RUTA_APP', (dirname(__DIR__)));

//Ruta url Ejemplo: http://localhost/ud5/mvc2app
//define ('RUTA_URL', '_URL_');
define ('RUTA_URL', 'http://localhost/curso/DWES-UD/booklib-api/public/index.php');

//define ('NOMBRESITIO', '_NOMBRE_SITIO');
define ('NOMBRESITIO', 'Aplicacion de Libros');

// Cargar archivo INI si es necesario.
//$config = parse_ini_file(RUTA_APP . '/config/config.ini', true);

// Otras configuraciones iniciales pueden ir aquí<?php
