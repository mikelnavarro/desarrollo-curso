<?php
namespace Acme\IntranetRestaurante\Models;
use Mnl\tools\Db;
use PDO;

class Producto {
    private Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    // Devuelve todos los productos (array asociativo)
    public function listar(): array
    {
        $sql = "SELECT CodProd AS id, Nombre AS nombre, Descripcion AS descripcion, Precio, Stock FROM productos ORDER BY Nombre";
        $this->db->query($sql);
        $rows = $this->db->registros();
        $result = [];
        foreach ($rows as $o) {
            $result[] = (array)$o;
        }
        return $result;
    }

    // Productos por categoria
    public function productosPorCategoria(int $categoria): array
    {
        $sql = "SELECT CodProd AS id, Nombre AS nombre, Descripcion AS descripcion, Precio, Stock FROM productos WHERE Categoria = :categoria ORDER BY Nombre";
        $this->db->query($sql);
        $this->db->bind(':categoria', $categoria);
        $rows = $this->db->registros();
        $result = [];
        foreach ($rows as $o) {
            $result[] = (array)$o;
        }
        return $result;
    }

    // Buscar producto por id
    public function buscarPorId(int $codProd): ?array
    {
        $sql = "SELECT CodProd AS id, Nombre AS nombre, Descripcion AS descripcion, Precio, Stock FROM productos WHERE CodProd = :codProd";
        $this->db->query($sql);
        $this->db->bind(':codProd', $codProd);
        $row = $this->db->registro();
        if ($row === false || $row === null) return null;
        return (array)$row;
    }
}