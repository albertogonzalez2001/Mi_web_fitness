<?php
    session_start();
    
    $_SESSION = array();

    session_destroy();

    header('Location:/Mi_web_fitness/login.php');
    exit();
?>