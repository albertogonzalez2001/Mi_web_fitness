<!--De nuevo utilizamos la clase de login, para realizar funciones de 
validación de datos entre otras cosas.-->

<?php

require __DIR__ . '/funciones_usuarios.php';
require __DIR__ . '/../../Includes/conexion.php';

class Login{
    private string $email;
    private string $password;
    private PDO $connectionDB;


    public function __construct(string $email, string $password){
        $this->email = secure_data($email);
        $this->password = secure_data($password);
        $this->connectionDB = connectionDB();

        if($this->check_email_exists()){
            $passInDB = $this->get_pass_in_db();
            $auth = password_verify($this->password, $passInDB);
            if($auth){
                ob_start();
                session_start();
                $_SESSION['email'] = $this->email;
                $_SESSION['valid'] = true;
                header('Location:/Mi_web_fitness/index.php');
                exit;
            } else {
                //Fallo en contraseña
                header('Location:/Mi_web_fitness/login.php?error=auth');
                exit;
            }    

        } else {
            //Fallo en el email
            header('Location:/Mi_web_fitness/login.php?error=noexiste');
            exit;
        }
    }

    /*Se importa la función hecha previamente en clase_registro.php para validar email.*/
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
        $stmt = $this->connectionDB->prepare('SELECT * FROM usuarios WHERE email=:email');
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        $result = $stmt->fetch();

        return $result['password'];
    }

}

?>
