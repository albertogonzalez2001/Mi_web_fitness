<?php
$title = "Acceso | FitControl";
require __DIR__ . '/Includes/conexion.php';
include __DIR__ . '/Includes/header.php';
?>

<div class="login-registro">
    <div class="formulario-login-registro">
        <h2 class="titulo-login">INICIAR SESIÓN</h2>
        <form action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Iniciar sesión</button>
            <p>¿Todavía no tienes una cuenta? <a href="/Mi_web_fitness/registro.php">Regístrate aquí</a></p>
        </form>
    </div>   
</div>

<?php
include __DIR__ . '/Includes/footer.php'; 
?>