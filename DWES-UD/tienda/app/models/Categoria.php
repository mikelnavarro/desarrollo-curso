<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Db;
use PDO;

class Categoria
{

    // Atributos
    private $db;
    protected $CodCat;
    protected $Nombre;
    protected $Descripcion;
    // Constructor
    public function __construct()
    {
        $this->db = new Db();
    }
    // Funciones

    public function getNombre($CodCat): array {
        $sql = "SELECT Nombre FROM categorias WHERE CodCat = :CodCat";
        $this->db->query($sql);
        $this->db->bind(":CodCat", $CodCat);
        $this->db->execute();
        return $this->db->registro(PDO::FETCH_ASSOC);
    }
    public function obtenerCategorias(): array {
       $sql = "SELECT * FROM categorias";
       $this->db->query($sql);
       $this->db->execute();
       return $this->db->registrosAssoc();
    }

}