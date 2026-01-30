<?php
namespace Mnl\BooklibApi\Core;
use PDO;
use PDOException;

class Database
{
    private static $pdo = null;

    private function __construct()
    {
        // Constructor privado: evitamos instancias accidentales
    }



    //Devuelve una conexión PDO reutilizable (singleton/lazy).

    public static function getConnection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        // Cargar constantes de configuración (define()) solo una vez
        $configPath = __DIR__ . '/../../config/config.php';
        if (is_file($configPath)) {
            require_once $configPath;
        }

        if (!defined('DB_HOST') || !defined('DB_USUARIO') || !defined('DB_PASSWORD') || !defined('DB_NOMBRE')) {
            throw new \RuntimeException(
                'Faltan constantes de BD (DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE). Revisa config/config.php'
            );
        }

        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NOMBRE . ';charset=utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$pdo = new PDO($dsn, DB_USUARIO, DB_PASSWORD, $options);
            return self::$pdo;
        } catch (PDOException $e) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode(['error' => 'Error de conexión a BD', 'detail' => $e->getMessage()]);
            exit;
        }
    }
}