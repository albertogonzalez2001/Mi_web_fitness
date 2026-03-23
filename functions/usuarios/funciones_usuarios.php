
<!--Archivo PHP para crear las funciones que se usarán en todo lo relacionado con los usuarios-->

<?php

/*Función para quitar espacios, comillas, caracteres no deseados*/
function secure_data($data){
    $data = trim($data);    
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

/*Almacenamos la contraseña en texto plano, en su hash*/
function hash_password($password){
    return password_hash($password, PASSWORD_DEFAULT);
}

?>