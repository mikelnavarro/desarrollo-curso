<body>

<header>
    <h1>🌿 Fauna del Mundo</h1>
    <p>Explorando el reino animal especie por especie</p>
    <span class="mvc-badge">📂 Vista — lista_animales.php</span>
</header>
<main>

    <!--
        NOTA DIDÁCTICA para el alumno
        Esta sección explica qué es la Vista en MVC
    -->
    <div class="nota-mvc">
        <strong>👁️ Estás en la VISTA.</strong>
        Su único trabajo es mostrar los datos que le pasó el Controlador
        (la variable <code>$animales</code>).
        La Vista no sabe de dónde vienen esos datos ni cómo se obtuvieron.
        Solo pinta HTML.
    </div>
    <div class="grid">
        <?php foreach ($animales as $animal): ?>

            <a  class="tarjeta"
                href="?accion=detalle&animal=<?= urlencode($animal->getNombre()) ?>">

                <div class="tarjeta-emoji"><?= $animal->getEmoji() ?></div>

                <div class="tarjeta-nombre"><?= htmlspecialchars($animal->getNombre()) ?></div>

                <div class="tarjeta-especie"><?= htmlspecialchars($animal->getEspecie()) ?></div>

                <div class="tarjeta-habitat"><?= htmlspecialchars($animal->getHabitat()) ?></div>

                <span class="ver-mas">Ver detalle →</span>
            </a>

        <?php endforeach; ?>
    </div>

</main>

<footer>
    Ejemplo MVC para DAW · PHP · Patrón Modelo–Vista–Controlador
</footer>