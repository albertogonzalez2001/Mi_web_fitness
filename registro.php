<?php
$title = "Registro | FitControl";
include __DIR__ . '/Includes/header.php';
require __DIR__ - '/usuarios/clase_registro.php';
?>

<div class="login-registro">
    <div class="formulario-login-registro">
        <h2 class="titulo-login">REGISTRO</h2>
        <form action="">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="rol" required>
                <option value="">--Selecciona el Rol--</option>
                <option value="usuario">Usuario</option>
                <option value="entrenador">Entrenador</option>
            </select>
            <button type="submit" name="login">Registrarse</button>
            <p>¿Ya tienes una cuenta? <a href="/Mi_web_fitness/login.php">Iniciar sesión</a></p>
        </form>
    </div>   
</div>




<form action="functions/usuarios/crear.php"></form>

<?php
include __DIR__ . '/Includes/footer.php'; 
?>