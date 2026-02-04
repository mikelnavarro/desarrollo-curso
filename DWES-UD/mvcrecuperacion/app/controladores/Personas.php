<?php

namespace Usuario\Mvcrecuperacion;

use Usuario\Mvcrecuperacion\Controlador;

class Personas extends Controlador
{

    protected $personaModel;

    public function __construct() {
        $this->personaModel = $this->modelo('Persona');
    }

    public function index() {
        $personas = $this->personaModel->getAllPersonas();
        $datos = [
            'personas' => $personas
        ];
        $this->vista('paginas/personas', $datos);
    }

    public function borrar($id) {

        if ($_SESSION['usuario'])
        if ($_GET["id"] == $id) {
            $this->personaModel->borrarPersona($id);
            $this->vista('paginas/inicio');
        }
    }

}