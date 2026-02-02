<?php
namespace Acme\IntranetRestaurante\Models;

use Mnl\Tools\Db;
use PDO;

class Categoria {
    public $codCat, $nombre, $descripcion;
    private PDO $db;

    public function __construct() {
        $this->db = (new Db())->pdo;
    }

    public function todas(): array {
        $stmt = $this->db->query("SELECT * FROM Categorias");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function buscarPorId(int $codCat): ?Categoria {
        $stmt = $this->db->prepare("SELECT * FROM Categorias WHERE codCat = :codCat");
        $stmt->execute(['codCat'=>$codCat]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $c = new Categoria();
            foreach($row as $k=>$v) $c->$k = $v;
            return $c;
        }
        return null;
    }
}
