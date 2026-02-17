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
    // Necesitamos insertar pedidos (generales) no contrendrán mucha información
    public function guardarPedido($CodRes, $carrito)
    {
        try {

            $sql = "INSERT INTO pedidos VALUES (NOW(), 0, :CodRes)";
            $this->db->query($sql);
            $this->db->bind(":CodRes", $CodRes);
            $this->db->execute();

            if ($this->db->execute()) {
                // Obtenemos el ID del pedido
                $idPedido = $this->db->lastInsertId(); // Obtenemos el pedido que se acaba de insertar


                foreach ($carrito as $idProd => $cantidad) {
                    $this->db->query("INSERT INTO pedidosproductos (CodPedProd, Producto, Unidades) VALUES (:CodPedProd, :Producto, :Unidades)");
                    $this->db->bind(':CodPedProd', $idPedido);
                    $this->db->bind(':Producto', $idProd);
                    $this->db->bind(':Unidades', $cantidad);
                    $this->db->execute();
                }
                return $idPedido;

            }
            return false;
        } catch (PDOException $e) {
            return $e->getMessage();
            return false;
        }
    }
}