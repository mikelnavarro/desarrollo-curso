<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Consultar</title>
    <style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h2>Listado</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Páginas</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Iteramos sobre el $stmt que nos pasó index.php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                extract($row);

                echo "<tr>";
                echo "<td>" . htmlspecialchars($id) . "</td>";
                echo "<td>" . htmlspecialchars($titulo) . "</td>";
                echo "<td>" . htmlspecialchars($autor) . "</td>";
                echo "<td>" . htmlspecialchars($paginas) . "</td>";
                echo "<td>" . htmlspecialchars($fecha_lectura) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>