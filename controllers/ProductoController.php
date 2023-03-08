<?php
require_once('models/Producto.php');

class ProductoController{


    public function index(){

    $producto = new Producto();
    $productos = $producto->getRandom(6);
    //renderizar vista
    require_once('views/producto/destacados.php');
    }

    public function gestion(){
        Utils::isAdmin();

        $producto= new Producto();
        $productos=$producto->getAll();
    
        $empty= false;
        if($productos->num_rows ==0 ){
            $empty =true;
           
        }
        require_once("views/producto/gestion.php");
    }


 

    public function crear(){
        Utils::isAdmin();
        require_once('views/producto/crear.php');
    }

    public function save(){
        Utils::isAdmin();
        if($_POST){           
            $categoria_id = isset($_POST['categoria'])?$_POST['categoria']:false;
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:false;
            $descripcion =  isset($_POST['descripcion'])?$_POST['descripcion']:false;
            $precio =  isset($_POST['Precio'])?$_POST['Precio']:false;        
            $stock =  isset($_POST['Stock'])?$_POST['Stock']:false;
            $oferta =  isset($_POST['oferta'])?$_POST['oferta']:false;



            if($categoria_id && $nombre && $descripcion && $precio && $stock ){
                $producto = new Producto();
                $producto->setCategoria_id(intval($categoria_id));
                $producto->setNombre(strtoupper($nombre));
                $producto->setDescripcion($descripcion);
                $producto->setPrecio(floatval($precio));
                $producto->setStock($stock);
                $producto->setOferta($oferta);
                
                //GUARDAR LA IMAGEN
                if(isset($_FILES['Imagen'])){ 
                    $file = $_FILES['Imagen'];
                    $file_name = $file['name'];
                    $mimetype = $file['type'];
                   
                    if($mimetype == 'image/jpg' || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" ){
                        
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }
    
                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$file_name);
                        $producto->setImage($file_name);
                        
                    }
                }
               

             
                if(isset($_GET['id'])){
                    $id= $_GET['id'];
                    $producto->setId($id);
                    $guardar = $producto->edit();
                    if($guardar== true){
                        $_SESSION['producto'] = 'editado';
                    }else{
                        $_SESSION['producto']= 'fallo_editado';
                    }
                  
                }else{
                    $guardar = $producto->save();
                    if($guardar== true){
                        $_SESSION['producto'] = 'creado';
                    }else{
                        $_SESSION['producto']= 'fallo';
                    }
                }
           
                
                
                
            }else{
                $_SESSION['producto']='fallo';
            }


            
        }else{
            $_SESSION['producto']='fallo';

        }
    
        header('Location:'.base_url."producto/gestion");
       

    }


    public function eliminar(){
 
        Utils::isAdmin();
        
       if(isset($_GET['id'])){
       
        $id = isset($_GET['id'])?$_GET['id']:false;
        
       
        if($id){
            $producto = new Producto();

            $producto->setId(intval($id));


            $eliminar = $producto->eliminar();
            
           
            if($eliminar == true){
                $_SESSION['producto'] = 'eliminado';
            }else{
                $_SESSION['producto']= 'fallo';
            }

        }else{
            $_SESSION['producto']= 'fallo';
        }

       }else{
        $_SESSION['producto']= 'fallo';
     

       }
       header('Location:'.base_url."producto/gestion");
    }

    public function editar(){

        Utils::isAdmin();
      
        if(isset($_GET['id'])){ 
            $id=$_GET['id'];
            $edit =true;
            $producto = new Producto();
            $producto ->setId($id);

            $pro = $producto->getOne();
         
           
            require_once('views/producto/crear.php');
        }else{ 
       header('Location:'.base_url."producto/gestion");

        }
       
       


    }

    public function ver(){
        if(isset($_GET['id'])){ 
            $id=$_GET['id'];
        
            $producto = new Producto();
            $producto ->setId($id);

            $pro = $producto->getOne();
         
           
           
        }
        require_once('views/producto/ver.php');
       
    }
}

?>