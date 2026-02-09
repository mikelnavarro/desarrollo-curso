<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Db;

class Producto
{

    // Atributo
    protected $db;
    protected $titulo;
    protected $descripcion;
    protected $precio;
    protected $ruta_imagen;


    // Constructor
    public function __construct()
    {
        $this->db = new Db();
    }

    // Funciones

    public function getAll(): array {
        $sql = "SELECT * FROM productos";
        $this->db->query($sql);
        return $this->db->execute();
    }
}