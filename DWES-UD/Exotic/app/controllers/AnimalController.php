<?php
namespace Mikelnavarro\Exotic;
use Mikelnavarro\Exotic\Controlador;
class AnimalController extends Controlador
{

    private $modelo;

    public function __construct() {
        $this->modelo = $this->modelo('Animal');
    }
    public function index() {
        $this->vista('animales/index', ['animales' => $this->modelo->listaAnimales()]);
    }

    // Método que lista todos los animales contenidos
    public function list(){
        $this->vista('animales/list', ['animales' => $this->modelo->listaAnimales()]);
    }
}