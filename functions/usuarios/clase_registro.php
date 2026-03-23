<!--Se utilizan las clases para realizar un tipado más fuerte de los datos, la previa validación 
antes de su envío a la base de datos entre otras cosas.-->

<?php
require __DIR__ . '/usuarios/funciones_usuarios.php';

class Registro{

    private string $nombre;
    private string $email;
    private string $password;
    private PDO $connectionDB;

    public function __construct(string $nombre, string $email, string $password){
        $this->nombre = secure_data($nombre);
        $this->email = secure_data($email);
        $this->password = secure_data($password);
        $this->password = hash_password($this->password);
        $this->connectionDB = connectionDB();

        try{
            if($this->check_email_exists()){
                $this->result_register = false;
            } else {
                $this->create_user();
                $this->result_register = true;
            }
        }catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }
    }

    private function check_email_exists(){
        $stmt = $this->connectionDB->prepare('SELECT * FROM usuarios WHERE email=:email');
        /*Sigue elaborando esta función*/
    }



}




?>