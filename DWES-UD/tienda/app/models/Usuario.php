<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Db;
class Usuario
{

    // Atributos
    protected $db;
    protected $id;
    protected $nombre;
    protected $email;
    protected $password;
    public function __construct()
    {
        $this->db = new Db();
    }

    // Funciones

    public function iniciarSesion($email, $password) {
        $this->db->query("SELECT * FROM restaurantes WHERE Correo = :Correo");
        $this->db->bind(':Correo', $email);
        $fila = $this->db->registro(); // Obtenemos el usuario


        if ($fila) {
            if ($password == $fila->Clave) {
                return $fila;
            }
        }
        return false;
    }
    public function obtenerUsuarioPorEmail($email) {
        $this->db->query("SELECT * FROM restaurantes WHERE Correo = :email");
        $this->db->bind(':email', $email);

        // registro() devuelve el objeto con las propiedades
        return $this->db->registro();
    }
}