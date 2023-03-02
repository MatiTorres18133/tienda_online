<?php
session_start();
require_once('autoload.php');
require_once('config/db.php');
require_once('helpers/utils.php');
require_once('config/parameters.php');
require_once('views/layout/header.php');
require_once('views/layout/sidebar.php');


function showError(){
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nomber_controlador = $_GET['controller'] . "Controller";

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nomber_controlador = controller_default;


} 
else {
    showError();
    exit();
}


if (class_exists($nomber_controlador)) {
    $controlador = new $nomber_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $default = action_default;
        $controlador->$default();
    }  
    
    else {
        showError();
    }
} else {
    showError();
}





require_once('views/layout/footer.php');

?>