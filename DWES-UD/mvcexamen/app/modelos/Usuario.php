<?php

namespace Mnl\Mvcexamen;
use Mnl\Mvcexamen\Db;
class Usuario
{

    // Atributos
    protected $pdo;
    protected $id;
    protected $nombre;
    protected $clave;
    protected $email;


    // Constructor
    public function __construct() {
        $this->pdo = new Db();
    }



    // Funciones de los Usuarios (Veterinarios)
    public function comprobarUsuario($email,$clave){
        try {
            $sql = "SELECT email, clave FROM usuarios WHERE email = :email AND clave = :clave";
            if ($stmt = $this->pdo->query($sql)){
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":clave",$clave);

                return $stmt->execute();
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
    }


}