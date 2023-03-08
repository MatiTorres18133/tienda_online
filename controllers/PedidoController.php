<?php
require_once('models/pedido.php');

class pedidoController{
    public function index(){

        $pedido = new Pedido();
        $pedido->getAll();
        require_once("views/pedido/ver.php");

    }

    public function hacer(){
        require_once("views/pedido/hacer.php");
    }

    public function confirmarPedido(){
      if(isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            
            $provincia = isset($_POST['provincia'])?$_POST['provincia']:false;
            $localidad = isset($_POST['localidad'])?$_POST['localidad']:false;
            $direccion = isset($_POST['direccion'])?$_POST['direccion']:false;
            $stats = Utils::statsCarrito();
            $coste =  $stats['total'];


            if($provincia && $localidad && $direccion){
                $pedido = new Pedido();
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setCoste($coste);
                $save = $pedido->save();

                //Guardad line_oedido
                $save_liena= $pedido->saveLinea();

                if($save &&  $save_liena){
                    $_SESSION['pedido']='complete';
                    header('Location:'.base_url."pedido/index");
                }else{
                    $_SESSION['pedido']="failed";
                }
            }else{
                $_SESSION['pedido']=="failed";
                
            }
         }else{
        //REDIRIGIR INDEX
        header('Location:'.base_url."pedido/index.php");
      }
      
    }


  
    

 
}

?>