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
    public function guardarPedido($CodRes, $carrito){
        $sql = "INSERT INTO pedidos VALUES (NOW(), 0, :CodRes)";
        $this->db->query($sql);
        $this->db->bind(":CodRes", $CodRes);


        if ($this->db->execute()) {
            // Obtenemos el ID del pedido
            $sqlPedido = "SELECT CodPed FROM pedidos ORDER BY CodPed DESC LIMIT 1"; // Obtenemos el pedido que se acaba de insertar
            $idPedido = $this->db->query($sqlPedido)->execute()->registro(PDO::FETCH_ASSOC);
            foreach ($carrito as $idProd => $cantidad) {
                $this->db->query("INSERT INTO pedidosproductos (CodPedProd, Producto, Unidades) VALUES (:CodPedProd, :Producto, :Unidades)");
                $this->db->bind(':CodPedProd', $idPedido);
                $this->db->bind(':Producto', $idProd);
                $this->db->bind(':Unidades', $cantidad);
                $this->db->execute();
            }
            return true;

        }
        return false;
    }
}