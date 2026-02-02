<?php require_once __DIR__ . '/../inc/header.php'; ?>
<h2>Lista de mascotas</h2>
    <a href="../Logout.php">Cerrar sesion</a>
<a href="<?=RUTA_URL; ?>">Inicio</a>
<a href="<?=RUTA_URL . "/Articulos/index";?>">Artículos</a>
<a href="<?=RUTA_URL . "/Articulos/index";?>">Artículos</a>
<a href="<?=RUTA_URL . "/Articulos/index";?>">Iniciar sesión</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha de Nacimiento</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Itera sobre el array de libros devuelto por el método
            foreach ($datos['mascotas'] as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tipo"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["fecha_nacimiento"]) . "</td>";
                echo '<td><img src="' . $row['foto_url'] . '" alt="Foto"></td>';
                echo "<td>";
                echo "<a id=Editar href='modificar.php?action=modificar&id=" . htmlspecialchars($row['id']) . "'>Editar</a> | ";
                echo "<a id=Borrar href='principal.php?action=borrar&id=" . htmlspecialchars($row['id']) . "'>Borrar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="registro.php">Registrar una Mascota</a>
<?php require_once __DIR__ . '/../inc/footer.php'; ?>