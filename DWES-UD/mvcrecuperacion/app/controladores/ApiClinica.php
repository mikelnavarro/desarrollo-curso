<?php

namespace Usuario\Mvcrecuperacion;


use Usuario\Mvcrecuperacion\Controlador;
class ApiClinica
{


    protected  $mascotaModel;
    protected $personaModel;
    // Constructor
    public function __construct() {
        $this->vista = '';
        $this->datos = ['titulo' => 'API CLINICA VETERINARIA'];
        $this->mascotaModel = $this->modelo('Mascota');
        $this->personaModel = $this->modelo('Persona');
    }

    // funcion para encodar esa parte de json
    private function jsonResponse($data, int $status = 200): void {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }
    private function readJsonBody(): ?array
    {
        $raw = file_get_contents("php://input");
        if ($raw === false || trim($raw) === '') {
            return null;
        }
        $data = json_decode($raw, true);
        return is_array($data) ? $data : null;
    }
    // nos responde en json si pedimos



    // esto es el método que nos permite verificar la autenticacion
    private function requireBasicAuth(): void
    {
        $user = $_SERVER['PHP_AUTH_USER'] ?? null;
        $pass = $_SERVER['PHP_AUTH_PW'] ?? null;

        if ($user !== API_BASIC_USER || $pass !== API_BASIC_PASS) {
            header('WWW-Authenticate: Basic realm="mvcapi"');
            $this->jsonResponse(['error' => 'Unauthorized'], 401);
        }
    }
    // GET /apicar/debug
    public function debug(): void
    {
        $this->jsonResponse([
            'message' => 'Debug de la petición HTTP recibida por la API',
            'request' => $this->debugRequest()
        ], 200);
    }
    // VALIDACIÓN
    private function validatePersonPayload(?array $data, bool $requireAllFields = true): ?string
    {
        if (!$data) return "Invalid or empty JSON";

        $required = ['id', 'nombre', 'apellidos', 'telefono', 'email'];
        if ($requireAllFields) {
            foreach ($required as $k) {
                if (!isset($data[$k]) || trim((string)$data[$k]) === '') {
                    return "Missing or empty field: $k";
                }
            }
        }
        return null;
    }


    // METODOS AUTH
    // GET /api/personas  |  POST /api/personas
    public function personas(): void
    {
        $this->requireBasicAuth();

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if ($method === 'GET') {
            $personas = $this->personaModel->getAllPersonas();
            $this->jsonResponse($personas, 200);
        }
        if ($method === 'POST') {
            $data = $this->readJsonBody();
            $err = $this->validatePersonPayload($data, true);
            if ($err) {
                $this->jsonResponse(["error" => $err], 400);
            }

            $ok = $this->personaModel->crear($data);
            if ($ok) {
                $this->jsonResponse(["message" => "La persona se ha creado"], 201);
            }
            $this->jsonResponse(["error" => "No se ha podido crear la persona"], 500);
        }
        $this->jsonResponse(["error" => "Method Not Allowed"], 405);

    }

    public function deleteMascota($id_mascota): void{
        $this->requireBasicAuth();

        $method = $_SERVER['REQUEST_METHOD'] ?? 'DELETE';
        $exists = $this->mascotaModel->getById($id_mascota);
        if (!$exists) {
            $this->jsonResponse(["error" => "Mascota not found"], 404);
        }
        $ok = $this->mascotaModel->eliminar($id_mascota);

        // PARA ELIMINAR
        // PORQUE NECESITAMOS RESPONDER CON UN MENSAJE SI SI O SI NO SE HA ELIMINADO
        if ($ok) {
            $this->jsonResponse(["message" => "La mascota se ha eliminado"], 200);
        } else {
            $this->jsonResponse(["error" => "Error al eliminar la mascota"], 500);
        }
        $this->jsonResponde(["error" => "El Método no es permitido"], 300);
    }

}