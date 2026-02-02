<?php

namespace Mnl\Mvcexamen;

use Mnl\Mvcexamen;Controlador;

class Api extends Controlador
{

    public function __construct(){
        $this->vista = '';
        $this->datos = ['titulo' => 'API MASCOTAS'];
        $this->modelo = $this->modelo('Mascota');
    }

    private function jsonResponse($data, int $status = 200): void {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

public function index(){
        $this->jsonResponse($this->modelo->todas());
    }

    public function cars(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->jsonResponse(["error" => "Method Not Allowed"], 405);
            exit;
        }

        $mascotas = $this->modelo->todas();
        $this->jsonResponse($mascotas, 200);
    }

    public function car(int $id): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->jsonResponse(["error" => "Method Not Allowed"], 405);
            exit;
        }

        $car = $this->modelo->getId($id);

        if (!$car) {
            $this->jsonResponse(["error" => "Car not found"], 404);
            exit;
        }

        $this->jsonResponse($car, 200);
        return;
    }
}

