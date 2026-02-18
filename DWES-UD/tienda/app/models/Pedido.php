<?php

namespace Mikelnavarro\App;
use Mikelnavarro\App\Db;
use PDO;

class Pedido
{

    private $db;
    protected $CodPed;
    protected $Fecha;
    protected $Enviado;
    protected $Restaurante;


    // Constructores
    public function __construct()
    {
        $this->db = new Db();
    }

    // Funciones para Pedido
    public function marcarComoEnviado($idPedido)
    {
        $sql = "UPDATE pedidos SET Enviado = 1 WHERE CodPed = :idPedido";
        $this->db->query($sql);
        $this->db->bind(':idPedido', $idPedido);
        return $this->db->execute();
    }
    // Necesitamos insertar pedidos (generales) no contrendrán mucha información
    public function guardarPedido($CodRes, $carrito)
    {
        try {

            $sql = "INSERT INTO pedidos (fecha, enviado, Restaurante) VALUES (NOW(), 0, :CodRes)";
            $this->db->query($sql);
            $this->db->bind(":CodRes", $CodRes);
            if ($this->db->execute()) {
                // Obtenemos el ID del pedido
                $idPedido = $this->db->lastInsertId(); // Obtenemos el pedido que se acaba de insertar


                foreach ($carrito as $idProd => $cantidad) {
                    $this->db->query("INSERT INTO pedidosproductos (Producto, Unidades) VALUES (:Producto, :Unidades)");
                    $this->db->bind(':Producto', $idProd);
                    $this->db->bind(':Unidades', $cantidad);
                    $this->db->execute();
                }
                return $idPedido;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}