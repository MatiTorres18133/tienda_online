<?php
require_once('models/Usuario.php');

class usuarioController{


    public function index(){

    echo "Controlador Usuarios, Accion Index";
    }


    public function registro(){

       require_once('views/usuario/register.php');
    }

    public function save(){

        if(isset($_POST)){
            //VERIFICAR SI LAS VARIABLES QUE LLEGAB POR POST CONTIENEN ALGO
            $nombre = isset($_POST['name'])?$_POST['name']:false;
            $apellidos=isset($_POST['apellido'])?$_POST['apellido']:false;
            $password=isset($_POST['password'])?$_POST['password']:false;
            $email=isset($_POST['email'])?$_POST['email']:false;



            //VERIFICAR SI SON TRUE LAS VARIABLES QUE VIENEN POR POST
            if($nombre && $apellidos && $password && $email){
            //SETEAR VARIABLES QUE LLEGAN POR POST
            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setPassword($password);
            
            //GUARDAR EN LA BD
            $save= $usuario->save();
            if($save==true){
                $_SESSION['register']='complete';
            }else{
                $_SESSION['register']='fail';

            }

            }else{
                $_SESSION['register']='fail';
            }
        
        }else{
            $_SESSION['register']='fail';

        }
        header('Location:'.base_url."usuario/registro");


    }
}

?>