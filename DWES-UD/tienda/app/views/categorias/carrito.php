<?php require RUTA_APP . '/views/inc/header.php'; ?>

    <div class="contenedor-carrito">
        <h2>🛒 Tu Pedido</h2>

        <?php if (empty($_SESSION['carrito'])): ?>
            <p>El carrito está vacío. <a href="<?= RUTA_URL ?>/Categorias">Volver a la tienda</a></p>
        <?php else: ?>
            <table class="tabla-carrito">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unidad</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $granTotal = 0;
                // Asumimos que $datos['productos_carrito'] contiene los detalles de la BD
                foreach ($datos['productos_carrito'] as $item):
                    $cantidad = $_SESSION['carrito'][$item['CodProd']];
                    $subtotal = $item['Precio'] * $cantidad;
                    $granTotal += $subtotal;
                    ?>
                    <tr>
                        <td><?= $item['Nombre']; ?></td>
                        <td><?= $cantidad; ?></td>
                        <td><?= number_format($item['precio'], 2); ?>€</td>
                        <td><?= number_format($subtotal, 2); ?>€</td>
                        <td>
                            <a href="<?= RUTA_URL ?>/Carrito/eliminar/<?= $item['CodProd']; ?>" class="text-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Total Pedido:</strong></td>
                    <td colspan="2"><strong><?= number_format($granTotal, 2); ?>€</strong></td>
                </tr>
                </tfoot>
            </table>

            <div class="acciones-carrito">
                <a href="<?= RUTA_URL ?>/Categorias" class="btn-secundario">Seguir Comprando</a>
                <form action="<?= RUTA_URL ?>/Pedidos/confirmar" method="POST" style="display:inline;">
                    <button type="submit" class="btn-comprar">Confirmar Pedido</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <style>
        .tabla-carrito {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .tabla-carrito th, .tabla-carrito td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .text-danger { color: #e74c3c; text-decoration: none; }
        .acciones-carrito {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-secundario {
            background: #95a5a6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>

<?php require RUTA_APP . '/views/inc/footer.php'; ?><?php
