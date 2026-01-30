<?php

class Paginas extends Controlador
{

    public function __construct() {}

    public function index()
    {

        $datos = [
            'titulo' => 'ED 23-24',
            'objetivo' => 'Este proyecto sirve para aprender MVC en PHP, organizar código y trabajar con controladores, modelos y vistas.'
        ];

        $this->vista('paginas/inicio', $datos);
    }
}
