<?php
$title = "Registro | FitControl";
require __DIR__ . '/functions/usuarios/clase_registro.php';
include __DIR__ . '/Includes/header.php';

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






<?php
include __DIR__ . '/Includes/footer.php'; 
?>