<?php
namespace Mikel;
require "../tools/Conexion.php";
require "../vendor/autoload.php";

class GestorLectura implements AccionesBD {


    // Atributos
    private $conexion;
    function actualizar($id, array $datos){
        
        // Actualizamos
        $stmt = $conexion->prepare("UPDATE lectura SET email = :email WHERE id = :id");
        if ($stmt->execute(array(':titulo_lectura' =>$titulo_lectura, ':autor' =>$autor, ':paginas' =>$paginas, ':terminado' =>$terminado, ':fecha_lectura' =>$fecha_lectura))){
            echo "Actualización correcta";
        }
    }
    function listar(){
        // Realizamos una operacion de lectura SQL
        $stmt = $conexion->query("SELECT id,titulo_lectura,autor,paginas,fecha_lectura FROM lectura");
        
        // Datos del array
        $arrayLibros = $stmt->fetchAll(PDO::FETCH_ASSOC); // Almacena en array llamado libros

        return $arrayLibros;
    }
    function insertar(array $datos) {

        // Insercion 1
        // Los nombres de los marcadores (ej. :nombre) deben coincidir con las claves del array.
        $stmt = $conexion->prepare("INSERT INTO lectura (titulo_lectura,autor,paginas,fecha_lectura) VALUES (:titulo_lectura,:autor,:paginas,:fecha_lectura)");
        // Bind y execute:
        if($stmt->execute(array(':titulo_lectura' =>$titulo_lectura, ':autor' =>$autor, ':paginas' =>$paginas, ':fecha_lectura' =>$fecha_lectura))); {
            echo "Se ha creado el nuevo registro!";
        }
    }
    
    
}

?>