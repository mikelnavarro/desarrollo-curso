<?php

//Clase controlador principal
//Carga los modelos y las vistas.

namespace Mnl\tools;
class Controlador
{

    //Cargar modelo
    public function modelo($modelo)
    {
        // Instanciar modelo vía autoload (PSR-4)
        $class = "Acme\\IntranetRestaurante\\Models\\$modelo";
        if (class_exists($class)) {
            return new $class();
        }
        // Fallback: intentar carga directa si no está en el autoloader
        $path = __DIR__ . '/../models/' . $modelo . '.php';
        if (file_exists($path)) {
            require_once $path;
            if (class_exists($modelo)) return new $modelo();
        }
        throw new \Exception("Modelo $modelo no encontrado");
    }

    //Cargar vista
    public function vista($vista, $datos = [])
    {

        //Comprobar si existe el archivo de vista.
        $viewPath = defined('RUTA_APP') ? RUTA_APP . '/views/' . $vista . '.php' : __DIR__ . '/../views/' . $vista . '.php';
        if (file_exists($viewPath)) {
            extract($datos);
            require_once $viewPath;
        } else {
            //si el archivo de vista no existe
            throw new \Exception('La vista no existe: ' . $viewPath);
        }
    }
}