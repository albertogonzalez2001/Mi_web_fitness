<!--Se utilizan las clases para realizar un tipado más fuerte de los datos, la previa validación 
antes de su envío a la base de datos entre otras cosas.-->

<?php
require __DIR__ . '/funciones_usuarios.php';

class Registro{

    private string $nombre;
    private string $email;
    private string $password;
    private PDO $connectionDB;
    private $result_register;

    public function __construct(string $nombre, string $email, string $password){
        $this->nombre = secure_data($nombre);
        $this->email = secure_data($email);
        $this->password = secure_data($password);
        $this->password = hash_password($this->password);
        $this->connectionDB = connectionDB();

        /*Sirve para validar existencia y en su defecto crear*/
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

    /*Función para saber si el email existe*/
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

    /*Función para el caso de que el usuario no exista, se crea, con los respectivos datos*/
    private function create_user(){
        $stmt = $this->connectionDB->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)');
        $stmt->bindParam(':nombre',$this->nombre);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':password',$this->password);
        $stmt->execute();
        
    }

    public function get_confirmation(){
        if($this->result_register){
            return 'Usuario creado con éxito';
        } else {
            return 'El email ya existe en el sistema';
        }

    }

}

?>