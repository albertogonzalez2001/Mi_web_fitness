<?php
//Variables de la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "fitness_db";

//Funcionalidades de PDO
$db_options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
);



?>