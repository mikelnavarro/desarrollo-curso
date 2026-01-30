<?php

namespace Mnl\BooklibApi\Controllers;
use Mnl\BooklibApi\Models\Book;

class BookController
{

    public function index(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(Book::getAll());
    }



    /*
     * Muestra un libro por su id
     * @param int $id
     * @return void
     * DESCRIPCION:
     *
     * El modelo de Book en models/ Book.php devuelve un array con los datos
     * Si el libro no existe, se devuelve un error HTTP 404.
     * Este modelo conecta con la base de datos.
     */
    public function show(int $id): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $book = Book::getById($id);

        if ($book === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Libro no encontrado']);
            return;
        }

        echo json_encode($book);
    }
}