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

    public function verificarCredenciales(string $email, string $clave): ?array
    {
        $sql = "SELECT id, email, clave, nombre FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['clave'])) {
            unset($usuario['clave']);
            return $usuario;
        }

        return null; // credenciales inválidas
    }


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