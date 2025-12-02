<?php

require_once "../src/Conexion.php";
class Registro
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = (new Conexion())->conexion;
    }

    // Registrarse

    public function registrarUsuario($username, $password)
    {
        try {
            $enc_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (username,password) VALUES (:username, :password)";
            if ($stmt = $this->conexion->prepare($sql)) {
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $enc_password);

                return $stmt->execute();
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
    // Ver perfil
    public function getUsername() {

    }
    // Ver ID
    public function getId(){
        $sql = "SELECT id FROM usuarios";
        
    }
}
