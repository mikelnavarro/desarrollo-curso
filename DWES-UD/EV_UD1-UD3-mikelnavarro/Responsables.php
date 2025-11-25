<?php
require "conexion.php";
require "vendor/autoload.php";




class Responsables {


	private $conexion;
	public function __construct(){
		$this->conexion = (new Conexion)->conexion;
	}

}








?>