<?php

namespace Usuario\Mvcrecuperacion;
use Usuario\Mvcrecuperacion\Db;
use PDO;
use PDOException;


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
    public function getAllMascotas(): array {
        $sql = "SELECT m.id, m.nombre, m.tipo, m.fecha_nacimiento, m.foto_url, p.nombre
        FROM personas m, mascotas m WHERE m.id_persona = p.id";
        $this->pdo->query($sql);
        return $this->pdo->registros($fetchMode = PDO::FETCH_ASSOC);
    }
    public function todas(): array {
        $sql = "SELECT id, nombre, tipo, fecha_nacimiento, foto_url, id_persona FROM mascotas";
        $this->pdo->query($sql);
        return $this->pdo->registros($fetchMode = PDO::FETCH_ASSOC);

    }
    public function eliminar($id)
    {
        $sql = "DELETE FROM mascotas WHERE id = :id";
        $this->pdo->query($sql);
        $this->pdo->bind(':id', $id, PDO::PARAM_INT);
        $stmt = $this->pdo->execute();
        // reajustar AUTO_INCREMENT (opcional)
        // $this->pdo->query("ALTER TABLE mascotas AUTO_INCREMENT = 1");
        $this->pdo->execute();
        return $stmt;
    }
 
    // Accesores y Modificadores


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