<?php

function connectionDB(){

    //Variables de conexión
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "fitness_db";

    //Funcionalidades de PDO
    $db_options = array(
        //Clave                         //Valor
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //Manejo de errores con try catch
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    );

    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", 
        $usuario, 
        $password,
        $db_options);

        return $pdo;
        
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: ", $e->getMessage();
        exit;
    }
}

?>

