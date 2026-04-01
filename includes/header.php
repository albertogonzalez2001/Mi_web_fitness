<?php
    ob_start();
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'FitControl'?></title>
    <script src="/Mi_web_fitness/js/script.js"></script>
    <link rel="stylesheet" href="/Mi_web_fitness/css/estilos.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<body>
    <header>
        <a class="logo" href="/Mi_web_fitness/index.php">
            <h2>Fit<span style="color: rgb(255, 102, 0)">Control</span></h2>
        </a>
        <nav class="header-navigation">
            <a href="/Mi_web_fitness/index.php">Página de inicio</a>
            <a href="/Mi_web_fitness/rutinas.php">Rutinas</a>
            <a href="/Mi_web_fitness/contacto.php">Contacto</a>
            <?php if(isset($_SESSION['email'])): ?>
                <!--Usuario logueado-->
                <a href="/Mi_web_fitness/logout.php">Cerrar sesión</a>    
                <a>Bienvenido <?php echo $_SESSION['email'];?>!</a>
            <?php else: ?>
                <!--Usuario no logueado-->
            <a href="/Mi_web_fitness/login.php">Registro</a>
            <?php endif;?>
        </nav>
    </header> 