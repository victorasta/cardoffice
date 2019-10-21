<?php

ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';

if((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol']!=4)){
    require_once 'views/layouts/header.php';
    require_once 'views/layouts/slideBar.php';
}else{
    require_once 'views/layoutsCliente/header.php';
    require_once 'views/layoutsCliente/navbar.php';
}
if(isset($_GET['controller'])){
        $nombre_controlador= $_GET['controller'].'Controller';
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $nombre_controlador= controller_default;
    }else{
        $error = new errorController();
        $error->index();
        exit();
}
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
        if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();       
        }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
            $action_default = action_default;
            $controlador->$action_default();
        }else{
            $error = new errorController();
            $error->index();
        }
}else{
    $error = new errorController();
    $error->index();
}
if((isset($_SESSION['usuario'])&& $_SESSION['usuario'][0]['id_rol']!=4)){
    require_once 'views/layouts/footer.php';
}else{
    require_once 'views/layoutsCliente/footer.php';
}
