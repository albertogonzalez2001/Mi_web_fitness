<?php
$title = "Acceso | FitControl";
require __DIR__ . '/functions/usuarios/clase_login.php';
include __DIR__ . '/Includes/header.php';

if(isset($_POST['login'])){
    $login = new Login($_POST['email'], $_POST['password']);
}

?>

<div class="login-registro">
    <div class="formulario-login-registro">
        <h2 class="titulo-login">INICIAR SESIÓN</h2>
        <?php
        //Comprobación de error en la url
        if(isset($_GET['error'])){
            echo '<div style="color: red; margin-bottom: 10px; font-weight: bold;">';
            if ($_GET['error'] == 'auth') {
                echo "Contraseña incorrecta. Inténtalo de nuevo.";
            } elseif ($_GET['error'] == 'noexiste') {
                echo "El correo electrónico no está registrado.";
            }
            echo '</div>';
        }
        ?>
        <form action="" method="POST">
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