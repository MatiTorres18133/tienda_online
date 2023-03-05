<?php
require_once('models/Producto.php');

class ProductoController{


    public function index(){

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
                $file = $_FILES['Imagen'];
                $file_name = $file['name'];
                $mimetype = $file['type'];
               
                if($mimetype == 'image/jpg' || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" ){
                    
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'],'uploads/images'.$file_name);
                    $producto->setImage($file_name);
                }



             

           
                $guardar = $producto->save();
                
                if($guardar== true){
                    $_SESSION['producto'] = 'creado';
                }else{
                    $_SESSION['producto']= 'fallo';
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

       var_dump($_GET);

    }
}

?>