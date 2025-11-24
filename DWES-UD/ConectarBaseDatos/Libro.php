<?php
require_once 'Conexion.php';
class Libro
{

    // Atributos
    private $id;
    private $titulo;
    private $autor;
    private $n_paginas;
    private $fecha_publicacion;
    private $terminado;
    private $conexion;


    
    
    // Constructores
    public function __construct()
    {
        $this->conexion = (new Conexion())->conexion;
    }

    // Funciones
    public function modificar(array $datos){
        $sql = "UPDATE libros SET id=:id, titulo=:titulo, autor=:autor, n_paginas=:n_paginas, fecha_publicacion=:fecha_publicacion, terminado=:terminado WHERE id=:id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute(array(
            ":id"=>$datos["id"],
            ":titulo"=>$datos["titulo"],
            ":autor"=>$datos["autor"],
            ":n_paginas"=>$datos["n_paginas"],
            ":fecha_publicacion"=>$datos["fecha_publicacion"],
            ":terminado"=>$datos["terminado"],
        ));
    }
    public function listar()
    {
        $sql = "SELECT id, titulo, autor, n_paginas, fecha_publicacion, terminado FROM libros"; // Consulta para seleccionar todos los libros
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insertar(array $datos){
        $sql = "INSERT INTO libros (titulo, autor, n_paginas, fecha_publicacion) VALUES
        (:titulo, :autor, :n_paginas, :fecha_publicacion)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($datos);
    }
    public function borrar($id){
        $sql = "DELETE FROM libros WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        return $stmt->execute() . $this->conexion->prepare("ALTER TABLE libros AUTO_INCREMENT = 1")->execute();

    }
    
    public function crear(array $datos){
        $sql = "INSERT INTO libros (titulo, autor, n_paginas, fecha_publicacion) VALUES
        (:titulo, :autor, :n_paginas, :fecha_publicacion)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute(array(
            ":titulo"=>$datos["titulo"],
            ":autor"=>$datos["autor"],
            ":n_paginas"=>$datos["n_paginas"],
            ":fecha_publicacion"=>$datos["fecha_publicacion"]
        ));
    }
    public function getID($id){
        $sql = "SELECT id FROM libros WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getTitulo(){
        $sql = "SELECT titulo FROM libros WHERE titulo = :titulo";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}