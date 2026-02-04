<?php

namespace Usuario\Mvcrecuperacion;
use Usuario\Mvcrecuperacion\Db;
class Veterinario
{

    // Atributos

    private $pdo;
    private $idVeterinario;
    private $nombre;
    private $email;
    private $clave;


    // Constructor
    public function __construct(){
        $this->pdo = new Db();
    }


    // Funciones de los Usuarios (Veterinarios)

    public function verificarCredenciales(string $email, string $clave): ?array
    {
        $sql = "SELECT id, email, clave, nombre FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario && password_verify($clave, $usuario['clave'])) {
            unset($usuario['clave']);
            return $usuario;
        }

        return null; // credenciales inválidas
    }
    /**
     * @return mixed
     */
    public function getIdVeterinario()
    {
        return $this->idVeterinario;
    }

    /**
     * @param mixed $idVeterinario
     */
    public function setIdVeterinario($idVeterinario): void
    {
        $this->idVeterinario = $idVeterinario;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave): void
    {
        $this->clave = $clave;
    }





}