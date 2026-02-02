<?php
namespace Mnl\Tools;

use PDO;
use PDOException;

class Db
{
    public PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                DB_DSN,
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos");
        }
    }
}