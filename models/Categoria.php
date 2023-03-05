<?php


class Categoria{


    private $db;
    private $id;
    private $nombre;


    public function __construct(){
        $this->db = Database::connect();
    }



    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getId(){
        return $this->id;
    }



    public function allCategorias(){
       
        $show = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
      return $show;

      
    }
    public function saveCategorias(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        $resultado =false;
        if($save == true){
            $resultado= true;
        }
        return $resultado;
    }

    public function deleteCategoria(){
        $sql = "DELETE * FROM categorias WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);
        $resultado = false;
        if($delete == true){
            $resultado == true;
        }

        return $resultado;
    }

}

?>