<?php

require_once('models/Categoria.php');

class CategoriaController{


    public function index(){
        Utils::isAdmin();
     $categoria = new Categoria();
    $categorias = $categoria->allCategorias();

    require_once('views/categoria/index.php');
    }


    public function crear(){
        Utils::isAdmin();
       require_once('views/categoria/crear.php');
    }

    public function save(){
        Utils::isAdmin();
        
        if(isset($_POST)&& isset($_POST['nombre'])){
            //Guardar categoria 
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->saveCategorias();
        }
   
       

        header('Location:'.base_url."Categoria/index");
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET)&& isset($_GET['id'])){
            $categoria = new Categoria();
            $categoria -> setId($_GET['id']);
            $categoria->deleteCategoria();


        }


    }
 
}

?>