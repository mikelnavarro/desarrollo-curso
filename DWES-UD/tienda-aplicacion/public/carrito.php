<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (empty($carrito)) {
        echo "El carrito está vacío";
    }
    ?>
    <h1>Carrito</h1>


    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>

        <?php foreach ($carrito as $linea): ?>
            <tr>
                <td><?= htmlspecialchars($linea['Nombre']) ?></td>
                <td><?= $linea['cantidad'] ?></td>
                <td><?= number_format($linea['Precio'], 2) ?> €</td>
                <td><?= number_format($linea['Precio'] * $linea['cantidad'], 2) ?> €</td>
            </tr>
    </table>
    <?php endforeach; ?>
    <p><strong>Total:</strong>
        <?= number_format(array_sum(array_map(fn($linea) => $linea['Precio'] * $linea['cantidad'], $carrito)), 2) ?> €
    </p>
    <!-- <a href="checkout.php">Confirmar pedido</a> -->
</body>

</html>