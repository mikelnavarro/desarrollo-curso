<?php
    //cargando el iniciador
    //require_once $_SERVER['DOCUMENT_ROOT'].'app/src/iniciador.php';

 //   require_once $_SERVER['DOCUMENT_ROOT'].'app/src/libs/Db.php';
    //require_once $_SERVER['DOCUMENT_ROOT'].'app/src/libs/Controlador.php';
    //require_once $_SERVER['DOCUMENT_ROOT'].'app/src/libs/Core.php';

 
    //require_once 'app/src/iniciador.php';
    require_once __DIR__.'/../app/iniciador.php';

    //$i = __DIR__.'/../app/src/iniciador.php';
    
    //$BASE = $_SERVER['DOCUMENT_ROOT'];

    // Instanciamos el controlador
    $iniciar = new Core();