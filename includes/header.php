<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'FitControl'?></title>
    <script src="/Mi_web_fitness/js/script.js"></script>
    <link rel="stylesheet" href="/Mi_web_fitness/css/estilos.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <a class="logo" href="/Mi_web_fitness/index.php">
            <img src="/Mi_web_fitness/uploads/images/Logo-Web.png" alt="Imágen del logo">
            <h2>FitControl</h2>
        </a>
        <nav class="header-navigation">
            <a href="/Mi_web_fitness/index.php">Página de inicio</a>
            <a href="/Mi_web_fitness/rutinas.php">Rutinas</a>
            <a href="#">Contacto</a>
            <a href="/Mi_web_fitness/registro.php">Registro</a>
        </nav>
    </header> 