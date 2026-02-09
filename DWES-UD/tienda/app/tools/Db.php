<?php
namespace Mikelnavarro\App;

use PDO;
use PDOException;
require_once '../config.php';
class Db {
    // Atributo
    protected $conn;
    public function __construct() {
        try {
            // Usamos las constantes directamente
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

            $this->conn = new PDO($dsn, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Lo sentimos, hay un problema técnico con la base de datos.");
        }
    }
    public function query($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }
}