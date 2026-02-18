<?php require RUTA_APP . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?= RUTA_URL ?>styles.css">
    <div class="contenedor-carrito">
        <h2><?php echo $datos['titulo']; ?></h2>
        <h4><em>Tu pedido</em></h4>
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
                // echo "<pre>";
                // print_r($_SESSION['carrito']);
                // echo "</pre>";
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
                <form action="<?= RUTA_URL ?>/Pedidos/crear" method="POST">
                    <label for="direccion">Dirección: </label>
                    <input type="text" id="direccion" name="direccion">
                    <select name="metodo_pago">
                        <option value="transferencia">TRANSFERENCIA</option>
                        <option value="en_efectivo">EFECTIVO</option>
                        <option value="tarjeta_de_credito">TARJETA DE CRÉDITO</option>
                    </select>
                    <input type="submit" id="ConfirmarPedido" value="Confirmar">
                </form>
            </div>
        <?php endif; ?>
        <a href="<?= RUTA_URL ?>/Categorias" class="btn-secundario">Seguir Comprando</a>
    </div>

