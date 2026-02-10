<?php
namespace Mikelnavarro\App;
use Mikelnavarro\App\Controlador;
class Paginas extends Controlador
{

    private $page;
    public function __construct()
    {
        $this->page = 'inicio';
    }

    public function index()
    {
        echo 'Hola';
    }
}