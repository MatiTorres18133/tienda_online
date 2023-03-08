<?php
class Pedido{

    private $id;
     private $usuario_id;
     private $provincia;
     private $localidad;
     private $direccion;
     private $coste;
     private $estado;
     private $fecha;
     private $hora;
     private $db;




 public function __construct(){
    $this->db = Database::connect();
}


public function setId($id){
    $this->id = $id;
}
public function setUsuario_id($usuario_id){
    $this->usuario_id = $usuario_id;
}
public function setProvincia($provincia){
    $this->provincia= $this->db->real_escape_string($provincia);
}

public function setLocalidad($localidad){
    $this->localidad=  $this->db->real_escape_string($localidad);
}

public function setDireccion($direccion){
    $this->direccion = $this->db->real_escape_string($direccion);
}

public function setCoste($coste){
    $this->coste= $coste;
}


public function setEstado($estado){
    $this->estado = $estado;
}


public function setFecha($fecha){
    $this->fecha = $fecha;
}


public function setHora($hora){
    $this->hora = $hora;
}

public function getId(){
    return $this->id;
}

public function getUsuario_id(){
    return $this->usuario_id;
}

public function getProvincia(){

    return $this->provincia;
}

public function getLocalidad(){
    return $this->localidad;
}

public function getDireccion(){
    return $this->direccion;
}

public function getCoste(){
    return $this->coste;
}

public function getEstado(){
    return $this->estado;
}

public function getFecha(){
    return $this->fecha;
}

public function getHora(){
    return $this->hora;
}






//=======================METODOS===================

public function getAll(){
    $pedido = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");

    return $pedido->fetch_object();
}

public function getOne(){
    $pedido = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");

    return $pedido->fetch_object();
}

public function save(){
    $sql = "INSERT INTO pedidos VALUES(null, {$this->getUsuario_id()} , '{$this->getProvincia()}', '{$this->getDireccion()}', {$this->getCoste()} , 'confirm', CURDATE(), CURTIME(), '{$this->getLocalidad()}');";


    $save= $this->db->query($sql);
    
   
 
    $result = false;
    if($save == true){

        $result = true;

    }
    return $result;
}




public function saveLinea(){
$sql = "SELECT LAST_INSERT_ID() as 'pedido';";

$query= $this->db->query($sql);
$pedido_id = $query->fetch_object()->pedido;

foreach($_SESSION['carrito'] as  $elemento){
    $producto = $elemento['producto'];
    $insert = "INSERT INTO lineas_pedidos VALUES (null, {$producto->id}, {$elemento['unidades']}, {$pedido_id}  );";

   $save=  $this->db->query($insert);

}

$result = false;
    if($save == true){

        $result = true;

    }
    return $result;

}















// public function edit(){
//     $sql = "UPDATE productos SET categoria_id={$this->getCategoria_id()} ,nombre= '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()},oferta='{$this->getOferta()}' "; 

//      if($this->getImage() !=null){
//         $sql .=", imagen ='{$this->getImage()}'";
//      }

//      $sql .= "WHERE id ={$this->getId()};";


   
//     $save= $this->db->query($sql);
     
 
//     $result = false;
//     if($save == true){

//         $result = true;

//     }
//     return $result;
// }






}
?>