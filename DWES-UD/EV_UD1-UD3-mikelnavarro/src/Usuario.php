<?php
require "Conexion.php";
class Usuarios {


    private $conexion;

    // Constructor
	public function __construct(){
		$this->conexion = (new Conexion())->conexion;
    }
    public function comprobarUsuario($username,$password){
	try {
		$sql = "SELECT username, password FROM usuarios WHERE username = :user AND password = :pass";
		if ($stmt = $this->conexion->prepare($sql)){
		$stmt->bindParam(":user",$username);
		$stmt->bindParam(":pass",$password);
			
		return $stmt->execute();
	}
	} catch(Exception $exception) {
		echo $exception->getMessage();
	}
	}
}