<?php require RUTA_APP . '/views/inc/header.php'; ?>

    <div class="contenedor-carrito">
        <h2>Tu Pedido</h2>
        <h2><?php echo $datos['titulo']; ?></h2>
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
                // echo "<pre>";
                // print_r($datos['productos_carrito']);
                // echo "</pre>";

                // Asumimos que $datos['productos_carrito'] contiene los detalles de la BD
                foreach ($datos['productos_carrito'] as $producto):
                    ?>
                    <tr>
                        <td><?= $producto['Nombre']; ?></td>
                        <td><?= $producto['Cantidad']; ?></td>
                        <td><?= $producto['Precio']; ?> €</td>
                        <td><?= $producto['Subtotal']; ?> €</td>
                        <td>
                            <a href="<?= RUTA_URL ?>/Carrito/eliminar/<?= $producto['CodProd']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Total Pedido:</strong></td>
                    <td colspan="2"><strong><?= number_format($datos['granTotal'], 2); ?> €</strong></td>
                </tr>
                </tfoot>
            </table>

            <div class="acciones-carrito">
                <a href="<?= RUTA_URL ?>/Categorias" class="btn-secundario">Seguir Comprando</a>
                <form action="<?= RUTA_URL ?>/Pedidos/confirma" method="POST">
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
        }e
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
        .btn-comprar {
            background: #95a5a6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-secundario {
            background: #95a5a6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
