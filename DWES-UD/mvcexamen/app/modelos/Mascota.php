<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Db;
use PDO;

class Mascota
{

    // Atributos
    protected $pdo;
    protected $nombre;
    protected $tipo;
    protected $fecha_nacimiento;
    protected $foto;
    protected $idPersona;

    // Constructor
    public function __construct(){
        $this->pdo = new Db();
    }


    // Funciones
    public function todas(): array {
        $sql = "SELECT nombre, tipo, fecha_nacimiento, foto_url FROM mascotas";
        $this->pdo->query($sql);
        return $this->pdo->registros($fetchMode = PDO::FETCH_OBJ);

    }
    public function eliminar($id)
    {
        $sql = "DELETE FROM mascotas WHERE id = :id";
        $stmt = $this->pdo->query($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute() . $this->pdo->query("ALTER TABLE mascotas AUTO_INCREMENT = 1")->execute();
    }

    public function registrar(array $datos)
    {
        try {
            $sql = "INSERT INTO mascotas (nombre,tipo,fecha_nacimiento,foto_url,id_persona) VALUES
    	(:nombre, :tipo, :fecha_nac, :foto_url, :id_persona)";
            $stmt = $this->pdo->query($sql);
            return $stmt->execute(array(
                ":nombre" => $datos["nombre"],
                ":tipo" => $datos["tipo"],
                ":fecha_nac" => $datos["fecha_nac"],
                ":foto_url" => $datos["foto_url"],
                ":id_persona" => $datos["id_persona"]
            ));
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }    // Accesores y Modificadores


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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento): void
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
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


    public function getFoto() {
        return $this->foto;
    }
}