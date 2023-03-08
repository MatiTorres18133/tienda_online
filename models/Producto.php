<?php
class Producto{

   
    private $db;
    private $id;
 private $categoria_id;
 private $nombre;
 private $descripcion;
 private $precio;
 private $stock;
 private $oferta;
 private $fecha;
 private $imagen;



 public function __construct(){
    $this->db = Database::connect();
}



public function setId($id){
    $this->id = $id;

}


public function setCategoria_id($categoria_id){
    $this->categoria_id = $categoria_id;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
}


public function setPrecio($precio){
    $this->precio =$precio;
}

public function setStock($stock){
    $this->stock=$stock;
}

public function setOferta($oferta){
    $this->oferta = $oferta;
}

public function setFecha($fecha){
    $this->fecha=$fecha;
}

public function setImage($image){
    $this->imagen = $image;
}

public function getId(){
   return $this->id ;

}


public function getCategoria_id(){
    return $this->categoria_id ;
}

public function getNombre(){
    return $this->nombre;
}

public function getDescripcion(){
    return $this->descripcion ;
}


public function getPrecio(){
    return $this->precio;
}

public function getStock(){
   return $this->stock;
}

public function getOferta(){
 return   $this->oferta;
}

public function getFecha(){
    return $this->fecha;
}

public function getImage(){
    return $this->imagen;
}


public function getAll(){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");

    return $productos;
}

public function getAlCategory(){
    $sql= "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
    ."INNER JOIN categorias c ON c.id = p.categoria_id "
    ."WHERE p.categoria_id = {$this->getCategoria_id()} "
    ."ORDER BY id DESC";
    $productos = $this->db->query($sql);

    return $productos;
}
 public function getRandom($limit){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
    return $productos;

 }

public function getOne(){
    $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");

    return $producto->fetch_object();
}

public function save(){
    $sql = "INSERT INTO productos VALUES(null, {$this->getCategoria_id()} , '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()} , '{$this->getOferta()}', CURDATE(), '{$this->getImage()}');";

   
    $save= $this->db->query($sql);
    
 
    $result = false;
    if($save == true){

        $result = true;

    }
    return $result;
}

public function edit(){
    $sql = "UPDATE productos SET categoria_id={$this->getCategoria_id()} ,nombre= '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()},oferta='{$this->getOferta()}' "; 

     if($this->getImage() !=null){
        $sql .=", imagen ='{$this->getImage()}'";
     }

     $sql .= "WHERE id ={$this->getId()};";


   
    $save= $this->db->query($sql);
     
 
    $result = false;
    if($save == true){

        $result = true;

    }
    return $result;
}


public function eliminar(){
    $sql = "DELETE FROM productos WHERE id ={$this->getId()};";
  
    $elim= $this->db->query($sql);
   
    $result = false;
    if($elim == true){
        $result = true;
    }

    return $result;
}
 



}
?>