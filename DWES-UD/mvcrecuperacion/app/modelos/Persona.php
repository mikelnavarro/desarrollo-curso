<?php

namespace Usuario\Mvcrecuperacion;

use PDO;

class Persona
{

    protected $idPersona;
    protected $nombre;
    protected $apellidos;
    protected $telefono;
    protected $email;
    protected $pdo;
    public function __construct() {
        $this->pdo = new Db();
    }




    // Funciones para MOSTRAR PERSONAS
    public function getAllPersonas(): array {
        $sql = "SELECT id, nombre, apellidos, telefono, email FROM personas";
        $stmt = $this->pdo->query($sql);
        $stmt = $this->pdo->registros($fetchMode = PDO::FETCH_ASSOC);
        return $stmt;
    }


    // Función de crear
    public function create($data) {
        $sql = "INSERT INTO personas VALUES (:id, :nombre, :apellidos, :telefono, :email)";
        $this->pdo->query($sql);
        $this->pdo->bind(':id', $data['id']);
        $this->pdo->bind(':nombre', $data['nombre']);
        $this->pdo->bind(':apellidos', $data['apellidos']);
        $this->pdo->bind(':telefono', $data['telefono']);
        $this->pdo->bindd(':email', $data['email']);
        $this->pdo->execute();

    }
    // Función de eliminar
    public function eliminar($id)
    {
        $sql = "DELETE FROM personas WHERE id = :id";
        $this->pdo->query($sql);
        $this->pdo->bind(':id', $id, PDO::PARAM_INT);
        $stmt = $this->pdo->execute();
        // reajustar AUTO_INCREMENT (opcional)
        $this->pdo->query("ALTER TABLE personas AUTO_INCREMENT = 1");
        $this->pdo->execute();
        return $stmt;
    }
    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona): void
    {
        $this->idPersona = $idPersona;
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
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
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


}