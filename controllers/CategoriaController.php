<?php

require_once('models/Categoria.php');
require_once('models/Producto.php');


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

    public function ver(){
        if(isset($_GET['id'])){
            
            $id = intval($_GET['id']);
            
            //CONSGUIR CATEGORIA
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            //CONSEGUIR PRODUCTOS
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAlCategory();
           
        }
        require_once('views/categoria/ver.php');

    }
 
}

?>