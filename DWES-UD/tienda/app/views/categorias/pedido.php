<div class="alert alert-success">
    <h2>Confirmación de Pedido</h2>
    <p><?php echo $datos['mensaje']; ?></p>
</div>

<hr>

<div class="resumen-container" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: fit-content;">
    <h3>Resumen del Carrito</h3>

    <table class="table">
        <thead>
        <tr>
            <th>Concepto</th>
            <th>Detalle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Cantidad total de productos:</strong></td>
            <td><?php echo $datos['resumen']['cantidad_articulos']; ?> unidades</td>
        </tr>
        <tr style="font-size: 1.2em; color: #2c3e50;">
            <td><strong>Gran Total:</strong></td>
            <td><strong><?php echo number_format($datos['granTotal'], 2); ?> €</strong></td>
        </tr>
        </tbody>
    </table>
</div>
<a href="index.php" class="btn-volver">Volver a la tienda</a>