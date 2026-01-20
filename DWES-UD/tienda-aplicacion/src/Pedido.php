<?php

namespace Mikelnavarro\TiendaAplicacion;

use Mikelnavarro\TiendaAplicacion\Tools\Conexion;
use PDO;

class Pedido
{
    /**
     * Crea un pedido a partir del carrito, inserta líneas y actualiza stock.
     * Devuelve un array con keys: codPed, fecha, total, orderLinesHtml
     * Lanzará Exception en caso de error.
     */
    public static function crearDesdeCarrito(array $carrito, ?int $restaurante = null): array
    {
        if (empty($carrito)) {
            throw new \InvalidArgumentException('Carrito vacío');
        }

        $pdo = Conexion::getConexion();
        $pdo->beginTransaction();
        try {
            $fecha = date('Y-m-d');
            $sqlPed = "INSERT INTO pedidos (Fecha, Enviado, Restaurante) VALUES (:fecha, :enviado, :restaurante)";
            $stmtPed = $pdo->prepare($sqlPed);
            $stmtPed->execute([
                'fecha' => $fecha,
                'enviado' => 0,
                'restaurante' => $restaurante
            ]);

            $codPed = (int)$pdo->lastInsertId();

            $sqlLinea = "INSERT INTO pedidosproductos (Pedido, Producto, Unidades) VALUES (:pedido, :producto, :unidades)";
            $stmtLinea = $pdo->prepare($sqlLinea);

            $sqlUpdateStock = "UPDATE productos SET Stock = GREATEST(0, Stock - :unidades) WHERE CodProd = :codprod";
            $stmtUpdate = $pdo->prepare($sqlUpdateStock);

            $orderLinesHtml = '';
            $totalNumeric = 0.0;

            foreach ($carrito as $id => $linea) {
                $codProd = $linea['CodProd'] ?? $id;
                $unidades = (int)($linea['cantidad'] ?? 0);
                $precio = (float)($linea['Precio'] ?? 0);

                $stmtLinea->execute([
                    'pedido' => $codPed,
                    'producto' => $codProd,
                    'unidades' => $unidades
                ]);

                $stmtUpdate->execute([
                    'unidades' => $unidades,
                    'codprod' => $codProd
                ]);

                $subtotal = $precio * $unidades;
                $totalNumeric += $subtotal;
                $orderLinesHtml .= sprintf(
                    '<tr><td>%s</td><td>%d</td><td>%.2f €</td><td>%.2f €</td></tr>',
                    htmlspecialchars($linea['Nombre'] ?? 'Producto'),
                    $unidades,
                    $precio,
                    $subtotal
                );
            }

            $pdo->commit();

            return [
                'codPed' => $codPed,
                'fecha' => $fecha,
                'total' => $totalNumeric,
                'orderLinesHtml' => $orderLinesHtml,
            ];
        } catch (\Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            throw $e;
        }
    }
}
