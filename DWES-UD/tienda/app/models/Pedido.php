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
    public function marcarComoEnviado(int $idPedido)
    {
        $sql = "UPDATE pedidos SET Enviado = 1 WHERE CodPed = :idPedido";
        $this->db->query($sql);
        $this->db->bind(':idPedido', $idPedido);
        return $this->db->execute();
    }

    /**
     * Inserta una línea individual de producto asociada a un pedido
     */
    public function guardarLinea(int $idP, int $idProd, int $unidades) {
        $sql = "INSERT INTO pedidosproductos (Pedido, Producto, Unidades) 
            VALUES (:Pedido, :Producto, :cantidad)";

        $this->db->query($sql);
        $this->db->bind(':Pedido', $idP);
        $this->db->bind(':Producto', $idProd);
        $this->db->bind(':cantidad', $unidades);

        return $this->db->execute();
    }

    // Necesitamos insertar pedidos (generales) no contrendrán mucha información
    public function guardarPedido(int $CodRes, array $carrito)
    {
        try {

            $sql = "INSERT INTO pedidos (Fecha, Enviado, Restaurante) VALUES (NOW(), 0, :CodRes)";
            $this->db->query($sql);
            $this->db->bind(":CodRes", $CodRes);


            // En lugar de lastInsertId() de PDO, pedimos el ID a MySQL directamente
            if ($this->db->execute()) {
                // Obtenemos el ID del pedido
                $this->db->query("SELECT LAST_INSERT_ID() as id");
                // Usa el método que tengas para obtener una fila
                $res = $this->db->registro();
                return $res->id;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}