<!--De nuevo utilizamos la clase de login, para realizar funciones de 
validación de datos entre otras cosas.-->

<?php

require __DIR__ . '/funciones_usuarios.php';
require __DIR__ . '/../../Includes/conexion.php';

class Login{
    private string $nombre;
    private string $email;
    private string $password;
    private PDO $connectionDB;


    public function __construct(string $nombre, string $email, string $password){
        $this->nombre = secure_data($nombre); 
        $this->email = secure_data($email);
        $this->password = secure_data($password);
        $this->connectionDB = connectionDB();

        if($this->check_email_exists()){
            //Sigue elaborando este if de aquí para verificar si el email es correcto

        }




    }


    private function check_email_exists(){
        $stmt = $this->connectionDB->prepare('SELECT * FROM usuarios WHERE email=:email');
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $result = $stmt->fetch();

        if(isset($result['email'])){
            return true;
        } else {
            return false;
        }
    }
    
    private function get_pass_in_db(){
        $stmt = $this->connectionDB->prepare['SELECT * FROM usuarios WHERE email=:email'];
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $result = $stmt->fetch();

        return $result['password'];
    }

}

?>