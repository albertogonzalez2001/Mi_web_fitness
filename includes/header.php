<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'FitControl'?></title>
    <script src="/Mi_web_fitness/js/script.js"></script>
    <link rel="stylesheet" href="/Mi_web_fitness/css/estilos.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a class="logo" href="/Mi_web_fitness/index.php">
            <img src="/Mi_web_fitness/uploads/images/Logo-Web.png" alt="Imágen del logo">
            <h2>Fit<span style="color: rgb(255, 102, 0)">Control</span></h2>
        </a>
        <nav class="header-navigation">
            <a href="/Mi_web_fitness/index.php">Página de inicio</a>
            <a href="/Mi_web_fitness/rutinas.php">Rutinas</a>
            <a href="/Mi_web_fitness/contacto.php">Contacto</a>
            <a href="/Mi_web_fitness/registro.php">Registro</a>
        </nav>
    </header> 