<?php
$title = "Página Principal - FitControl";
require __DIR__ . '/Includes/conexion.php';
include __DIR__ . '/Includes/header.php'; 
?>

<section class="section">
    <div class="hero-content">
        <div class="content">
            <h1>FITNESS IS THE CURE</h1><br>
            <p>Luchar contra las enfermedades, perseguir la longevidad, construir una comunidad y 
                hacerse más fuerte para la vida.
            </p><br>
            <p>¡Accede a nuestras rutinas personalizadas!</p><br>
            <a href="/Mi_web_fitness/rutinas.php" class="boton-estilizado">RUTINAS</a><br>
            <p>¡Consulta más info abajo!</p><br>
            <a href="/Mi_web_fitness/contacto.php" class="link-estilizado">CONTÁCTANOS SI TIENES DUDAS</a>
        </div>
    </div>
</section>


<?php
include __DIR__ . '/Includes/footer.php'; 
?>     