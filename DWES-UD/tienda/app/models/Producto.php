<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Db;
use PDO;

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


    public function obtenerPorCategoria($CodCat): array {
        $sql = "SELECT * FROM productos WHERE Categoria = :codCat";
        $this->db->query($sql);
        $this->db->bind(":codCat", $CodCat);
        $this->db->execute();
        return $this->db->registros(PDO::FETCH_ASSOC);
    }


    public function obtenerProductoId($id) {
        $this->db->query("SELECT * FROM productos WHERE CodProd = :CodProd");
        $this->db->bind(':CodProd', $id);
        return $this->db->registro();
    }

    public function obtenerVariosPorId(array $ids) {
        if (empty($ids)) {
            return [];
        }

        // Creamos una cadena de marcadores: :id0, :id1, :id2...
        $marcadores = [];
        foreach ($ids as $i => $id) {
            $marcadores[] = ":id$i";
        }
        $listaMarcadores = implode(', ', $marcadores);
        $this->db->query("SELECT * FROM productos WHERE CodProd IN ($listaMarcadores)");
        foreach ($ids as $i => $id) {
            $this->db->bind(":id$i", $id);
        }

        // Retornamos todos los productos encontrados
        return $this->db->registros();
    }
    public function cambiarStock($codProd, $productosCarrito) {
        // Aqui restamos la cantidad comprada al stock actual
        $sqlStock = "UPDATE productos SET Stock = Stock - :cantidad WHERE CodProd = :CodProd";
        $this->db->query($sqlStock);
        // 2. Necesitas pasar cuánto vas a restar
        $cantidad = $productosCarrito[$codProd];
        $this->db->bind(":cantidad", $cantidad);
        $this->db->bind(":CodProd", $codProd);
        return $this->db->execute();
    }
}