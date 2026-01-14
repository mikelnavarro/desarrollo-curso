<?php
    //Cargamos librerias
    require_once __DIR__.'/../app/config/config.php';

    //require_once __DIR__.'/../app/src/libs/Db.php';
    //require_once __DIR__.'/../app/src/libs/Controlador.php';
    //require_once __DIR__.'/../app/src/libs/Core.php';

    
    //Autoload php
    spl_autoload_register(function($nombreClase){
        require_once __DIR__.'/../app/src/libs/'.$nombreClase.'.php';
    });