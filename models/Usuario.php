<?php


class Usuario {

   
    private $db;
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $image;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }
    public function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRol($rol){
        $this->rol = $rol;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getEmail(){
        return $this->email;

    }

    public function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]) ;

    }

    public function getRol(){
        return $this->rol;
    }

    public function getImage(){
        return $this->image;
    }


    public function save(){
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user',null);";

        $save= $this->db->query($sql);
        $result = false;
        if($save == true){

            $result = true;

        }
        return $result;
    }
    
    public function login(){
        $result = false;
        $email = $this->email;
        $password= $this->password;
        //comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login= $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();

            //verficiar contra
            $verify= password_verify($password, $usuario->password);
         
            if($verify==true){
                $result = $usuario;
                
            }

        }
        return $result;
    }


}

?>