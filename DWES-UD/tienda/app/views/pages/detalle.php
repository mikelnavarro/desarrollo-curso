<?php require RUTA_APP . '/views/inc/header.php'; ?>

<div class="perfil-container">
    <div class="perfil-card">
        <div class="perfil-header">
            <h2>Datos del Restaurante</h2>
            <span class="badge">Código: <?= $datos['id']; ?></span>
        </div>

        <div class="perfil-body">
            <div class="info-group">
                <p>Correo Electrónico: <?= $datos['email']; ?></p>
            </div>
        <div class="info-group">
            <p>Ciudad: <?= $datos['ciudad']; ?></p>
        </div>
        </div>
    </div>
</div>
