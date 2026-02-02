<?php
/**
 * GUÍA DE INSTALACIÓN XDEBUG PARA AMPPS Y PHPSTORM
 * 
 * PASO 1: Ejecuta este archivo en tu localhost.
 * PASO 2: Copia todo el contenido de la página.
 * PASO 3: Pégalo en el buscador como "Xdebug Wizard" y sigue sus pasos.
 */

echo "<h1>--- COPIA TODO LO DE ABAJO ---</h1>";
echo "<hr>";

// Esta función escupe la info que necesita el instalador
phpinfo();

/* 
----------------------------------------------------------------------
PASO 4: CONFIGURACIÓN DEL PHP.INI (EN AMPPS: PHP -> CONFIGURATION)
----------------------------------------------------------------------
Una vez descargado el archivo .dll, añade esto al final del php.ini:

[Xdebug]
zend_extension="C:\ampps\php\ext\php_xdebug.dll" ; <- AJUSTA ESTA RUTA AL ARCHIVO DESCARGADO
xdebug.mode=debug
xdebug.client_port=9003
xdebug.start_with_request=yes
xdebug.idekey=PHPSTORM

----------------------------------------------------------------------
PASO 5: CONFIGURACIÓN EN PHPSTORM
----------------------------------------------------------------------
1. Settings > PHP > Debug: Mira que el puerto sea 9003.
2. Arriba a la derecha: Clic en el icono del TELÉFONO (que se ponga verde).
3. Haz clic en el margen de tu código para poner un PUNTO ROJO.
4. Recarga tu web en el navegador.
----------------------------------------------------------------------
*/