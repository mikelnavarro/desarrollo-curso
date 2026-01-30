<?php

namespace Mnl\BooklibApi\Models;

use Mnl\BooklibApi\Core\Database;
class Book
{

    public function __construct() {
    }


    public static function getAll(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM books");
        return $stmt->fetchAll();
    }

    public static function getById(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        $book = $stmt->fetch();

        return $book ?: null;
    }
    // Accesores y Modificadores de Book


}