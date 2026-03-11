<?php
namespace Mikelnavarro\Exotic;
use Mikelnavarro\Exotic\Db;
class Animal
{


    // Atributos
    protected $db;

    protected $nombre;
    protected $especie;
    protected $edad;
    protected $ingreso;
    protected $estado;
    protected $foto_url;

    public function __construct()
    {
        $this->db = new Db();
    }


    // Listar animales
    public function listaAnimales() {
        $sql = "SELECT * FROM animales";
        $this->db->query($sql);
        return $this->db->registroAssoc();
    }
    // Obtener un animal por identificación
    public function getAnimal($id) {
        $sql = "SELECT * FROM animales WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(":id", $id);
        return $this->db->registroAssoc();
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
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * @param mixed $especie
     */
    public function setEspecie($especie): void
    {
        $this->especie = $especie;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     */
    public function setEdad($edad): void
    {
        $this->edad = $edad;
    }

    /**
     * @return mixed
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * @param mixed $ingreso
     */
    public function setIngreso($ingreso): void
    {
        $this->ingreso = $ingreso;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFotoUrl()
    {
        return $this->foto_url;
    }

    /**
     * @param mixed $foto_url
     */
    public function setFotoUrl($foto_url): void
    {
        $this->foto_url = $foto_url;
    }

}