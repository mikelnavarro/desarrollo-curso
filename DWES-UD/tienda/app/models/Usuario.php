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
    public function obtenerUsuarioPorEmail($email) {
        $sql = "SELECT id, nombre, email, password FROM usuarios WHERE email = :email";
        $this->db->query($sql, [$email]);
        return $this->db->fetch();

}