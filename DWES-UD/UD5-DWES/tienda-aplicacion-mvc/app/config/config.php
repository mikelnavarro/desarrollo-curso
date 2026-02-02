<?php

//Configuración acceso a base de datos
define('DB_HOST', 'localhost'); //tu servidor de BD.
define('DB_USUARIO', 'dweb');
define('DB_PASSWORD', '12345');
define('DB_NOMBRE', 'tienda'); // Tu base de datos



//Ruta de la aplicación. /app o /src
define('RUTA_APP', dirname(dirname(__FILE__))); 

//define ('RUTA_URL', '_URL_');
define('RUTA_URL', 'http://localhost/tienda-aplicacion-mvc/public');

//define ('NOMBRESITIO', '_NOMBRE_SITIO');
define ('NOMBRESITIO', 'Tienda Aplicación');



// Otras configuraciones iniciales pueden ir aquí